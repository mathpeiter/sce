@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/report")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Equipamentos por Setor</h1>
  </div>
  <div class="col-8 m-auto">
    <form name="search1" id="search1" method="post" action="{{url("/search1")}}">
      @csrf
      <div class="input-group">
        @csrf
        <select class="form-control" type="text" name="search1" id="search1" required>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>
        <input class="btn btn-outline-secondary" type="submit" value="Buscar">
      </div>
    </form>
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">Equipamento</th>
          <th scope="col">Patrimônio</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Setor</th>
          <th scope="col">Usuário</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>

      <tbody>
        @php
            $count = 1;
        @endphp
        @foreach ($computers as $computer)
        @php
          $user=$computer->find($computer->id)->relUser;
          $monitors=$computer->find($computer->id)->relMonitor;
          $sector=$computer->find($computer->id)->relSector;
        @endphp
        <tr>
          <th colspan="7">Equipamento {{$count}}</th>
        </tr>
        <tr>
          <td>Computador</td>
          <td>{{$computer->patrimony}}</td>
          <td>{{$computer->brand}}</td>
          <td>{{$computer->model}}</td>
          @if ($sector != null)
            <td>{{$sector->name}}</td>
          @else
            <td>Não Movimentado</td>
          @endif
          <td>{{$user->name}}</td>
          <td>
            <a href="{{url("computer/$computer->id")}}">
              <button class="btn btn-outline-secondary">Info</button>
            </a>
            <a href="{{url("computer/$computer->id/edit")}}">
              <button class="btn btn-outline-secondary">Editar</button>
            </a>
          </td>
          @foreach ($monitors as $monitor)
          @php
            $user=$monitor->find($monitor->id)->relUser;
            $sector=$monitor->find($monitor->id)->relSector;
          @endphp
          <tr>
            <td>Monitor</td>
            <td>{{$monitor->patrimony}}</td>
            <td>{{$monitor->brand}}</td>
            <td>{{$monitor->model}}</td>
            @if ($sector != null)
              <td>{{$sector->name}}</td>
            @else
              <td>Não Movimentado</td>
            @endif
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
          @php
              $count++;
          @endphp
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection