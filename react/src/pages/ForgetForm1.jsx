export function FormForget(){

    return <>
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
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className="form-group">
                                    <input type="email" name="mail" id="mail" className="form-control" 
                                    placeholder="Enter Email Address"
                                    /> 
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className="form-group">
                                    <button type="submit" className="btn btn-primary btn-block">Continue</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </>
}