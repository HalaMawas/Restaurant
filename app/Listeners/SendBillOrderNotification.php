<?php

namespace App\Listeners;

use App\Events\BillOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBillOrderNotification
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
     * @param  BillOrder  $event
     * @return void
     */
    public function handle(BillOrder $event)
    {
        //
    }
}
