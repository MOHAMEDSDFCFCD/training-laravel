<?php

namespace App\Listeners;

use App\Events\Videoviewer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Increasecount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Videoviewer $event)
    { if(!session()->has('videoisvistied')){
        $this ->updateview($event->video);
    }else{
        return false;
    }
    }
    public function updateview($vid){//$vid is model video
      $vid->countviewer=$vid->countviewer+1;
      $vid->save(); 
      session()->put('videoisvistied',$vid->id);
    }
}
