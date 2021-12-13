@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <a href="{{url("computer/create")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
    <h1 class="display-8">Lista de Computadores</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Buscar por Patrimônio</th>
          <th scope="col">Buscar por Setor</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form name="search1" id="search1" method="post" action="{{url("computer/search")}}">
              @csrf
              <div class="input-group">
                @csrf
                <input class="form-control" type="number" name="search1" id="search1" placeholder="Patrimônio" required>
                <input class="btn btn-outline-secondary" type="submit" value="Buscar">
              </div>
            </form>
          </td>
          <td>
            <form name="search2" id="search2" method="post" action="{{url("computer/search")}}">
              @csrf
              <div class="input-group">
                @csrf
                <select class="form-control" type="text" name="search2" id="search2" required>
                  <option value="0">Não Movimentado</option>
                    @foreach ($sectors as $sector)
                        <option value="{{$sector->id}}">{{$sector->name}}</option>
                    @endforeach
                </select>
                <input class="btn btn-outline-secondary" type="submit" value="Buscar">
              </div>
            </form>
          </td>
        </tr>
      </tbody>
    </table>
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
        @endforeach
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection