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
                <td>Patrimonio:</td>
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
                <td>Tela:</td>
                <td>{{$monitor->screen}}</td>
              </tr>
              <tr>
                <td>S/N:</td>
                <td>{{$monitor->sn}}</td>
              </tr>
          </tbody>
        </table>
        <form name="delete" id="delete" method="post" action="{{url("monitor/$monitor->id")}}">
          @method('DELETE')
          @csrf
          <input class="btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
        </form>
        <form name="usage" id="usage" method="get" action="{{url("usage/create")}}">
          <input class="form-control" type="hidden" name="patrimony" id="patrimony" value="{{$monitor->patrimony}}" required>
          <input class="btn-outline-secondary" type="submit" value="Movimentar">
        </form>
      </div>
  </div>
  <div class="col-8 m-auto">
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
      <tr>
        <td>{{$usage->id}}</td>
        <td>{{$usage->user_id}}</td>
        <td>{{$usage->sector_id}}</td>
        <td>{{$usage->patrimony}}</td>
        <td>{{$usage->start_date}}</td>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
@endsection