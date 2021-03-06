@extends('layouts.app')

@section('content')
@section('body-class', 'signup-page')
<div class="header header-filter" style="background-image: url('{{asset('/img/city.jpg')}}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('register') }}">
                         @csrf
                        <div class="header header-primary text-center">
                            <h4>Registro    </h4>
                            {{-- <div class="social-line">
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#pablo" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> --}}
                        </div>
                        <p class="text-divider">Completa tus datos</p>
                        <div class="content">

                           <div class="input-group">
                               <span class="input-group-addon">
                                <i class="material-icons">face</i>
                               </span>
                               <input type="text" class="form-control" placeholder="Nombre completo" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                           </div>
                            <!--datos del correo electronico-->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  placeholder="Correo electronico" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <!--contraseña  del correo electronico-->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password"  placeholder="Confirmar" class="form-control"  name="password">
                               
                            </div>
                            <!--contraseña confirmacion  del correo electronico-->
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password"  placeholder="Confirmar Contraseña" class="form-control"  
                                name="password_confirmation" requireds>
                               
                            </div>
                            <!-- If you want to add a checkbox to this form, uncomment this code-->
                            <!--Recordar datos del correo electronico-->
                            {{-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                   Recordar Sesion
                                </label>
                            </div>  --}}
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-simple btn-primary btn-lg">Confirmar Registro</a>
                        </div>
                       {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')

</div>

@endsection