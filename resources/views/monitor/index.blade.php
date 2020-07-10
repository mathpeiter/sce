@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("/monitor/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
  </div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Lista de Monitores</h1>

    <form name="search" id="search" method="post" action="{{url("monitor/search")}}">
      @csrf
      <div class="input-group">
        @csrf
        <input class="form-control" type="number" name="search" id="search" placeholder="Patrimonio" required>
        <input class="btn-outline-secondary" type="submit" value="Buscar">
      </div>
    </form>

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
            </td>
            <td>
              <a href="{{url("monitor/$monitor->id/edit")}}">
                <button class="btn btn-outline-secondary">Editar</button>
              </a>
            </td>
          @endforeach
        </tbody>
      </table>
  </div>

@endsection