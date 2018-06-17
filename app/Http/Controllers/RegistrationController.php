<?php

namespace App\Http\Controllers;

use App\Jobs\SendReceiptEmail;
use App\Mail\PaymentReceipt;
use App\Member;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use finfo;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $title = 'TITC - Payment Receipts Form';

        return view('layouts.register', compact( 'title' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $title = 'TITC - Payments Receipt Form';

	    $this->validate( request(), [
		    'name'           => 'required',
		    'committee'      => 'required',
		    'country'        => 'required',
		    'phone'          => 'required',
		    'email'          => 'required|email',
		    'amount-paid'    => [ 'required', 'regex:/^2400|2999$/' ],
		    'payment-type'   => [ 'required', 'regex:/^online|offline$/' ],
		    'townscript-id'  => 'required_if:payment-type,online',
		    'oc-member-name' => 'required_if:payment-type,offline',
	    ] );

	    if ( ! empty( Member::where( 'email', $request->get( 'email' ) )->count() ) ) {
		    return back()->withErrors(['field_name' => ['We have sent the payment receipt to your email already.']]);
	    }

	    $member               = new Member();
	    $member->name         = $request->get( 'name' );
	    $member->committee    = $request->get( 'committee' );
	    $member->country      = $request->get( 'country' );
	    $member->phone        = $request->get( 'phone' );
	    $member->email        = $request->get( 'email' );
	    $member->amount_paid  = $request->get( 'amount-paid' );
	    $member->payment_type = $request->get( 'payment-type' );

	    if ( ! is_null( $request->get( 'townscript-id' ) ) ) {
		    $member->townscript_id = $request->get( 'townscript-id' );
	    }

	    if ( ! is_null( $request->get( 'oc-member-name' ) ) ) {
		    $member->oc_member_name = $request->get( 'oc-member-name' );
	    }

	    if ( $member->save() ) {
		    session()->flash( 'success', "The details have been submitted successfully." );

		    Mail::to( $member )->send( new PaymentReceipt( $member->name, $member->country,
			    $member->committee, $member->amount_paid, $member->id ) );
//
//		    dispatch( new SendReceiptEmail( $member, $member->name, $member->country,
//			    $member->committee, $member->amount_paid, $id ) );

	    } else {
		    App::abort( 500, 'Error' );
	    }

	    return view( 'layouts.register', compact( 'title' ) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
    	//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
