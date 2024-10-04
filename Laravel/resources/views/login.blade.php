@extends('boxing.model')

@section('content')
<div class="container">
    <div class="col-lg-offset-2 col-lg-8 col-xs-12">
        <div class="account-box">
        @if (session('error'))
        <div class="alert alert-danger">
        {{session('error')}}
        </div>
        @endif
            <div class="text-box">
                <h2>Login Here</h2>
            </div>
            <form action="{{route('connecting')}}" method="post">
                @csrf
                <div class="form-group @error('email') has-error has-feedback @enderror">
                    <input type="email" name="email" id="email" placeholder="example@gmail.com" 
                    class="form-control" value="{{old('email')}}"/>
                    @error('email')
                        <span class="help-block">Veuillez inserer votre Email</span>
                    @enderror
                </div>
                <div class="form-group @error('password') has-error has-feedback @enderror">
                    <input type="password" name="password" id="password" placeholder="Password" 
                    class="form-control" value="{{old('password')}}"/>
                    @error('password')
                        <span class="help-block">Veuillez inserer votre Mot de Passe</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <p>Forget Your Password  <a href="" class="text-warning">Cliquer Ici</a></p>
                <p>Don't have an account <a href="{{route('create.account')}}" class="text-warning">Create an account</a></p>
            </form>
        </div>
    </div>
</div>  
@endsection