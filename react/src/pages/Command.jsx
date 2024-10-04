import '../dist/css/bootstrap.css';
import '../Style.css';
import logo from '../images/images.png';
import { useNavigate, useParams } from "react-router-dom";
import {Link} from 'react-router-dom';
import { useState,useEffect } from 'react';
import axios from 'axios';

function MyApp(){

    const HandlerMenu = () => {
        document.querySelector('.navbar').classList.toggle('active')
    }
        return <>
            <header>
            
                <a href="#" id="logo">
                    <img src={logo} alt="" />
                    Post&Sell
                </a>
        
                <ul className="navbar">
                    <Link to={'/'}  className="nav-link">Home</Link>
                </ul>

                <div className="header-icons">
                    <i className="bx bx-menu" id="menu-icon" onClick={HandlerMenu}></i>
                </div>
    
            </header>
        </>
}

function Form({data}){

    const [val,setVal] = useState(0)
    const [values,setValues] = useState({nom:'',prenom:'',email:'',phone:'',quantity:''});
    const [error,setError] = useState({})
    const {id} = useParams()

    function HandlerInput(e){
        const newObj = {...values,[e.target.name]:e.target.value}
        setValues(newObj)
    }

    function validate(values){
        const errors = {}
        if (values.nom === '') {
            errors.nom = 'Ce champ est requis'
        }
        if (values.prenom === '') {
            errors.prenom = 'Ce champ est requis'
        }
        if(values.email === ''){
            errors.email = 'Ce champ est requis'
        }
        if(values.phone === ''){
            errors.phone = 'Ce champ est requis'
        }
        if (values.quantity === '') {
            errors.quantity = 'Ce champ est requis'
        }
        return errors
    }

    const HandlerChange = (e) => {
        const newObj = {...values,[e.target.name]:e.target.value}
        setValues(newObj)
        setVal(data*e.target.value)
    }

    const ShowNotification = (chaine) => {
        const notification = document.createElement('div')
        notification.classList.toggle('notification')
        notification.textContent = chaine
        document.getElementById('div').appendChild(notification)
        setTimeout(() => {
            notification.style.display = 'none'
        }, 10000);
    }

    const HandlerSubmit = async (e) => {
        e.preventDefault();
        setError(validate(values))
        try {
            const resp = await axios.post("http://localhost:8000/api/send/commande/"+id,values);
            ShowNotification('Commande envoyees avec succes')
        } catch (error) {
            console.error("Une erreur s'est produite lors de l'insertion des donnees")   
        }
    }

    return <>
    <div className="div"></div>
    <form method="post">
        <div className="row">
            <div className="col-lg-5">
                <div className={"form-group"+ error.nom && "has-feedback has-error"}>
                    <label htmlFor="nom">Votre Nom: </label>
                    <input type="text" name="nom" id="nom" className="form-control" onChange={HandlerInput}/>
                    {error.nom && <><span className="glyphicon glyphicon-remove form-control-feedback">
                    </span><span className="help-block">{error.nom}</span></>}
                </div>
            </div>
            <div className="col-lg-5">
                <div className={"form-group"+ error.prenom && "has-feedback has-error"}>
                    <label htmlFor="prenom">Votre Prenom: </label>
                    <input type="text" name="prenom" id="prenom" className="form-control" onChange={HandlerInput}/>
                    {error.prenom && <><span className="glyphicon glyphicon-remove form-control-feedback">
                    </span><span className="help-block">{error.prenom}</span></>}
                </div>
            </div>
        </div>
        <div className="row">
            <div className="col-lg-5">
                <div className={"form-group"+ error.email && "has-feedback has-error"}>
                    <label htmlFor="email">Votre Email: </label>
                    <input type="email" name="email" id="email" className="form-control" onChange={HandlerInput}/>
                    {error.email && <><span className="glyphicon glyphicon-remove form-control-feedback">
                    </span><span className="help-block">{error.email}</span></>}
                </div>
            </div>
            <div className="col-lg-5">
                <div className={"form-group"+ error.phone && "has-feedback has-error"}>
                    <label htmlFor="phone">Votre numero de Telephone: </label>
                    <input type="tel" name="phone" id="phone" className="form-control" onChange={HandlerInput}/>
                    {error.phone && <><span className="glyphicon glyphicon-remove form-control-feedback">
                    </span><span className="help-block">{error.phone}</span></>}
                </div>
            </div>
        </div>
        <div className="row">
            <div className="col-lg-5">
                <div className={"form-group"+ error.quantity && "has-feedback has-error"}>
                    <label htmlFor="quantity">Quantite: </label>
                    <input type="number" name="quantity" id="quantity" className="form-control"
                     onChange={HandlerChange}/>
                     {error.quantity && <><span className="glyphicon glyphicon-remove form-control-feedback">
                    </span><span className="help-block">{error.quantity}</span></>}
                </div>
            </div>
        </div>
        <div className="row">
            <div className="col-lg-5">
                <div className="form-group">
                    <h5>Prix &aacute; payer: <strong>{val}</strong></h5>
                </div>
            </div>
        </div>
        <div className="row">
            <div className="col-lg-5">
                <div className="form-group">
                    <button type="submit" className="btn btn-success" onClick={HandlerSubmit}>Commander</button>
                </div>
            </div>
        </div>
    </form>
    </>
}

export function Command() {

    const {id} = useParams()
    const [data,setData] = useState([]);

    const ReceiveData = async () => {
        // Appel de l'API côté serveur lors du montage du composant
        try {
            const resp = await axios.get("http://localhost:8000/api/file/"+id)
            setData(resp.data)
        } catch (error) {
            console.error('Erreur lors de l\'appel de l\'API', error);
        }
    }

    useEffect(() => {
        ReceiveData()
    }, []);

    return <>
       <MyApp />
       <br/><br/><br/><br/><br/><br/><br/>
       <div className="container">
         <div className="row">
            <div className="col-lg-offset-2 col-lg-5 col-xs-12">
                <h2 className="page-header">
                    Send Your Command
                </h2>
            </div>
         </div>
         <div className="row">
            <div className="col-lg-5">
                <img src={'http://localhost:8000'+data.file} alt="" className="img-thumbnail" /><br/>
                <h3><strong>Nom: {data.nom}</strong></h3>
                <h3><strong>Quantit&eacute; en Stock: {data.qte}</strong></h3>
                <h3><strong>Prix Unitaire: {data.price}</strong></h3>
            </div>
            <div className="col-lg-7">
                <Form data={data.price}/>
            </div>
         </div>
       </div>
    </>
}