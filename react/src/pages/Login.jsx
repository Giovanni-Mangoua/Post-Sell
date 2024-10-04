import { useState } from "react";
import axios from 'axios';
import {Link} from 'react-router-dom';


export function Login(){

    const [id,setId] = useState(0)
    const [values,setValues] = useState({mail:'',mot_passe:''})
    const [errors,setErrors] = useState({})

    function HandlerInput(e){
        const newObj = {...values,[e.target.name]:e.target.value}
        setValues(newObj)
    }

    function Validation(values){
        const errors = {}
        if(values.mail === ""){
            errors.mail = "Email is Required"
        }
        if (values.mot_passe === "") {
            errors.mot_passe = "Password is Required"
        }
        return errors
    }

    const HandlerValidation = async (e) => {
        e.preventDefault();
        setErrors(Validation(values))
        try {
            const resp = await axios.post("http://localhost:8000/api/vendor/login",values)
            setId(resp.data.id)
        } catch (error) {
            console.error("Une erreur s'est produite lors de l'insertion des donnees")   
        }
    }

    return <>
     <div className="container">
            <div className="col-lg-offset-2 col-lg-8 col-xs-12">
                <div className="account-box">
                    <div className="text-box">
                        <h2>Login Here</h2>
                    </div>

                    <form method="post">
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className={"form-group"+ errors.mail && "has-feedback has-error"}>
                                    <label htmlFor="mail">Email: </label>
                                    <input type="email" name="mail" id="mail" placeholder="example@gmail.com" 
                                    className="form-control" 
                                    onChange={HandlerInput}/>
                                    {errors.mail && <><span className="glyphicon glyphicon-remove form-control-feedback">
                                    </span><span className="help-block">{errors.mail}</span></>}
                                </div>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className={"form-group"+ errors.mot_passe && "has-feedback has-error"}>
                                    <label htmlFor="mot_passe">Mot de passe: </label>
                                    <input type="password" name="mot_passe" id="mot_passe" placeholder="Password" 
                                    className="form-control" 
                                    onChange={HandlerInput}/>
                                    {errors.mot_passe && <><span className="glyphicon glyphicon-remove form-control-feedback">
                                    </span><span className="help-block">{errors.mot_passe}</span></>}
                                </div>
                            </div>
                        </div><br/>
                        <div className="row">
                            <div className="col-lg-12 col-xs-12">
                                <div className="form-group">
                                    <button type="submit" onClick={HandlerValidation} className="btn btn-primary pull-right">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p>Forget Your Password <Link to={'/create/account/vendor'} className="nav-link">Reset Password</Link></p>
                    <p>Don't have an account <Link to={'/create/account/vendor'} className="nav-link">Create account</Link></p>
                </div>
                
            </div>
        </div>
    </>
}
