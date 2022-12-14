@extends('adminlte::page')

@section('title', 'Lista de usuários')

@section('content_header')
<h1>Lista de usuários</h1>
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

    @forelse ($usuarios as $usuario)
         <tr>
           <th>{{$usuario->id}}</th>
           <td>{{$usuario->name}} </td>
            <td>
              <a href="{{ route('usuarios.edit', $usuario)}}" class="btn btn-primary">Editar</a>
              <a href="{{ route('usuarios.destroy', $usuario)}}" class="btn btn-danger">Excluir</a>
            </td>
            
        </tr>
    @empty
        <th></th>
        <td>Nenhum usuario foi encontrado.</td>
        <th></th>
    @endforelse

  </tbody>

</table>
<div class="d-flex justify-content-center">
{{$usuarios->links()}}
</div>

<div class="float-right">
  <a href="{{route('usuarios.create')}}" class="btn btn-success">Cadastrar novo usuário</a>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop