<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ReportBusinessIdentification;
use Illuminate\Support\Facades\Mail ;
class AutoReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:expiryDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Based on the expire date (entered in Compliance Report), need to send an automatic email to the email address (that entered in the same Compliance Report)';

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
        
        $ReportBusinessIdentifications = ReportBusinessIdentification::where('expiryDate',date('Y-m-d'))->get();
        $array = array();
        foreach ($ReportBusinessIdentifications as $ReportBusinessIdentification) {
             $this->info('The messages were sent successfully!'.$ReportBusinessIdentification->email);
            if($ReportBusinessIdentification->email && $ReportBusinessIdentification->autoreminder == 0 ) {
                Mail::send('emails.autoreminder',['ReportBusinessIdentification' => $ReportBusinessIdentification, "name" => $ReportBusinessIdentification->businessName, "expiryDate" => $ReportBusinessIdentification->expiryDate],function($message) use($ReportBusinessIdentification){
                    $message->to($ReportBusinessIdentification->email)->from('noreply@contractorcompliance.com.au','Contractor Compilance')->subject('Reminder'); }) ; 
                $ReportBusinessIdentification->autoreminder = 1;
                $ReportBusinessIdentification->save();
            }
        }
        $this->info('The messages were sent successfully!');

    }
}
