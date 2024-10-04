@extends('boxing.model')

@section('content')
<div class="container">
            <div class="col-lg-offset-2 col-lg-8 col-xs-12">
                <div class="account-box">
                    <div class="text-box">
                        <h2>Forget Password</h2>
                    </div>
                    <center>
                        <h4>Enter your email address</h4>
                    </center>

                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="mail" id="mail" class="form-control" 
                                    placeholder="Enter Email Address"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection