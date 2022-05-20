<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Tickets extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $auditInclude = [
        'status_id',
        'dept_id',
        'section_id',
    ];

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
    public function assigneduser()
    {
        return $this->hasOne(User::class,'id' , 'assigned_to');
    }
    public function ticketStatus()
    {
        return $this->belongsTo(Ticket_status::class,'status_id','id');
    }
    public function attachments()
    {
        return $this->hasMany(TicketAttachments::class,'ticket_id','id');
    }
    public function comments()
    {
        return $this->hasMany(Ticket_comment::class,'ticket_id','id')->orderBy('created_at','desc');
    }

    public function scopeNotClosed($query)
    {
        $query->where('status_id' , '<' , 5);
    }
}
