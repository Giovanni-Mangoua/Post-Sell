@extends('boxing.model')

@section('content')
<div class="container">
            <div class="col-lg-offset-2 col-lg-8 col-xs-12">
                <div class="account-box">
                    <div class="text-box">
                        <h2>New Password</h2>
                    </div>
                    <center>
                        <div class="alerta alert-success">
                            <h4>Please create a new password that you don't use on any other site and don't update the Email Address.</h4>
                        </div>
                    </center><br/>

                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="mail" id="mail" class="form-control" 
                                    placeholder="Email Address"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" 
                                    placeholder="Create new password"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <input type="password" name="password1" id="password1" class="form-control" 
                                    placeholder="Confirm your password"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection