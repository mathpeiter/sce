@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/computer")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-8">Informações do Computador</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <tbody>
        <tr>
          <td>ID:</td>
          <td>{{$computer->id}}</td>
        </tr>
        <tr>
          @php
            $user=$computer->find($computer->id)->relUser;
          @endphp
          <td>Usuário:</td>
          <td>{{$user->name}}</td>
        </tr>
        <tr>
          <td>Patrimonio:</td>
          <td>{{$computer->patrimony}}</td>
        </tr>
        <tr>
          <td>Marca:</td>
          <td>{{$computer->brand}}</td>
        </tr>
        <tr>
          <td>Modelo:</td>
          <td>{{$computer->model}}</td>
        </tr>
        <tr>
          <td>S.O.:</td>
          <td>{{$computer->so}}</td>
        </tr>
        <tr>
          <td>Processador:</td>
          <td>{{$computer->processor}}</td>
        </tr>
        <tr>
          <td>RAM:</td>
          <td>{{$computer->ram}}</td>
        </tr>
        <tr>
          <td>Memoria:</td>
          <td>{{$computer->memory}}</td>
        </tr>
        <tr>
          <td>S/N:</td>
          <td>{{$computer->sn}}</td>
        </tr>
        @php
          $monitors=$computer->find($computer->id)->relMonitor;
        @endphp
        @if ($monitors == "[]")
          <tr>
            <td>Monitor relacionado:</td>
            <td>Nenhum</td>
          </tr>
        @else
          @foreach ($monitors as $monitor)
          <tr>
            <td>Monitor relacionado:</td>
            <td>{{$monitor->patrimony}}</td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    <a href="{{url("computer/$computer->id/edit")}}">
      <button class="btn btn-outline-secondary">Editar</button>
    </a>
    <div class="btn-group" role="group">
      <div class="border">
        <form name="usage" id="usage" method="get" action="{{url("usage/create")}}">
          <input class="form-control" type="hidden" name="patrimony" id="patrimony" value="{{$computer->patrimony}}" required>
          <input class="btn btn-outline-secondary" type="submit" value="Movimentar">
        </form>
      </div>
      <div class="border">
        <form name="search" id="search" method="post" action="{{url("usage/search")}}">
          @csrf
          <input class="form-control" type="hidden" name="search" id="search" value="{{$computer->patrimony}}" required>
          <input class="btn btn-outline-secondary" type="submit" value="Consultar Movimentação">
        </form>
      </div>
      <div class="border">
        <form name="maintenance" id="maintenance" method="get" action="{{url("maintenance/create")}}">
          <input class="form-control" type="hidden" name="patrimony" id="patrimony" value="{{$computer->patrimony}}" required>
          <input class="btn btn-outline-secondary" type="submit" value="Registrar Manutenção">
        </form>
      </div>
      <div class="border">
        <form name="search" id="search" method="post" action="{{url("maintenance/search")}}">
          @csrf
          <input class="form-control" type="hidden" name="search" id="search" value="{{$computer->patrimony}}" required>
          <input class="btn btn-outline-secondary" type="submit" value="Consultar Manutenção">
        </form>
      </div>
      @if (auth()->user()->permission == true)
      <div class="border">
          <form name="delete" id="delete" method="post" action="{{url("computer/$computer->id")}}">
            @method('DELETE')
            @csrf
            <input class="btn btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
          </form>  
      </div>
      @endif
    </div>
  </div>

  <div class="col-8 m-auto">
    <h1 class="display-5">Histórico de Movimentação</h1>
  </div>
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