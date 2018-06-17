@extends( 'layouts.master' )

@section ( 'page-content' )

    <div class="container bg-style">

        <div class="main-logo text-center" >
            <img src="/img/titc-logo.png" alt="TITC Logo" width="140">
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1">
                <div class="card registration-form" >
                    <div class="card-header">
                        <h2 class="text-center mt-1">Payment Receipts Form</h2>

                        <div class="text-center card-text">
                            <p>Please fill this form for receiving your payment receipt.</p>
                        </div>
                    </div>

                    <div class="card-body">

                        @if( count( $errors->all() ) )
                            <ul class="alert alert-danger text-left">
                                @foreach( $errors->all() as $error )
                                    <li style="margin-left: 18px;">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if( Session::has('success') )
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{Session::forget('success')}}
                            </div>
                        @endif

                        {{ Form::open( ['action' => 'RegistrationController@store', 'method' => 'post' ] ) }}

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="committee">Committee</label>
                                        <input type="text" class="form-control" name="committee" id="committee" placeholder="Committee" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="Country">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="amount-paid">Amount Paid</label>
                                        <select name="amount-paid" class="form-control" id="amount-paid" required>
                                            <option value="2400" selected>₹2400</option>
                                            <option value="2999">₹2999</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="payment-type">Payment Type</label>
                                        <select name="payment-type" class="form-control" id="payment-type" required>
                                            <option value="online" selected>Online</option>
                                            <option value="offline">Offline</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group" id="dep-field-1">
                                        <label for="townscript-id">Townscript ID</label>
                                        <input type="text" class="form-control" name="townscript-id" id="townscript-id" placeholder="Townscript ID" required>
                                    </div>
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-lg btn-dark">Submit</button>
                            </div>
                         {{ Form::close() }}
                    </div><!-- .card-body -->
                </div><!-- .card -->
            </div>
        </div><!-- .row -->

        <footer class="rf-footer mt-3 mt-sm-5 text-center" style="color: #fff">
            <p>&copy; Copyright <a href="http://titc2018.com" target="_blank">TITC 2018</a>. &nbsp;All rights reserved.</p>
        </footer>

    </div>

@endsection