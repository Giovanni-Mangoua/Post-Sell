@extends('boxing.model')

@section('content')
<div class="container">
            <div class="col-lg-offset-2 col-lg-8 col-xs-12">
                <div class="account-box">
                    <div class="text-box">
                        <h2>Cr&eacute;er un Compte</h2>
                    </div>

                    <form action="{{route('store.account')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-xs-12">
                                <div class="form-group @error('prenom') has-error has-feedback @enderror">
                                    <label for="prenom">Prenom: </label>
                                    <input type="text" name="prenom" id="prenom" placeholder="Votre Prenom ..." 
                                    class="form-control" value="{{old('prenom')}}"/>
                                    @error('prenom')
                                        <span class="help-block">Veuillez inserer votre Pr&eacute;nom</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                                <div class="form-group @error('nom') has-error has-feedback @enderror">
                                    <label for="nom">Nom: </label>
                                    <input type="text" name="nom" id="nom" placeholder="Votre Nom ..." 
                                    class="form-control" value="{{old('nom')}}"/>
                                    @error('nom')
                                        <span class="help-block">Veuillez inserer votre Nom</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group @error('mail') has-error has-feedback @enderror">
                                    <label for="email" >Email: </label>
                                    <input type="email" name="mail" id="mail" placeholder="example@gmail.com" 
                                    class="form-control" value="{{old('mail')}}"/>
                                    @error('mail')
                                        <span class="help-block">Veuillez inserer votre Email</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group @error('mot_passe') has-error has-feedback @enderror">
                                    <label for="mot_passe">Mot de passe: </label>
                                    <input type="password" name="mot_passe" id="mot_passe" placeholder="Password" 
                                    class="form-control" value="{{old('mot_passe')}}"/>
                                    @error('mot_passe')
                                        <span class="help-block">Veuillez inserer votre Mot de Passe</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                    <a href="{{route('login')}}" class="btn btn-info btn-block">Retourner</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
@endsection