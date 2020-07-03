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
                <td>Usuario:</td>
                <td>{{$monitor->user_id}}</td>
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
    </div>
</div>
@endsection