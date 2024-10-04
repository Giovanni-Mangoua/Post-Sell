@extends('boxing.model')

@section('content')
<div class="container">
            <div class="col-lg-offset-2 col-lg-8 col-xs-12">
                <div class="account-box">
                    <div class="text-box">
                        @if ($posts->exists)
                            <h2>Modifier le Post</h2>
                        @else
                            <h2>Ajouter un Post</h2>
                        @endif
                    </div>
                    @if ($posts->exists)
                    <form action="{{route('update.post',$posts->id)}}" method="post" enctype="multipart/form-data">
                    @else
                    <form action="{{route('store.post',Illuminate\Support\Facades\Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group @error('nom') has-error has-feedback @enderror">
                                    <label for="nom" class="@error('nom') control-label @enderror">Nom: </label>
                                    <input type="text" name="nom" id="nom" placeholder="Votre Nom ..." 
                                    class="form-control" value="{{old('nom',$posts->nom)}}"/>
                                    @error('nom')
                                        <span class="help-block">Veuillez inserer votre nom</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group @error('description') has-error has-feedback @enderror">
                                    <label for="description" class="@error('description') control-label @enderror">Description: </label>
                                    <textarea name="description" id="description" cols="3" rows="3" 
                                    class="form-control" placeholder="Description ...."></textarea>
                                    @error('description')
                                        <span class="help-block">Veuillez inserer votre description</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="form-group @error('prix') has-error has-feedback @enderror">
                                    <label for="prix" class="@error('prix') control-label @enderror">Prix: </label>
                                    <input type="number" name="prix" id="prix" class="form-control"
                                    placeholder="Prix ...." value="{{old('prix',$posts->prix)}}">
                                    @error('prix')
                                        <span class="help-block">Veuillez inserer le prix</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="form-group @error('quantite') has-error has-feedback @enderror">
                                    <label for="quantite" class="@error('quantite') control-label @enderror">Quantit&eacute;: </label>
                                    <input type="number" name="quantite" id="quantite" class="form-control"
                                    placeholder="Quantite ...." value="{{old('quantite',$posts->quantite)}}">
                                    @error('quantite')
                                        <span class="help-block">Veuillez inserer la quantite</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group @error('fichier') has-error has-feedback @enderror">
                                    <label for="fichier" class="@error('fichier') control-label @enderror">Selectionnez un fichier: </label>
                                    <input type="file" name="fichier" id="fichier" class="form-control">
                                    @error('fichier')
                                        <span class="help-block">Veuillez inserer le fichier</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                @if ($posts->exists)
                                <button type="submit" class="btn btn-primary btn-block">Modifier</button>
                                @else
                                <button type="submit" class="btn btn-primary btn-block">Ajouter</button>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <a href="{{route('dash')}}" class="btn btn-info btn-block">Retourner</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
@endsection