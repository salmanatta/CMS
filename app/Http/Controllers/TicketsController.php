<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketFormRequest;
use App\Models\department;
use App\Models\Section;
use App\Models\Ticket_status;
use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
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
        Tickets::create([
            'requested_user'=>'1',
            'status_id'=>$request->status,
            'type'=>$request->RequestType,
            'dept_id'=>$request->dept_id,
            'section_id'=>$request->section_id,
            'priority'=>$request->priority,
            'urgent'=>$request->urgent ? 1 : 0,
            'subject'=>$request->subject,
            'details'=>$request->CompainDetails
            ]);
    }
}
