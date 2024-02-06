@extends('adminlte::auth.auth-page', ['auth_type' => 'login'])

@section('adminlte_css_pre')
    <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('http://10.8.117.112/panel/portal/lib/css/estilo.css') }}">
@stop

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
@php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
    @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.login_message'))
<form id="form_acceso" action="" method="post" onsubmit="return enviar();" class="login">
    <input type="hidden" name="Proyectos" id="Proyectos" value="">
    <input type="hidden" name="resAncho" id="resAncho" value="">
    <input type="hidden" name="exito" id="exito" value="">
    <input type="hidden" name="nombres" id="nombres" value="">
    <input type="hidden" name="server" id="server" value="10.8.117.112">
    <input type="hidden" name="ip" id="ip" value="10.8.117.29">


    <p class="title" align="center" style="color:#165587">Panel de Documentos</p>
    <table class="tabla_login" border="0">
        <tbody><tr id="tr_principal">
            <td style="margin-top:0;">
                <div align="center">
                    <img src="http://10.8.117.112/panel/portal/lib/img/logo_ssbb.jpg" class="logo_login">
                </div>
            </td><td>
                <!-- RUT USUARIO -->
                <center style="margin-top: -30px"><img src="panel/portal/lib/img/logo_int.png" class="logo_movil"></center>
                <input type="text" name="usuario" id="usuario" class="txt_login" autocomplete="off" placeholder="Usuario" style="width:240px;" autofocus="" maxlength="9" required="">

                <!-- CLAVE USUARIO -->
                <input type="password" name="clave" id="clave" class="txt_login" placeholder="Contraseña" style="width:240px;" required="">

                    <a href="#" id="olvida_clave">¿Olvidaste tu contraseña?</a>

                <!-- SELECT PROYECTO -->
                   <div class="field" id="div_proyectos">
                    <select id="sProyectos" name="sProyectos" onkeypress="enviar_por_select(event)">
                                                                  <option value="5000|/panel/portal/lib/clases/psLogin.php ">
                                PANEL										</option>
                                                              </select>
                  </div>
            </td>
        </tr>
    </tbody></table>

    <button id="bt_ok" name="bt_ok" class="btn_ingresar">
        <i class="spinner"></i>
        <span class="state">Acceder</span>
    </button>
</form>
@section('auth_body')
    <form action="{{ $login_url }}" method="post">
        @csrf

        {{-- usuario field 
        <div class="input-group mb-3">
            <input type="text" name="usuario" class="form-control @error('usuario') is-invalid @enderror"
                   value="{{ old('usuario') }}" placeholder=" Ingrese su usuario" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('usuario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>--}}
        
        <div class="input-group mb-3">
            <input type="text" name="run" class="form-control"
                   value="{{ old('email') }}" placeholder="usuario" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="clave"  class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Login field --}}
        <div class="row">
            <div class="col-7">
                <div class="icheck-primary" title="{{ __('adminlte::adminlte.remember_me_hint') }}">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label for="remember">
                        {{ __('adminlte::adminlte.remember_me') }}
                    </label>
                </div>
            </div>

            <div class="col-5">
                <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                    <span class="fas fa-sign-in-alt"></span>
                    {{ __('adminlte::adminlte.sign_in') }}
                </button>
            </div>
        </div>

    </form>
@stop

@section('auth_footer')
    {{-- Password reset link --}}
    @if($password_reset_url)
        <p class="my-0">
            <a href="{{ $password_reset_url }}">
                {{ __('adminlte::adminlte.i_forgot_my_password') }}
            </a>
        </p>
    @endif

    {{-- Register link --}}
    @if($register_url)
        <p class="my-0">
            <a href="{{ $register_url }}">
                {{ __('adminlte::adminlte.register_a_new_membership') }}
            </a>
        </p>
    @endif
@stop
