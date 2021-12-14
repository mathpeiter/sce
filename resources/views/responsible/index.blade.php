@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("/responsible/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
    <h1 class="display-5">Lista de Responsáveis</h1>
  </div>
  <div class="col-8 m-auto">
    <form name="search" id="search" method="post" action="{{url("responsible/search")}}">
      @csrf
      <div class="input-group">
        @csrf
        <input class="form-control" type="number" name="search" id="search" placeholder="Matricula" required>
        <input class="btn btn-outline-secondary" type="submit" value="Buscar">
      </div>
    </form>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Matricula</th>
          <th scope="col">Nome</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($responsibles as $responsible)
        <tr>
          <td>{{$responsible->id}}</td>
          <td>{{$responsible->registration}}</td>
          <td>{{$responsible->name}}</td>
          <td>{{$responsible->email}}</td>
          <td>
            <a href="{{url("responsible/$responsible->id")}}">
              <button class="btn btn-outline-secondary">Info</button>
            </a>
            <a href="{{url("responsible/$responsible->id/edit")}}">
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