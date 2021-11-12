<?php

namespace App\Listeners;

use App\Events\CreatingNewModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateUUID
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
     * @param  CreatingNewModel  $event
     * @return void
     */
    public function handle(CreatingNewModel $event)
    {
        //
    }
}
