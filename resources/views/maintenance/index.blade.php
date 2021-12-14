@extends('layouts.app')

@section('content')
<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Lista de Manutenções</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Buscar por Patrimônio</th>
          <th scope="col">Buscar Manutenções Não Finalizadas</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form name="search1" id="search1" method="post" action="{{url("maintenance/search")}}">
              @csrf
              <div class="input-group">
                @csrf
                <input class="form-control" type="number" name="search1" id="search1" placeholder="Patrimônio" required>
                <input class="btn btn-outline-secondary" type="submit" value="Buscar">
              </div>
            </form>
          </td>
          <td>
            <form name="search2" id="search2" method="post" action="{{url("maintenance/search")}}">
              @csrf
              <input class="btn btn-outline-secondary" type="submit" value="Buscar">
            </form>
          </td>
        </tr>
      </tbody>
    </table>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Usuario</th>
          <th scope="col">Patrimonio</th>
          <th scope="col">Data Inicio</th>
          <th scope="col">Data Fim</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($maintenances as $maintenance)
        @php
          $user=$maintenance->find($maintenance->id)->relUser;
        @endphp
        <tr>
          <td>{{$maintenance->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$maintenance->patrimony}}</td>
          <td>{{$maintenance->start_date}}</td>
          <td>{{$maintenance->end_date}}</td>
          <td>
            <a href="{{url("maintenance/$maintenance->id")}}">
              <button class="btn btn-outline-secondary">Info</button>
            </a>
            <a href="{{url("maintenance/$maintenance->id/edit")}}">
              <button class="btn btn-outline-secondary">Editar</button>
            </a>
          </td>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection