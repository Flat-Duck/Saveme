<?php

namespace App\Observers;

use App\Clink;
use App\Helper;
use Carbon\Carbon;
class ClinkObserver
{
    /**
     * Handle the clink "created" event.
     *
     * @param  \App\Clink  $clink
     * @return void
     */
    public function created(Clink $clink)
    {
        $this->updateTimeStamp();
    }

    /**
     * Handle the clink "updated" event.
     *
     * @param  \App\Clink  $clink
     * @return void
     */
    public function updated(Clink $clink)
    {
        $this->updateTimeStamp();
    }

    /**
     * Handle the clink "deleted" event.
     *
     * @param  \App\Clink  $clink
     * @return void
     */
    public function deleted(Clink $clink)
    {
        $this->updateTimeStamp();
    }

    /**
     * Handle the clink "restored" event.
     *
     * @param  \App\Clink  $clink
     * @return void
     */
    public function restored(Clink $clink)
    {
        $this->updateTimeStamp();
    }

    /**
     * Handle the clink "force deleted" event.
     *
     * @param  \App\Clink  $clink
     * @return void
     */
    public function forceDeleted(Clink $clink)
    {
        $this->updateTimeStamp();
    }
    public function updateTimeStamp()
    {
        $timestamp = Carbon::now()->timestamp;
        $stamp = Helper::updateOrCreate(
            ['tag'=> 'original' ],
            ['time_stamp' => $timestamp]);
    }
}
