<?php

namespace App\Console\Commands;

use App\Models\Ticket_comment;
use App\Models\Ticket_status;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoCloseTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'close:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ticket = Tickets::with(['comments' => function ($q) {
            $q->latest('created_at')->first();
        }])->where('status_id' , Ticket_status::where('name' , 'Resolved')->first()->id)->get();

        foreach ($ticket as $tc)
        {
            $_72hours = (Carbon::now()->subDays(3))->format('Y-m-d');
            if (date('Y-m-d' , strtotime($tc->comments()->first()->created_at)) >= $_72hours)
            {
                $tc->status_id = Ticket_status::where('name' , 'Closed')->first()->id;
                $tc->save();

                Ticket_comment::create([
                    'ticket_id' => $tc->id,
                    'user_id' => $tc->assigned_to,
                    'comment' => 'Ticket auto closed',
                    'status_id' => $tc->status_id
                ]);
            }
        }
        return 0;
    }
}
