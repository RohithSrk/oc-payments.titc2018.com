@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Payment Receipts</div>

                <div class="card-body">

                    <table class="table">
                        <tr>
                            <td>Receipt Id</td>
                            <td>Name</td>
                            <td>Committee</td>
                            <td>Country</td>
                            <td>Details</td>
                        </tr>
                        @foreach($members as $member)
                        <tr>
                            <td>{{$member->id}}</td>
                            <td>{{$member->name}}</td>
                            <td>{{$member->committee}}</td>
                            <td>{{$member->country}}</td>
                            <td><a href="/member/{{$member->id}}/"
                                   class="btn-sm btn btn-primary" >View Details</a></td>
                        </tr>
                        @endforeach
                    </table>

                    <div class="text-left">
                        <a class="btn-sm btn btn-primary" href="/download">Download Excel</a>
                    </div>
                </div>
            </div>
            <div class="pagination mt-3">
                {{$members->links()}}

            </div>
        </div>
    </div>
</div>
@endsection
