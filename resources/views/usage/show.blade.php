@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/usage")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações da Movimentação</h1>
</div>

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
      <table class="table table-striped text-center">
          <tbody>
              <tr>
                <td>ID:</td>
                <td>{{$usage->id}}</td>
              </tr>
              <tr>
                @php
                  $user=$usage->find($usage->id)->relUser;
                @endphp
                <td>Usuário:</td>
                <td>{{$user->name}}</td>
              </tr>
              <tr>
                @php
                    $sector=$usage->find($usage->id)->relSector;
                @endphp
                <td>Setor:</td>
                <td>{{$sector->name}}</td>
              </tr>
              <tr>
                <td>Patrimônio:</td>
                <td>{{$usage->patrimony}}</td>
              </tr>
              <tr>
                <td>Data de Movimentação:</td>
                <td>{{$usage->start_date}}</td>
              </tr>
          </tbody>
        </table>
    </div>
</div>
@endsection