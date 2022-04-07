<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketFormRequest;
use App\Models\department;
use App\Models\Section;
use App\Models\Ticket_comment;
use App\Models\Ticket_status;
use App\Models\TicketAttachments;
use App\Models\Tickets;
use App\Models\UserDepartments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use OwenIt\Auditing\Models\Audit;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $dept = department::all();
        $ticketStatus = Ticket_status::all();
        return view("addTicket", compact('dept','ticketStatus'));

    }
    public function getSection(Request $request)
    {
        $sectionData = Section::where('dept_id',$request->get('id'))->get();
        return $sectionData;
    }

    public function insertTicket(AddTicketFormRequest $request)
    {
        $pid = Tickets::create([
            'requested_user'=> Auth::user()->id,
            'status_id'=>$request->status,
            'type'=>$request->RequestType,
            'dept_id'=>$request->department,
            'section_id'=>$request->section,
            'priority'=>$request->priority,
            'urgent'=>$request->urgent ? 1 : 0,
            'subject'=>$request->subject,
            'details'=>$request->ComplainDetails
            ]);

        $images = $request->allFiles('image');
        foreach ($images as $image)
        {
            foreach ($image as $img)
            {
                $attachment = new TicketAttachments();
                $file = $img->store('/', ['disk' => 'tickets']);
                $attachment->file_path = $file;
                $attachment->ticket_id = $pid->id;
                $attachment->save();
            }
        }
        return redirect('tickets')->with('success','Record Added Successfully');
    }
    public function showTickets()
    {
        $depts = Auth::user()->department->pluck('dept_id');
        $ticket = Tickets::whereIn('dept_id' , $depts)->get();
        return view('ticket-List',compact('ticket'));
    }
    public function editTicket(Tickets $tickets)
    {
        $dept = department::all();
        $ticketStatus = Ticket_status::all();
        return view("addTicket", compact('dept','ticketStatus','tickets'));
    }
    public function insertComment(Request $request)
    {

        $request->validate(
            [
                'comment'=>'required',
                'status'=>'required',
                'department'=>'required',
                'section'=>'required'
            ]
        );
        Ticket_comment::create([
            'ticket_id'=>$request->ticketid,
            'user_id'=>Auth::user()->id,
            'comment'=> $request->comment,
            'status_id'=>$request->status
        ]);
        $ticket = Tickets::find($request->ticketid);
        $ticket->status_id = $request->status;
        $ticket->dept_id = $request->department;
        $ticket->section_id = $request->section;
        $ticket->save();
        return redirect()->back()->with('success','Comment Added Successfully');
    }
    public function ticketLog()
    {
        return Tickets::with('audits')->where('id','=','7')->get();
    }
}
