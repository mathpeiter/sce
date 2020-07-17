@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("/sector/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
  </div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Lista de Setores</h1>

    <form name="search" id="search" method="post" action="{{url("sector/search")}}">
      @csrf
      <div class="input-group">
        @csrf
        <input class="form-control" type="text" name="search" id="search" placeholder="Nome" required>
        <input class="btn-outline-secondary" type="submit" value="Buscar">
      </div>
    </form>

    <table class="table table-striped text-center">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Responsável</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($sectors as $sector)
          @php
            $responsible=$sector->find($sector->id)->relReponsible;
          @endphp
          <tr>
            <td>{{$sector->id}}</td>
            <td>{{$sector->name}}</td>
            @if ($responsible)
              <td>{{$responsible->name}}</td>
            @else
              <td>Responsável Não Cadastrado</td>
            @endif
            <td>
            <a href="{{url("sector/$sector->id")}}">
              <button class="btn btn-outline-secondary">Info</button>
            </a>
            </td>
            <td>
              <a href="{{url("sector/$sector->id/edit")}}">
                <button class="btn btn-outline-secondary">Editar</button>
              </a>
            </td>
          @endforeach
        </tbody>
      </table>
  </div>

@endsection