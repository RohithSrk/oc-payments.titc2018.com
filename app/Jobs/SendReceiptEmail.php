<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;

class SendReceiptEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $member;
    public $name;
    public $country;
    public $committee;
    public $amountPaid;
    public $receiptId;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($member, $name, $country, $committee, $amountPaid, $receiptId)
    {
	    $this->member = $member;
	    $this->name = $name;
	    $this->country = $country;
	    $this->committee = $committee;
	    $this->amountPaid = $amountPaid;
	    $this->receiptId = $receiptId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
	    Mail::to( $this->member )->send( new \App\Mail\PaymentReceipt( $this->name, $this->country,
		    $this->committee, $this->amount_paid, $this->receiptId ) );
    }
}
