import logo from '../images/images.png';
import img1 from '../images/t1.jpg';
import img3 from '../images/bg.png';
import { Component, useEffect ,useRef, useState } from 'react';
import Swiper from 'swiper';
import axios from 'axios';
import {Link} from 'react-router-dom';


function MySwiperComponent() {
    const swiperRef = useRef(null);

    const [data, setData] = useState([]);

    const ReceivePost = async () => {
        // Appel de l'API côté serveur lors du montage du composant
        await axios.get("http://localhost:8000/api/sending/post")
        .then(response => setData(response.data))
        .catch(error => console.error('Erreur lors de l\'appel de l\'API', error));
    }

    useEffect(() => {
        ReceivePost();
    }, []);

    var rowsImage = []

    data.map( (item) => {
        rowsImage.push(<div className="swiper-slide box"  key={item.id}>
        <img src={'http://localhost:8000'+item.fichier_url} alt=""/>
        <div className="content">
            <a href="#" className="bt">Buy Now</a>
        </div>
    </div>)
    })

    const nextSlide = () => {
        if (swiperRef.current && swiperRef.current.swiper) {
            swiperRef.current.swiper.slideNext();
        }
    }

    const prevSlide = () => {
        if (swiperRef.current && swiperRef.current.swiper) {
            swiperRef.current.swiper.slidePrev();
        }
    }

    useEffect( () => {
        if (swiperRef.current) {
            const mySwiper = new Swiper(swiperRef.current, {
                loop: true, //Defilement en boucle
                autoplay: {delay:2000}, //Defailer toutes les 2s
                navigation:{nextEl: '.swiper-button-next',prevEl: '.swiper-button-prev'}
            });
            return () => mySwiper.destroy();
        }
    },[]);

    return <>
    <div id="new" className="new">
        <div className="heading">
            <h1>The <span>Arrivals</span></h1>
        </div>
        <div ref={swiperRef} className="swiper-container new-arrival">
            <div className="swiper-wrapper">
                {rowsImage}
            </div>
            <div className="swiper-button-prev" onClick={prevSlide}></div>
            <div className="swiper-button-next" onClick={nextSlide}></div>
        </div>
    </div>
    </>
}

function Footer() {

    return <>
      <footer className="footer">
        <div className="footer-box">
            <h2>Post&Sell</h2>
            <p>
                C'est une plateforme qui permet aux internautes de pouvoir acheter les produits ou articles qui sont post&eacute;s
                sur la plateforme. Tous achats s'effectue de maniere transparente entre le client et le fournisseur.
            </p>
            <div className="social">
                <a href=""><i className="bx bxl-facebook"></i></a>
                <a href=""><i className="bx bxl-twitter"></i></a>
                <a href=""><i className="bx bxl-instagram"></i></a>
                <a href=""><i className="bx bxl-tiktok"></i></a>
            </div>
        </div>

        <div className="footer-box">
            <h3>Support</h3>
            <li><a href="" className="nav-link">Products</a></li>
            <li><a href="" className="nav-link">Help & Support</a></li>
            <li><a href="" className="nav-link">Return Policy</a></li>
            <li><a href="" className="nav-link">Terms Of Use</a></li>
            <li><a href="" className="nav-link">FAQ</a></li>
        </div>

        <div className="footer-box">
            <h3>Vos Liens</h3>
            <li><a href="#home">Home</a></li>
            <li><a href="#new">New</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="http://localhost:8000/post">Add a Post</a></li>
        </div>

        <div className="footer-box">
            <h3>Payment Method</h3>
            <div className="payment">
                <p>Visa Card</p>
                <p>MTN Momo</p>
                <p>Orange Money</p>
            </div>
        </div>
    </footer>

    <div className="copyright">
        <p>&#169; GiovanniDevelopperAI All Right Reserved. </p>
    </div>
    </>
}

class Products extends Component{

    constructor(props){
        super(props)
        this.state = {data:[]}
        this.ReceivePost = this.ReceivePost.bind(this)
        this.HandlerSearch = this.HandlerSearch.bind(this)
    }

    componentDidMount(){
        this.ReceivePost()
    }

    ReceivePost = async () => {
        // Appel de l'API côté serveur lors du montage du composant
        await axios.get("http://localhost:8000/api/sending/post")
        .then(response => this.setState({data : [...response.data]}))
        .catch(error => console.error('Erreur lors de l\'appel de l\'API', error));
    }

    HandlerSearch = async (e) => {
        try {
            const resp = await axios.get("http://localhost:8000/api/receive/post/"+e.target.value);
            //console.log(resp.data.message)
            this.setState({data:[...resp.data.message]})
        } catch (error) {
            console.error("Une erreur s'est produite")   
        }
    }

    render() {
        var rows = []
        {this.state.data.map( (item) => {
            rows.push(<div className="box" key={item.id}>
                <img src={'http://localhost:8000'+item.fichier_url} alt="image"className='img-thumbnail' />
                <div className="content">
                    <h2>{item.nom}</h2>
                    <div className="stars">
                        <i className="bx bxs-star"></i>
                        <i className="bx bxs-star"></i>
                        <i className="bx bxs-star"></i>
                        <i className="bx bxs-star"></i>
                        <i className="bx bxs-star-half"></i> 
                    </div>
                    <span>{item.description}</span><br/>
                    <span>{item.prix} Fcfa</span><br/>
                    <span><a href={'https://wa.me/679759191'} target='_blank' rel='noreferrer'>Contactez-moi sur Whatsapp</a></span>
                    <Link to={`/commande/${item.id}`}><i className="bx bx-cart-alt"></i></Link>
                </div>
           </div>)
        })}
        return <>
       <div className="product" id="products">
        <div className="heading">
            <h1>Our <span>Products</span></h1>
        </div>
        <div className="row">
                <div className="col-lg-5 col-xs-10">
                    <form method='post'>
                        <div className="input-group ">
                            <input type="search" name="search" id="search" 
                            className="form-control" onChange={this.HandlerSearch} placeholder="Search ......." />
                            
                        </div>
                    </form>
                </div>
        </div>
        <div className="product-container">
            {rows}
        </div>
    </div>
    </>
    }
}

function Section(){

    return <>
        <section id="home" className="home">
            <div className="home-image">
                <img src={img3} alt="" />
            </div>
            <div className="home-text">
                <span>Buy Now</span>
                <h1>New Arrival of <br/>Fresh Products</h1>
                <a href="" className="bouton">Shop Now</a>
            </div>
        </section>
    </>
}

export function MyApp(){

    const HandlerMenu = () => {
        document.querySelector('.navbar').classList.toggle('active')
    }

    const HandlerMessagePosts = () => {
        document.querySelector('#flex_message').classList.toggle('active_message');
    }

    const HandlerMessage = () => {
        document.querySelector('#flex_message').classList.remove('active_message');
    }

        return <>
            <header>
            
                <a href="#" id="logo">
                    <img src={logo} alt="" />
                    Post&Sell
                </a>
        
                <ul className="navbar">
                    <li><a href="#home" className="nav-link">Home</a></li>
                    <li><a href="#new" className="nav-link">New</a></li>
                    <li><a href="#products" className="nav-link">Products</a></li>
                    <li><a href="http://localhost:8000/posts" className="nav-link" onMouseEnter={HandlerMessagePosts}
                    onMouseOut={HandlerMessage}>Posts</a></li>
                    <p className="message" id='flex_message'>Vous devenez vendeur en choissiant cette option</p>
                </ul>

                <div className="header-icons">
                    <i className="bx bx-menu" id="menu-icon" onClick={HandlerMenu}></i>
                </div>
    
            </header>

            <Section />

            <MySwiperComponent />

            <Products />

            <Footer />
        </>
}
