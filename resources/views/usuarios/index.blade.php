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
      <th scope="col">Email </th>
        <th scope="col">Ações</th>
  </tr>
  </thead>

  <tbody>

    @forelse ($usuarios as $usuario)
         <tr>
           <th>{{$usuario->id}}</th>
           <td>{{$usuario->name}} </td>
           <td>{{$usuario->email}}</td>
            <td>
              <a href="{{ route('usuarios.edit', $usuario)}}" class="btn btn-primary">Editar</a>
              <form action="{{route('usuarios.destroy', $usuario)}}" style="display:inline;" method="post">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza de que deseja excluir?')">Excluir</button>
              </form>
          
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