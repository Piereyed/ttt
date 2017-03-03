@extends('layouts.app')

@section('content')
<!--
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading">Reestablecer contraseña</div>
<div class="panel-body">
@if (session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif

<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
{{ csrf_field() }}

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">Correo:</label>

<div class="col-md-6">
<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group">
<div class="col-md-6 col-md-offset-4">
<button type="submit" class="btn btn-primary">
Enviar enlace para reestablecer contraseña
</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
-->

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">


        <form class="login-form" role="form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12 center">                    
                    <p class="center login-form-text">Reestablecer contraseña</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">                    
                    <i class="large material-icons prefix">email</i>
                    <input  id="email" name="email" type="email" value="{{ old('email') }}" required >
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

            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn black waves-effect waves-light col s12">Enviar enlace</button>
                </div>
                <div class="input-field col s12 center">
                    <a href="/login" class="btn btn-flat waves-effect waves-light ">
                        <i class="left large material-icons">navigate_before</i> Volver
                    </a>
                </div>
            </div>
            @if (session('status'))
            <div class="row">
                <div class="col s12 center" style="color:green" >
                    {{ session('status') }}
                </div>

            </div>   
            @endif         

        </form>
    </div>
</div>

@endsection
