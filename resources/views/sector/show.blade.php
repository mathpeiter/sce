@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/sector")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações do Setor</h1>
</div>

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
      <table class="table table-striped text-center">
          <tbody>
              <tr>
                <td>ID:</td>
                <td>{{$sector->id}}</td>
              </tr>
              <tr>
                <td>Usuário:</td>
                <td>{{$sector->name}}</td>
              </tr>
          </tbody>
        </table>
        <form name="delete" id="delete" method="post" action="{{url("sector/$sector->id")}}">
          @method('DELETE')
          @csrf
          <input class="btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
        </form>
      </div>
  </div>
@endsection