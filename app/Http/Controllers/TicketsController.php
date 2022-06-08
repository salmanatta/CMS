<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketFormRequest;
use App\Mail\NotifyMail;
use App\Models\department;
use App\Models\Items;
use App\Models\Section;
use App\Models\Ticket_comment;
use App\Models\Ticket_status;
use App\Models\TicketAttachments;
use App\Models\Tickets;
use App\Models\User;
use App\Models\UserDepartments;
use App\Notifications\TicketAssignedNotification;
use App\Notifications\TicketCloseNotification;
use App\Notifications\TicketNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use OwenIt\Auditing\Models\Audit;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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
            'status_id'=> $request->status ? $request->status : 1,
            'type'=>$request->RequestType,
            'dept_id'=>$request->department,
            'section_id'=>$request->section,
            'priority'=>$request->priority,
            'urgent'=>$request->urgent ? 1 : 0,
            'subject'=>$request->subject,
            'details'=>$request->ComplainDetails,
            'complain_location'=>$request->complainlocation,
            'item_id'=>$request->FAItems
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
        $users = UserDepartments::where('dept_id',$request->department)->where('user_id' , '!=' , \auth()->user()->id)->get();
//        dd($user);
        $uname = Auth::user()->name;
        foreach($users as $u)
        {
            $usr = User::find($u->user_id);
            if ($usr->notification_allowed)
            {
                Notification::send($usr, new TicketNotification(ucfirst($uname),$request->subject,$request->priority,$pid->id));
            }
        }

        return redirect('ticketList')->with('success','Record Added Successfully');
    }
    public function showTickets()
    {
            if(is_null(Auth::user()->department))
            {
                $user = User::all();
                $ticket = Tickets::orWhere('requested_user',Auth::user()->id)
                    ->notClosed()
                    ->orderBy('id','desc')
                    ->get();

            }else{
                if(Auth::user()->is_admin == 0)
                {
                    $depts = Auth::user()->department->pluck('dept_id');
                    $user = User::all();
                    $ticket = Tickets::whereIn('dept_id' , $depts)
                        ->orWhere('requested_user',Auth::user()->id)
                        ->notClosed()
                        ->orderBy('id','desc')
                        ->get();
                }else{
                    $depts = Auth::user()->department->pluck('dept_id');
                    $user = User::all();
                    $ticket = Tickets::whereIn('dept_id' , $depts)
                        ->orderBy('id','desc')
                        ->get();
                }

            }
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
        $ticketStatus = Ticket_status::where('id','<>',6)->get();
        $sections = Section::where('dept_id',$tickets->dept_id)->get();
        $FAitems = Items::where('dept_id',$tickets->dept_id)->get();
        return view("addTicket", compact('dept','ticketStatus','tickets','sections','FAitems'));
    }
    public function insertComment(Request $request)
    {
        $request->validate(
            [
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
        if($request->status == Ticket_status::where('name' , 'Resolved')->first()->id)
        {
            Notification::send(User::find($ticket->requested_user), new TicketCloseNotification(Auth::user()->name,$ticket->subject,$request->ticketid , "Resolved"));
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
            Notification::send(User::find($id), new TicketAssignedNotification(Auth::user()->name,$ticket->subject,$ticket->priority,$ticket->id));
            echo 1;
    }

    public function ticketLog(Tickets $tickets)
    {
//        dd($tickets);
        return view('ticket-info',compact('tickets'));
    }
    public function showCloseTickets()
    {
        $ticket = Tickets::where('status_id' , '>' ,'4')
                ->where('requested_user',Auth::user()->id)
                ->orderBy('id','desc')
                ->get();
        return view('closeTicket-List',compact('ticket'));
    }

    public function markResolve(Tickets $id)
    {
        $status = Ticket_status::where('name' , 'Closed')->first()->id;
        $id->status_id = $status;
        $id->save();

        Ticket_comment::create([
            'ticket_id' => $id->id,
            'user_id' => \auth()->user()->id,
            'comment' => \auth()->user()->name .' Marked as Closed ',
            'status_id' => $status
        ]);
        return redirect()->back()->with('success' , 'Ticket marked Closed successfully');
    }

    public function reOpen(Tickets $id)
    {
        $status = Ticket_status::where('name' , 'Assigned')->first()->id;
        $id->status_id = $status;
        $id->save();
        $usr = User::find($id->assigned_to);
        Ticket_comment::create([
            'ticket_id' => $id->id,
            'user_id' => \auth()->user()->id,
            'comment' => \auth()->user()->name .' has Re-Open this ticket, assigned to ' . $usr->name,
            'status_id' => $status
        ]);

        Notification::send($usr, new TicketAssignedNotification(Auth::user()->name,$id->subject,$id->priority,$id->id));
        return redirect()->back()->with('success' , 'Ticket Re-Opened successfully');
    }
    public function sendMail()
    {
        Mail::to('salman.atta@pic.edu.pk')->send(new NotifyMail());

        if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
        }else{
            return response()->success('Great! Successfully send in your mail');
        }
    }

}
