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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electrónico:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña:</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="btn black waves-effect waves-light col s12"> Reestablecer contraseña</button>
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
        <form class="login-form" role="form" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="input-field col s12 center">

                    <p class="center login-form-text">Reestablecer contraseña</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12 {{ $errors->has('email') ? ' has-error' : '' }}">                    
                    <i class="large material-icons prefix">email</i>
                    <input  id="email" name="email" type="email" value="{{ $email or old('email') }}" required>
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

            <div class="row margin">
                <div class="input-field col s12 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <i class="large material-icons prefix">lock</i>
                    <input  id="password-confirm" type="password" name="password_confirmation"  required>
                    <label class="active" for="password-confirm" >Confirmar contraseña</label>
                    @if ($errors->has('password_confirmation'))
                    <div style="margin-left:40px">
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" class="btn black waves-effect waves-light col s12"> Reestablecer contraseña</button>
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
