<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Container\Container;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Snowfire\Beautymail\Beautymail;


class PaymentReceipt extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name;
    public $country;
    public $committee;
    public $amountPaid;
    public $receiptId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public function __construct( $name, $country, $committee, $amount_paid, $receipt_id ) {

		$this->name       = $name;
		$this->country    = $country;
		$this->committee  = $committee;
		$this->amountPaid = $amount_paid;
		$this->receiptId  = $receipt_id;
	}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
	    $pdf = \PDF::loadView( 'layouts.payment-receipt-pdf',
	    [
		    'name'       => $this->name,
		    'amountPaid' => $this->amountPaid,
		    'country'    => $this->country,
		    'committee'  => $this->committee,
		    'receiptId'  => $this->receiptId
	    ] );

	    return $this->from(config('mail.from.address'), 'The International Thematic Conference')
	                ->subject( 'NoReply: The International Thematic Conference 2018 - Payment Receipt' )
	                ->view('emails.receipt')
	                ->attachData( $pdf->output() , 'TITC Payment Receipt.pdf');
    }

	/**
	 * Send the message using the given mailer.
	 *
	 * @param  \Illuminate\Contracts\Mail\Mailer  $mailer
	 * @return void
	 */
	public function send(MailerContract $mailer)
	{
		Container::getInstance()->call([$this, 'build']);

		$beautymail = app()->make(Beautymail::class);

		$beautymail->send($this->buildView(), $this->buildViewData(), function ($message) {
			$this->buildFrom($message)
			     ->buildRecipients($message)
			     ->buildSubject($message)
			     ->buildAttachments($message)
			     ->runCallbacks($message);
		});
	}

	public function render() {
		Container::getInstance()->call([$this, 'build']);

		$beautymail = app()->make(Beautymail::class);

		return Container::getInstance()->make('mailer')->render(
			$this->buildView(), array_merge($beautymail->getData(), $this->buildViewData())
		);
	}
}
