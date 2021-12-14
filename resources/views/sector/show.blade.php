@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/sector")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Informações do Setor</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <tbody>
        <tr>
          <td>ID:</td>
          <td>{{$sector->id}}</td>
        </tr>
        <tr>
          <td>Nome:</td>
          <td>{{$sector->name}}</td>
        </tr>
        <tr>
          @php
            $responsible=$sector->find($sector->id)->relReponsible;
          @endphp
          <td>Responsável:</td>
          @if ($responsible)
            <td>{{$responsible->name}}</td>
          @else
            <td>Responsável não cadastrado</td>
          @endif
        </tr>
      </tbody>
    </table>
    <div class="btn-group" role="group">
      <div class="border">
        <a href="{{url("sector/$sector->id/edit")}}">
          <button class="btn btn-outline-secondary">Editar</button>
        </a>
      </div>
      <div class="border">
        @if (auth()->user()->permission == true)
        <form name="delete" id="delete" method="post" action="{{url("sector/$sector->id")}}">
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