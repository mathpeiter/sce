@extends('layouts.app')

@section('content')
  <div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
</div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Lista de Manutenções</h1>

    <form name="search" id="search" method="post" action="{{url("maintenance/search")}}">
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
            <th scope="col">Usuario</th>
            <th scope="col">Patrimonio</th>
            <th scope="col">Data Inicio</th>
            <th scope="col">Data Fim</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($maintenances as $maintenance)
          <tr>
            <td>{{$maintenance->id}}</td>
            <td>{{$maintenance->user_id}}</td>
            <td>{{$maintenance->patrimony}}</td>
            <td>{{$maintenance->start_date}}</td>
            <td>{{$maintenance->end_date}}</td>
            <td>
              <a href="{{url("maintenance/$maintenance->id")}}">
                <button class="btn btn-outline-secondary">Info</button>
              </a>
            </td>
            <td>
              <a href="{{url("maintenance/$maintenance->id/edit")}}">
                <button class="btn btn-outline-secondary">Editar</button>
              </a>
            </td>
          @endforeach
        </tbody>
      </table>
  </div>

@endsection