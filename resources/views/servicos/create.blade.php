@extends('adminlte::page')

@section('title', 'Cadastrar novo serviço')

@section('content_header')
<h1>Cadastrar novo serviço</h1>
@stop

@section('content')
  @include('_mensagens')

    <form action="{{ route('servicos.store') }}" method="post">
        @include('servicos._form')
    </form>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop