@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/monitor")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("/monitor/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
    <h1 class="display-5">Resultado da busca Monitores</h1>
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
        @foreach ($monitors as $monitor)
        @php
          $user=$monitor->find($monitor->id)->relUser;
        @endphp
        <tr>
          <td>{{$monitor->id}}</td>
          <td>{{$monitor->patrimony}}</td>
          <td>{{$monitor->brand}}</td>
          <td>{{$monitor->model}}</td>
          <td>{{$user->name}}</td>
          <td>
            <a href="{{url("monitor/$monitor->id")}}">
              <button class="btn btn-outline-secondary">Info</button>
            </a>
            <a href="{{url("monitor/$monitor->id/edit")}}">
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