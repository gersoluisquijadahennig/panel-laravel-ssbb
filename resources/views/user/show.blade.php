@extends('layouts.app')

@section('content')
    
    <p>Nombre del usuario: {{ $user->id }}</p>
    <p>Correo electrónico: {{ $user->usuario }}</p>
    <p>Fecha de creación: {{ $user->personas_id }}</p>
    <p>Fecha de actualización: {{ $user->perfil_id }}</p>
    <p>Fecha de correo_electronico: {{ $user->correo_electronico }}</p>
    <p>Fecha de fecha_ingreso: {{ $user->fecha_ingreso }}</p>
    <p>Fecha de descripcion: {{ $user->descripcion }}</p>
    <p>Fecha de activo: {{ $user->activo }}</p>
    <p>Fecha de usuario_id_mod: {{ $user->usuario_id_mod }}</p>
    <p>Fecha de estabecimiento_id: {{ $user->estabecimiento_id }}</p>
    <p>Fecha de estab_unid_func_id: {{ $user->estab_unid_func_id }}</p>
    <p>Fecha de unidad_funcional_origen_id: {{ $user->unidad_funcional_origen_id }}</p>
    <p>Fecha de proyecto_predeterminado: {{ $user->proyecto_predeterminado }}</p>
    <p>Fecha de alias: {{ $user->alias }}</p>
    <p>Fecha de run: {{ $user->run }}</p>
    <p>Fecha de ultimo_acceso: {{ $user->ultimo_acceso }}</p>
    <p>Fecha de habilita_depuracion: {{ $user->habilita_depuracion }}</p>
    <p>Fecha de fecha_clave: {{ $user->fecha_clave }}</p>

    @foreach ($usersPostgres as $userPostgres)
        <li>{{ $userPostgres->name }} , {{ $userPostgres->email }}	,   {{ $userPostgres->password }}</li>
    @endforeach
@endsection