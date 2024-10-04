@extends('.\boxing\model')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-offset-2 col-lg-5">
            <div class="page-header">
                <h3>Listes des Articles</h3>
                <a href="{{route('vue.admin')}}" class="btn btn-primary pull-right">Retourner &agrave; l'accueil</a>
            </div><br/>
            <div class="row">
                @foreach($liste as $list)
                  <div class="boxing">
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="http://localhost:8000{{$list->fichier_url}}" alt="" width="100%">
                            </div>
                            <div class="col-lg-4">
                                <h6>Nom de l'article: <strong>{{$list->nom}}</strong></h6>
                                <h6>Desrition: <strong>{{$list->description}}</strong></h6>
                                <h6>Quantite: <strong>{{$list->quantite}}</strong></h6>
                                <h6>Prix Unitaire: <strong>{{$list->prix}}</strong></h6>
                            </div>
                        </div>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection