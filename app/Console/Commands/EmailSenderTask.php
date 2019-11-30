<?php

namespace App\Console\Commands;

use App\EmailSenderModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailSenderTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Reminder:Start';

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
     * @return mixed
     */
    public function handle()
    {
        $all = EmailSenderModel::all();
        $weekDay = $all[0]['week_day'];
        $time = $all[0]['time'];
        $control = EmailSenderModel::where('week_day',$weekDay)
            ->where('time',$time)
            ->where('isSend',REMINDER_DEFAULT)
            ->count();
        if($control!=0)
        {
            $list = EmailSenderModel::where('week_day',$weekDay)
                ->where('time',$time)
                ->where('isSend',REMINDER_DEFAULT)
                ->get();
            foreach($list as $k => $v)
            {
                $data = [
                    'email'=>$v['email'],
                    'week_day'=>$v['week_day'],
                    'time'=>$v['time'],
                    'subject'=>$v['subject'],
                    'content'=>$v['content'],
                ];
                try {
                    Mail::send('email', $data, function ($message) use ($data){
                        $message->to($data['email'])
                            ->subject($data['subject'])
                            ->from(APP_EMAIL,APP_NAME);
                    });
                    EmailSenderModel::where('id',$v['id'])->update(['isSend'=>REMINDER_SUCCESS]);
                }
                catch (\Exception $e)
                {
                    dd($e->getMessage());
                }
            }
        }
        else
        {
            return "";
        }
    }
}
