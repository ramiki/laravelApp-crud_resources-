<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AllAdminJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $toadmin ;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($toadmin)
    {
        // pass the data
        $this->toadmin = $toadmin ;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // job test 
        
       $toadm = $this->toadmin;

        foreach ( $toadm as $id){
            $randomString = Str::random(30);
            $hashed = Hash::make($randomString);
            User::where('id' , $id)->update(['is_admin' =>  $hashed]);
        }
        // dd(User::pluck('is_admin'));

    }
}
