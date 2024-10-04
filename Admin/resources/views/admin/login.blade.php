@extends('.\boxing\model')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-5 col-xs-12">
                <div class="boxing"> 
                    <h3>Login</h3>
                    <div class="content">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                Ce compte n'existe pas
                            </div>
                        @endif
                        <form action="{{route('admin.login')}}" method="post">
                            @csrf
                            <div class="form-group @error('email') has-error has-feedback @enderror">
                                <label for="email" class="@error('email') control-label @enderror">Email: </label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com" class="form-control" value="{{old('email')}}">
                                @error('email')
                                    <span class="help-block">Veuillez inserer votre adresse mail</span>
                                @enderror
                            </div>
                            <div class="form-group @error('password') has-error has-feedback @enderror">
                                <label for="password" class="@error('password') control-label @enderror">Password: </label>
                                <input type="password" name="password" id="password" class="form-control" value="{{old('password')}}" placeholder="@eri34">
                                @error('password')
                                    <span class="help-block">Veuillez inserer votre mot de passe</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection