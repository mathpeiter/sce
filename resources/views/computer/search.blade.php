@extends('layouts.app')

@section('content')
  <div class="col-8 m-auto">
    <a href="{{url("/computer")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("computer/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
</div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Busca de Computadores</h1>

    <form name="search" id="search" method="post" action="{{url("computer/search")}}">
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
            </td>
            <td>
              <a href="{{url("computer/$computer->id/edit")}}">
                <button class="btn btn-outline-secondary">Editar</button>
              </a>
            </td>
          @endforeach
        </tbody>
      </table>
  </div>

@endsection