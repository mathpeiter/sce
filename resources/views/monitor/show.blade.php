@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/monitor")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações do Monitor</h1>
</div>

<!--'id','user_id','patrimony','brand','model','screen','sn',-->

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
      <table class="table table-striped text-center">
          <tbody>
              <tr>
                <td>ID:</td>
                <td>{{$monitor->id}}</td>
              </tr>
              <tr>
                @php
                  $user=$monitor->find($monitor->id)->relUser;
                @endphp
                <td>Usuário:</td>
                <td>{{$user->name}}</td>
              </tr>
              <tr>
                <td>Patrimônio:</td>
                <td>{{$monitor->patrimony}}</td>
              </tr>
              <tr>
                <td>Marca:</td>
                <td>{{$monitor->brand}}</td>
              </tr>
              <tr>
                <td>Modelo:</td>
                <td>{{$monitor->model}}</td>
              </tr>
              <tr>
                <td>Polegadas:</td>
                <td>{{$monitor->screen}}</td>
              </tr>
              <tr>
                <td>S/N:</td>
                <td>{{$monitor->sn}}</td>
              </tr>
              <tr>
                @php
                  $computer=$monitor->find($monitor->id)->relComputer;
                @endphp

                @if ($computer == null)
                  <td>Computador relacionado:</td>
                  <td>Nenhum</td>
                @else
                  <td>Computador relacionado:</td>
                  <td>{{$computer->patrimony}}</td>
                @endif
              </tr>
          </tbody>
        </table>
        <a href="{{url("monitor/$monitor->id/edit")}}">
          <button class="btn btn-outline-secondary">Editar</button>
        </a>
        <form name="usage" id="usage" method="get" action="{{url("usage/create")}}">
          <input class="form-control" type="hidden" name="patrimony" id="patrimony" value="{{$monitor->patrimony}}" required>
          <input class="btn btn-outline-secondary" type="submit" value="Movimentar">
        </form>
        <form name="search" id="search" method="post" action="{{url("usage/search")}}">
          @csrf
          <div class="input-group">
            @csrf
            <input class="form-control" type="hidden" name="search" id="search" value="{{$monitor->patrimony}}" required>
            <input class="btn btn-outline-secondary" type="submit" value="Consultar Movimentação">
          </div>
        </form>
        <form name="maintenance" id="maintenance" method="get" action="{{url("maintenance/create")}}">
          <input class="form-control" type="hidden" name="patrimony" id="patrimony" value="{{$monitor->patrimony}}" required>
          <input class="btn btn-outline-secondary" type="submit" value="Registrar Manutenção">
        </form>
        <form name="search" id="search" method="post" action="{{url("maintenance/search")}}">
          @csrf
          <div class="input-group">
            @csrf
            <input class="form-control" type="hidden" name="search" id="search" value="{{$monitor->patrimony}}" required>
            <input class="btn btn-outline-secondary" type="submit" value="Consultar Manutenção">
          </div>
        </form>
        @if (auth()->user()->permission == true)
        <form name="delete" id="delete" method="post" action="{{url("monitor/$monitor->id")}}">
          @method('DELETE')
          @csrf
          <input class="btn btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
        </form>
        @endif
      </div>
  </div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Histórico de Movimentação</h1>
    <div class="col-8 m-auto">
  <table class="table table-striped text-center">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Usuário</th>
        <th scope="col">Setor</th>
        <th scope="col">Patrimônio</th>
        <th scope="col">Data de Movimentação</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($usages as $usage)
      @php
      $user=$usage->find($usage->id)->relUser;
      $sector=$usage->find($usage->id)->relSector;
    @endphp
      <tr>
        <td>{{$usage->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$sector->name}}</td>
        <td>{{$usage->patrimony}}</td>
        <td>{{\Carbon\Carbon::parse($usage->start_date)->format('d/m/Y')}}</td>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
@endsection