@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/responsible")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Informações do Responsável</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <tbody>
        <tr>
          <td>ID:</td>
          <td>{{$responsible->id}}</td>
        </tr>
        <tr>
          <td>Matricula:</td>
          <td>{{$responsible->registration}}</td>
        </tr>
        <tr>
          <td>Nome:</td>
          <td>{{$responsible->name}}</td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td>{{$responsible->email}}</td>
        </tr>
        @php
        $sectors=$responsible->find($responsible->id)->relSector;
        @endphp
        @if ($sectors == "[]")
          <tr>
            <td>Setor relacionado:</td>
            <td>Nenhum</td>
          </tr>
        @else
          @foreach ($sectors as $sector)
          <tr>
            <td>Setor relacionado:</td>
            <td>{{$sector->name}}</td>
          </tr>
          @endforeach
        @endif
      </tbody>
    </table>
    <div class="btn-group" role="group">
      <div class="border">
        <a href="{{url("responsible/$responsible->id/edit")}}">
          <button class="btn btn-outline-secondary">Editar</button>
        </a>
      </div>
      <div class="border">
        @if (auth()->user()->permission == true)
        <form name="delete" id="delete" method="post" action="{{url("responsible/$responsible->id")}}">
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