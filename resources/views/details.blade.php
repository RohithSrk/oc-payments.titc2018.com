@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Member Details</div>

                <div class="card-body">

                    @if( Session::has('success') )
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{Session::forget('success')}}
                        </div>
                    @endif

                    <table class="table">

                        <tr><th>Name</th><td>{{$member->name}}</td></tr>
                        <tr><th>Committee</th><td>{{$member->committee}}</td></tr>
                        <tr><th>Country</th><td>{{$member->country}}</td></tr>
                        <tr><th>Email</th><td>{{$member->email}}</td></tr>
                        <tr><th>Amount Paid</th><td>{{$member->amount_paid}}</td></tr>
                        <tr><th>Payment Mode</th><td>{{$member->payment_type}}</td></tr>
                        @isset($member->townscript_id)
                            <tr><th>Townscript ID</th><td>{{$member->townscript_id}}</td></tr>
                        @endisset
                        @isset($member->oc_member_name)
                            <tr><th>OC Member Name</th><td>{{$member->oc_member_name}}</td></tr>
                        @endisset

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
