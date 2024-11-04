<?php

namespace App\Console\Commands;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Inactive users';

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
       
            $date = Carbon::now();
            $expdate = date('Y-m-d', strtotime('-7 days', strtotime($date))); 
 
            // $date = Carbon::createFromFormat('Y.m.d', $user->premiumDate);
            // $daysToAdd = 5;
            // $date = $date->addDays($daysToAdd);         

            DB::delete("DELETE FROM users WHERE 'last_login' < $expdate");

        $this->info('Successfully updated.');

    }
}
