@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/responsible")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações do Responsável</h1>
</div>

<div class="col-8 m-auto">
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
              <tr>
                @php
                  $sector=$responsible->find($responsible->id)->relSector;
                @endphp
                <td>Setor:</td>
                <td>{{$sector->name}}</td>
              </tr>
          </tbody>
        </table>
        <form name="delete" id="delete" method="post" action="{{url("responsible/$responsible->id")}}">
          @method('DELETE')
          @csrf
          <input class="btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
        </form>
      </div>
  </div>
@endsection