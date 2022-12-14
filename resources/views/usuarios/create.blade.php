@extends('adminlte::page')

@section('title', 'Cadastrar novo usuário')

@section('content_header')
<h1>Cadastrar novo usuário</h1>
@stop

@section('content')
  @include('_mensagens')

    <form action="{{ route('usuarios.store') }}" method="post">
        @include('usuarios._form')
    </form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

