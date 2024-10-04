export function FormForgetReset(){

    return <>
       <div class="container">
            <div class="col-lg-offset-2 col-lg-8 col-xs-12">
                <div class="account-box">
                    <div class="text-box">
                        <h2>New Password</h2>
                    </div>
                    <center>
                        <div className="alerta alert-success">
                            Please create a new password that you don't use on any other site.
                        </div>
                    </center><br/>

                    <form action="" method="post">
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className="form-group">
                                    <input type="password" name="password" id="password" className="form-control" 
                                    placeholder="Create new password"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className="form-group">
                                    <input type="password" name="password1" id="password1" className="form-control" 
                                    placeholder="Confirm your password"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className="form-group">
                                    <button type="submit" className="btn btn-primary btn-block">Change</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </>
}