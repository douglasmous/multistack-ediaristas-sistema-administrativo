@extends('adminlte::page')

@section('title', 'Lista de serviços')

@section('content_header')
<h1>Lista de Serviços</h1>
@stop

@section('content')

@if (session('mensagem'))
    <div class="alert alert-success">
      {{ session('mensagem')}}
    </div>
@endif

<table class="table">

  <thead>
  <tr>
    <th scope="col">ID</th>
      <th scope="col">Nome</th>
        <th scope="col">Ações</th>
  </tr>
  </thead>

  <tbody>

    @forelse ($servicos as $servico)
         <tr>
           <th>{{$servico->id}}</th>
           <td>{{$servico->nome}} </td>
            <td><a href="{{ route('servicos.edit', $servico)}}" class="btn btn-primary">Atualizar</a></td>
        </tr>
    @empty
        <th></th>
        <td>Nenhum servico foi encontrado.</td>
        <th></th>
    @endforelse

  </tbody>

</table>
<div class="d-flex justify-content-center">
{{$servicos->links()}}
</div>

<div class="float-right">
  <a href="{{route('servicos.create')}}" class="btn btn-success">Cadastrar novo serviço</a>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop