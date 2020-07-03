@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/computer")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações do Computador</h1>
</div>

<!--'id','user_id','patrimony','brand','model','so','processor','ram','memory','sn',-->

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
      <table class="table table-striped text-center">
          <tbody>
              <tr>
                <td>ID:</td>
                <td>{{$computer->id}}</td>
              </tr>
              <tr>
                <td>Usuário:</td>
                <td>{{$computer->user_id}}</td>
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
          </tbody>
        </table>
        <form name="delete" id="delete" method="post" action="{{url("computer/$computer->id")}}">
          @method('DELETE')
          @csrf
          <input class="btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
        </form>
    </div>
</div>
@endsection