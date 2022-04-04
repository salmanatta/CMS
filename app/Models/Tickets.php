<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->hasOne(department::class,'id' , 'dept_id');
    }
    public function section()
    {
        return $this->hasOne(Section::class,'id' , 'section_id');
    }
    public function user()
    {
        return $this->hasOne(User::class,'id' , 'requested_user');
    }
    public function ticketStatus()
    {
        return $this->hasOne(Ticket_status::class,'id','status_id');
    }
    public function attachments()
    {
        return $this->hasMany(TicketAttachments::class,'ticket_id','id');
    }
}
