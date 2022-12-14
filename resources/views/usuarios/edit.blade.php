@extends('adminlte::page')

@section('title', 'Editar usuário')

@section('content_header')
    <h1>Editar usuário</h1>
@stop

@section('content')
    @include('_mensagens')

    <form action="{{ route('usuarios.update', $usuario) }}" method="post">
        @method('PUT')

        @include('usuarios._form')
    </form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

