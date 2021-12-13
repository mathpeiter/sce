@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/computer")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("computer/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
    <h1 class="display-8">Resultado da busca Computadores</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Patrimônio</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Usuário</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($computers as $computer)
        @php
          $user=$computer->find($computer->id)->relUser;
        @endphp 
        <tr>
          <td>{{$computer->id}}</td>
          <td>{{$computer->patrimony}}</td>
          <td>{{$computer->brand}}</td>
          <td>{{$computer->model}}</td>
          <td>{{$user->name}}</td>
          <td>
            <a href="{{url("computer/$computer->id")}}">
              <button class="btn btn-outline-secondary">Info</button>
            </a>
            <a href="{{url("computer/$computer->id/edit")}}">
              <button class="btn btn-outline-secondary">Editar</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection