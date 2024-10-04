@extends('boxing.model')

@section('content')

<!-- DashBoard du vendeur -->
<div class="dashboard-container">

    <!-- main-sidebar -->
    <div class="main-sidebar">
        <div class="main-sidebar">
            <div class="aside-header">
                <div class="brand">
                    <a href="http://localhost:3000/" style="font-size: 2em; color: #000; font-family:'Times New Roman', Times, serif;">
                        <img src="{{Storage::url('logo/images.png')}}" alt="Logo" style="width:30px;border-radius: 16px;">
                            Post&Sell
                    </a>
                    <div class="close" id="closeSidebar">
                        <span class="material-icons-sharp">close</span>
                    </div>
                </div>
                
            </div>
            <div class="sidebar">
                <ul class="list-items tabs">
                    <li class="item">
                        <a href="#" class="active" id="1">
                            <span class="material-icons-sharp">dashboard</span>
                            <span>Tableau de Bord</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#" id="2">
                            <span class="material-icons-sharp">people</span>
                            <span>Clients</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#" id="3">
                            <span class="material-icons-sharp">textsms</span>
                            <span>Commande</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#" id="4">
                            <span class="material-icons-sharp">textsms</span>
                            <span>Articles</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="{{route('view.add.post')}}" >
                            <span class="material-icons-sharp">add</span>
                            <span>Ajouter un article</span>
                        </a>
                    </li>
                    <li class="item">
                        @auth
                            <a href="{{route('logout')}}">
                                <span class="material-icons-sharp">logout</span>
                                <span>Se D&eacute;connecter</span>
                            </a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- main-conatiner -->
    <div class="main-container tabs-content">
        <div class="tab-content active1" id="1">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-xs-5 main-title">DashBoard</div>
                <div class="col-lg-offset-2 col-xs-offset-2 col-md-4 col-xs-4 col-lg-4">
                    <div class="header-right">
                        <button class="toggle-menu-btn" id="openSidebar">
                            <span class="material-icons-sharp">menu</span>
                        </button>

                        <div class="profile">
                            <div class="profile-info">
                                <h4>Salut, <strong>{{\Illuminate\Support\Facades\Auth::user()->name}}</strong></h4>
                            </div>
                           <!-- <div class="profile-image">
                                <img src="{{Storage::url('logo/OIG.jpg')}}" alt="avatar" width="50px">
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- card -->
            <div class="insights">
                <div class="card">
                    <div class="card-container">
                        <div class="card-header">
                            <span class="material-icons-sharp">bar_chart</span>
                        </div>
                        <div class="card-body">
                            <div class="card-info">
                                <h4>Totals des Clients</h4>
                                <h2 class="text-color-1"><strong>{{$totalClients}}</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-container">
                        <div class="card-header">
                            <span class="material-icons-sharp">bar_chart</span>
                        </div>
                        <div class="card-body">
                            <div class="card-info">
                                <h4>Totals des Commandes</h4>
                                <h2 class="text-secondary"><strong>{{$totalCommand}}</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-container">
                        <div class="card-header">
                            <span class="material-icons-sharp">bar_chart</span>
                        </div>
                        <div class="card-body">
                            <div class="card-info">
                                <h4>Totals des Articles</h4>
                                <h2 class="text-third"><strong>{{$totalArticle}}</strong></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Select Command -->
            <section class="recent-orders">
                <div class="ro-title">
                    <h3 class="recent-orders-title">Dernieres Commandes</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>N`</th>
                            <th>Nom du Client</th>
                            <th>Pr&eacute;nom du Client</th>
                            <th>Email du Client</th>
                            <th>Numero de T&eacute;l&egrave;phone</th>
                            <th>Quantit&eacute;</th>
                            <th>Articles Command&eacute;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lastcommand as $last)
                          <tr>
                            <td>{{$last->id}}</td>
                            <td>{{$last->nom_pers}}</td>
                            <td>{{$last->prenom_pers}}</td>
                            <td>{{$last->email_pers}}</td>
                            <td>{{$last->phone_pers}}</td>
                            <td>{{$last->quantity}}</td>
                            <td><a href="{{route('show.post',$last->post_id)}}" class="btn btn-info">Voir</a></td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
        <div class="tab-content" id="2">
            <div class="page-header">
                <h2>Listes de Vos Clients</h2>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>N`</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>T&eacute;l&egrave;phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listClient as $list)
                      <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->nom_pers}}</td>
                        <td>{{$list->prenom_pers}}</td>
                        <td>{{$list->email_pers}}</td>
                        <td>{{$list->phone_pers}}</td>
                      </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-content" id="3">
            <div class="page-header">
                <h2>Listes de Vos Commandes</h2>
            </div>
            <table class="table table-striped">
                <thead>
                        <tr>
                            <th>N`</th>
                            <th>Nom du Client</th>
                            <th>Pr&eacute;nom du Client</th>
                            <th>Email du Client</th>
                            <th>Numero de T&eacute;l&egrave;phone</th>
                            <th>Quantit&eacute;</th>
                            <th>Articles Command&eacute;</th>
                        </tr>
                </thead>
                <tbody>
                        @foreach($listCommand as $last)
                          <tr>
                            <td>{{$last->id}}</td>
                            <td>{{$last->nom_pers}}</td>
                            <td>{{$last->prenom_pers}}</td>
                            <td>{{$last->email_pers}}</td>
                            <td>{{$last->phone_pers}}</td>
                            <td>{{$last->quantity}}</td>
                            <td><a href="{{route('show.post',$last->post_id)}}" class="btn btn-info">Voir</a></td>
                          </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-content" id="4">
            <section>
                <div class="page-header">
                    <h2>Listes de Vos Articles</h2>
                </div>
                <div class="search">
                    <div class="row">
                        <div class="col-lg-offset-2 col-lg-6 col-xs-offset-2 col-xs-8">
                            <form action="" method="post" class="form-inline">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                    <input type="search" name="search" id="search" class="form-control" placeholder="Search ..." >
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <article>
                <div class="product-container">
                    @foreach($posts as $post)
                    <div class="box">
                        <img src="{{Storage::url($post->fichier)}}" alt="image" />
                        <div class="content">
                            <p>Nom: {{$post->nom}}</p>
                            <p>Description: {{$post->description}}</p>
                            <p>Quantit&eacute;: {{$post->quantite}}</p>
                            <span>Prix: {{number_format($post->prix,0,".",",")}}&nbsp;Fcfa</span>
                            <div class="row">
                                <div class="col-lg-5 col-xs-12">
                                    <div class="form-group">
                                        <a href="{{route('modfify.post',$post->id)}}" class="btn btn-primary btn-block">Modifier</a>
                                    </div>
                                </div>
                                <div class="col-lg-offset-1 col-lg-5 col-xs-12">
                                    <div class="form-group">
                                        <a href="{{route('delete.post',$post->id)}}" class="btn btn-danger btn-block">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{$posts->links()}}
            </article>
        </div>
    </div>
</div>
@endsection