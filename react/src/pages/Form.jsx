import { useState } from "react";
import axios from 'axios';
import {Link} from 'react-router-dom';


export function Form(){

    const [values,setValues] = useState({prenom:'',nom:'',mail:'',mot_passe:''})
    const [errors,setErrors] = useState({})

    function HandlerInput(e){
        const newObj = {...values,[e.target.name]:e.target.value}
        setValues(newObj)
    }

    function Validation(values){
        const errors = {}

        if (values.prenom === "") {
            errors.prenom = "Prenom is Required"
        }
        if (values.nom === "") {
            errors.nom = "Nom is Required"
        }
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
            const resp = await axios.post("http://localhost:8000/api/create/account/vendor",values)
            console.log(resp.data)
        } catch (error) {
            console.error("Une erreur s'est produite lors de l'insertion des donnees")   
        }
    }

    return <>
     <div className="container">
            <div className="col-lg-offset-2 col-lg-8 col-xs-12">
                <div className="account-box">
                    <div className="text-box">
                        <h2>Cr&eacute;er un Compte</h2>
                    </div>

                    <form method="post">
                        <div className="row">
                            <div className="col-lg-6 col-xs-12">
                                <div className={"form-group"+ errors.prenom && "has-feedback has-error"}>
                                    <label htmlFor="prenom">Prenom: </label>
                                    <input type="text" name="prenom" id="prenom" placeholder="Votre Prenom ..." 
                                    className="form-control" 
                                    onChange={HandlerInput}/>
                                    {errors.prenom && <><span className="glyphicon glyphicon-remove form-control-feedback">
                                    </span><span className="help-block">{errors.prenom}</span></>}
                                </div>
                            </div>
                            <div className="col-lg-6 col-xs-12">
                                <div className={"form-group"+ errors.nom && "has-feedback has-error"}>
                                    <label htmlFor="nom">Nom: </label>
                                    <input type="text" name="nom" id="nom" placeholder="Votre Nom ..." 
                                    className="form-control" 
                                    onChange={HandlerInput}/>
                                    {errors.nom && <><span className="glyphicon glyphicon-remove form-control-feedback">
                                    </span><span className="help-block">{errors.nom}</span></>}
                                </div>
                            </div>
                        </div>
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
                                    <Link to={'/'} className="btn btn-info">Retourner</Link>
                                    <button type="submit" onClick={HandlerValidation} className="btn btn-primary pull-right">Envoyer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </>
}
