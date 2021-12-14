@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/usage")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Informações da Movimentação</h1>
  </div>
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
          <td>{{\Carbon\Carbon::parse($usage->start_date)->format('d/m/Y')}}</td>
        </tr>
      </tbody>
    </table>
    <div class="btn-group" role="group">
      <div class="border">
        <a href="{{url("usage/$usage->id/edit")}}">
          <button class="btn btn-outline-secondary">Editar</button>
        </a>
      </div>
      <div class="border">
          @if (auth()->user()->permission == true)
          <form name="delete" id="delete" method="post" action="{{url("usage/$usage->id")}}">
            @method('DELETE')
            @csrf
            <input class="btn btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
          </form>
          @endif
      </div>
    </div>
  </div>
</div>
@endsection