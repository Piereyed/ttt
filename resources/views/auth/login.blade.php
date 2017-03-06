@extends('layouts.app')

@section('content')

<!--
<div class="container">
<div class="row">
<div class="col m8 offset-m2">
<div class="panel panel-default">

<div class="panel-body">
<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">Correo:</label>

<div class="col-md-6">
<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="password" class="col-md-4 control-label">Contraseña:</label>

<div class="col-md-6">
<input id="password" type="password" class="form-control" name="password" required>

@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<div class="checkbox">
<label>
<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
</label>
</div>
</div>
</div>

<div class="form-group">
<div class="col-md-8 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Ingresar
</button>

<a class="btn btn-link" href="{{ route('password.request') }}">
Olvidé mi contraseña
</a>
</div>
</div>
</form>
</div>



</div>
</div>
</div>
</div>
-->


<div id="loader-wrapper">
    <div id="loader"></div>        
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="{{ asset('images/logo.png')}}" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Powergym</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">                    
                    <i class="large material-icons prefix">email</i>
                    <input  id="email" name="email" type="text" value="{{ old('email') }}" required>
                    <label class="active" for="email">Correo</label>
                    @if ($errors->has('email'))
                    <div style="margin-left:40px">
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12 {{ $errors->has('password') ? ' has-error' : '' }}">
                    <i class="large material-icons prefix">lock</i>
                    <input  id="password" type="password" name="password"  required>
                    <label class="active" for="password" >Contraseña</label>
                    @if ($errors->has('password'))
                    <div style="margin-left:40px">
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">          
                <div class="input-field col s12 m12 l12  login-text">
                    <input type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : '' }} >
                    <label for="remember-me">Recuérdame</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn black waves-effect waves-light col s12">Iniciar sesión</button>
                </div>
            </div>
            <div class="row">                
                <div class="input-field col s12">
                    <p class="margin center-align medium-small"><a href="{{ route('password.request') }}">Olvidé mi contraseña</a></p>
                </div>          
            </div>

        </form>
    </div>
</div>
@endsection
