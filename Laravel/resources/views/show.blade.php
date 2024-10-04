@extends('boxing.model')

@section('content')

<div class="container">
    <h3 class="page-header"><STRONG>PRODUITS COMMAND&Eacute;S PAR LE CLIENT</STRONG></h3>
    @foreach($res as $res)
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10 col-xs-12">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{Storage::url($res->fichier)}}" alt="" class="img-thumbnail">
                </div>
                <div class="col-lg-6">
                    <h4><s>Article</s></h4>
                    <p>Nom de l'article: <strong>{{$res->nom}}</strong></p>
                    <p>Description de l'article: <strong>{{$res->description}}</strong></p>
                    <p>Prix Unitaire: <strong>{{$res->prix}}</strong></p>
                    <a href="{{route('dash')}}" class="btn btn-success">Retourner</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection