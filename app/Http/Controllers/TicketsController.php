<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketFormRequest;
use App\Models\department;
use App\Models\Items;
use App\Models\Section;
use App\Models\Ticket_comment;
use App\Models\Ticket_status;
use App\Models\TicketAttachments;
use App\Models\Tickets;
use App\Models\User;
use App\Models\UserDepartments;
use App\Notifications\TicketCloseNotification;
use App\Notifications\TicketNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
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
        $FAItems = Items::all();
        return view("addTicket", compact('dept','ticketStatus','FAItems'));

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
            'status_id'=>$request->status ? '' : 1,
            'type'=>$request->RequestType,
            'dept_id'=>$request->department,
            'section_id'=>$request->section,
            'priority'=>$request->priority,
            'urgent'=>$request->urgent ? 1 : 0,
            'subject'=>$request->subject,
            'details'=>$request->ComplainDetails,
            'complain_location'=>$request->complainlocation,
            'item_id'=>$request->FAItems ? '' : 0
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
//        $user = Auth::user()->first();
        $user = UserDepartments::where('dept_id',$request->department)->get();
//        dd($user);
        $uname = Auth::user()->name;
        foreach($user as $u)
        {
            Notification::send(User::find($u->user_id), new TicketNotification($uname,$request->subject,$request->priority,$pid->id));
        }

        return redirect('ticketList')->with('success','Record Added Successfully');
    }
    public function showTickets()
    {
        $depts = Auth::user()->department->pluck('dept_id');
        $user = User::where('id','!=' , \auth()->user()->id)->get();
        $ticket = Tickets::whereIn('dept_id' , $depts)
                            ->orWhere('requested_user',Auth::user()->id)
                            ->notClosed()
                            ->orderBy('id','desc')
                            ->get();

        return view('ticket-List',compact('ticket' , 'user'));
    }

    public function readNotification($notification , $ticket)
    {
        auth()->user()->notifications->where('id' , $notification)->markAsRead();
        return redirect()->to('editTicket/'.$ticket);
    }

    public function editTicket(Tickets $tickets)
    {
        $dept = department::all();
        $ticketStatus = Ticket_status::all();
        $sections = Section::where('dept_id',$tickets->dept_id)->get();
        $FAitems = Items::where('dept_id',$tickets->dept_id)->get();
        return view("addTicket", compact('dept','ticketStatus','tickets','sections','FAitems'));
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
        $ticket->item_id = $request->FAItems;
        $ticket->update();
        if($request->status == '4')
        {
            Notification::send(User::find($ticket->requested_user), new TicketCloseNotification(Auth::user()->name,$ticket->subject,$request->ticketid));
        }


            return redirect('ticketList')->with('success','Comment Added Successfully');
    }

    public function updateAssignTo($id , $ticketId)
    {
        $status = Ticket_status::where('name' , 'Assigned')->first();
        $ticket = Tickets::find($ticketId);
        $ticket->assigned_to = $id;
        $ticket->status_id = $status->id;
        $ticket->save();

        Ticket_comment::create([
            'ticket_id' => $ticket->id,
            'user_id' => \auth()->user()->id,
            'comment' => \auth()->user()->name .' Assigned To ' . User::find($id)->name,
            'status_id' => $status->id
        ]);
        echo 'sdsfassfd';
    }

    public function ticketLog(Tickets $tickets)
    {
//        dd($tickets);
        return view('ticket-info',compact('tickets'));
    }
    public function showCloseTickets()
    {
        $depts = Auth::user()->department->pluck('dept_id');
        $ticket = Tickets::
            where('status_id','4')
            ->where('requested_user',Auth::user()->id)
            ->orderBy('id','desc')
            ->get();
        return view('closeTicket-List',compact('ticket'));

    }
}
