@extends('layouts.app')

@section('content')
  <div class="col-8 m-auto">
    <a href="{{url("/usage")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
</div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Histórico de Uso</h1>

    <form name="search" id="search" method="post" action="{{url("usage/search")}}">
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
            <th scope="col">Usuário</th>
            <th scope="col">Setor</th>
            <th scope="col">Patrimônio</th>
            <th scope="col">Data de Movimentação</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($usages as $usage)
          <tr>
            <td>{{$usage->id}}</td>
            <td>{{$usage->user_id}}</td>
            <td>{{$usage->sector_id}}</td>
            <td>{{$usage->patrimony}}</td>
            <td>{{$usage->start_date}}</td>
            <td>
              <a href="{{url("usage/$usage->id")}}">
                <button class="btn btn-outline-secondary">Info</button>
              </a>
            </td>
            <td>
              <a href="{{url("usage/$usage->id/edit")}}">
                <button class="btn btn-outline-secondary">Editar</button>
              </a>
            </td>
          @endforeach
        </tbody>
      </table>
  </div>

@endsection