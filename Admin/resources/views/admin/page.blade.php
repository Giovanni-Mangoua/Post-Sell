@extends('.\boxing\model')
@section('content')


    <div class="dashboard-container">

        <div class="main-sidebar">
            <div class="aside-header">
                <a href="#" style="font-size: 2em; color: #000; font-family:'Times New Roman', Times, serif;">
                    <img src="{{Storage::url('logo/images.png')}}" alt="Logo" style="width:30px;border-radius: 16px;">
                        Post&Sell
                </a>
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
                            <span class="material-icons-sharp">report</span>
                            <span>Listes des vendeurs</span>
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
                                    <p>Salut, <strong>Giovanni</strong></p>
                                </div>
                                <div class="profile-image">
                                    <img src="{{Storage::url('logo/OIG.jpg')}}" alt="avatar" width="50px">
                                </div>
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
                                    <h4>Totals des Vendeurs</h4>
                                    <h2 class="text-color-1"><strong>{{$nbVend}}</strong></h2>
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
                                    <h2 class="text-secondary"><strong>{{$nbCommand}}</strong></h2>
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
                                    <h2 class="text-third"><strong>{{$nbPost}}</strong></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Select Command -->
                <section class="recent-orders">
                    <div class="ro-title">
                        <h3 class="recent-orders-title">Listes des Vendeurs</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>N`</th>
                                <th>Nom du Vendeur</th>
                                <th>Pr&eacute;nom du Vendeur</th>
                                <th>Email du Vendeur</th>
                                <th>Les Articles du Vendeur</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listeFour as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->prenom}}</td>
                                <td>{{$list->email}}</td>
                                <td><a href="{{route('listing',$list->id)}}" class="btn btn-info">Consulter</a></td>
                                <td><a href="{{$list->id}}" class="btn btn-danger">Supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="tab-content" id="2">
                <div class="page-header">
                    <h2>Listes des Vendeurs</h2>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>N`</th>
                            <th>Nom du Vendeur</th>
                            <th>Pr&eacute;nom du Vendeur</th>
                            <th>Email du Vendeur</th>
                            <th>Les Articles du Vendeur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listVend as $list)
                           <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->prenom}}</td>
                                <td>{{$list->email}}</td>
                                <td><a href="{{route('listing',$list->id)}}" class="btn btn-info">Consulter</a></td>
                                <td><a href="{{$list->id}}" class="btn btn-danger">Supprimer</a></td>
                           </tr> 
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>

    </div>

@endsection