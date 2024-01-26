@extends('layouts.app')

@section('css')
  <link href="{{ mix('laratrust.css', 'vendor/laratrust') }}" rel="stylesheet">
@stop
@section('js')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@stop

@section('content_header')
    <h1>Dashboard desde Vendor</h1>
@stop

@section('title', 'layout desde Vendor')

@section('content')
             
   
