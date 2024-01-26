@extends('layouts.app')

@section('content')
    <p>Nombre del usuario: {{ $user->name }}</p>
    <p>Correo electrónico: {{ $user->email }}</p>
    <p>Fecha de creación: {{ $user->created_at }}</p>
    <p>Fecha de actualización: {{ $user->updated_at }}</p>
    <p>Fecha de eliminación: {{ $user->deleted_at }}</p>
@endsection