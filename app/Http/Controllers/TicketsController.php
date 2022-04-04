<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketFormRequest;
use App\Models\department;
use App\Models\Section;
use App\Models\Ticket_status;
use App\Models\TicketAttachments;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $ticket = Tickets::where('requested_user','=',Auth::user()->id)->get();
        return view('ticket-List',compact('ticket'));
    }
    public function editTicket(Tickets $tickets)
    {
        $dept = department::all();
        $ticketStatus = Ticket_status::all();
        return view("addTicket", compact('dept','ticketStatus','tickets'));
    }
}
