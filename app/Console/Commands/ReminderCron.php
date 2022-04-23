<?php

namespace App\Console\Commands;

use App\Models\Reminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ReminderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:cron';

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
        $lists = Reminder::
        whereDay('date', '=', date('d'))
            ->whereMonth('date', '=', date('m'))
            ->whereYear('date', '=', date('Y'))
            ->whereTime('created_at', '>', time())
            ->where('send', 0)
            ->get();
        foreach ($lists as $list) {
            $list->send = 1;
            $list->save();
            $this->sendEmail($list->name,$list->date,$list->User->name,$list->User->email);
        }
        return 0;
    }

    public function sendEmail($reminName, $date, $to_name, $to_email)
    {
        $from_email = env('MAIL_USERNAME');

        $msg = 'Hi ! ' . $to_name;

        $logo = path() . "images/reminder/image-5.png";

        $data = array('msg' => $msg, 'logo' => $logo, 'reminName' => $reminName, 'date' => $date, 'to_name' => $to_name);

        Mail::send(['html' => 'emails.reminder'], $data, function ($message) use ($to_name, $to_email, $from_email, $msg) {
            $message->to($to_email, $to_name)
                ->subject($msg);
            $message->from($from_email, $msg);
        });
    }
}
