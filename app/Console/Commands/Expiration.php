<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command expiration after 5 min';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user=User::where('expire',0)->get();
        foreach($user as $users){
          $users->update(['expire'=>1]);
        }
    }
}
