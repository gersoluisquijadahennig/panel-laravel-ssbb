@extends('layouts.app')

@section('content')
    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>
    <p>Fecha de creación: {{ $user->created_at }}</p>
    <p>Fecha de actualización: {{ $user->updated_at }}</p>
    <p>Fecha de eliminación: {{ $user->deleted_at }}</p>

    @foreach ($usuariosOracle as $usuario)
        {{-- Aqui puedes mostrar el usuario en una lista --}}
        <li>{{ $usuario->usuario }} , {{ $usuario->clave }}	,   {{ $usuario->clave_historial }}</li>
    @endforeach
@endsection