@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/maintenance")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações da Manutenção</h1>
</div>

<!--'id','user_id','patrimony','brand','model','so','processor','ram','memory','sn',-->

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
      <table class="table table-striped text-center">
          <tbody>
              <tr>
                <td>ID:</td>
                <td>{{$maintenance->id}}</td>
              </tr>
              <tr>
                @php
                  $user=$maintenance->find($maintenance->id)->relUser;
                @endphp
                <td>Usuário:</td>
                <td>{{$user->name}}</td>
              </tr>
              <tr>
                <td>Patrimonio:</td>
                <td>{{$maintenance->patrimony}}</td>
              </tr>
              <tr>
                <td>Data inicio:</td>
                <td>{{$maintenance->start_date}}</td>
              </tr>
              <tr>
                <td>Descrição do Problema:</td>
                <td>{{$maintenance->problem}}</td>
              </tr>
              <tr>
                <td>Data fim:</td>
                <td>{{$maintenance->end_date}}</td>
              </tr>
              <tr>
                <td>Descrição da Solução:</td>
                <td>{{$maintenance->solution}}</td>
              </tr>
          </tbody>
        </table>
        @if (auth()->user()->permission == true)
        <form name="delete" id="delete" method="post" action="{{url("maintenance/$maintenance->id")}}">
          @method('DELETE')
          @csrf
          <input class="btn btn-outline-secondary" type="submit" value="Excluir" onclick="return confirm('Tem certeza que deseja deletar este registro?')">
        </form>
        @endif
        <a href="{{url("maintenance/$maintenance->id/edit")}}">
          <button class="btn btn-outline-secondary">Editar</button>
        </a>
    </div>
</div>
@endsection