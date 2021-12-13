@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <a href="{{url("/user")}}">
    <button class="btn btn-outline-secondary">Voltar</button>
  </a>
  <h1 class="display-5">Informações do Usuário</h1>
</div>

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
      <table class="table table-striped text-center">
          <tbody>
              <tr>
                <td>ID:</td>
                <td>{{$user->id}}</td>
              </tr>
              <tr>
                <td>Nome:</td>
                <td>{{$user->name}}</td>
              </tr>
              <tr>
                <td>CPF:</td>
                <td>{{$user->cpf}}</td>
              </tr>
              <tr>
                <td>Celular:</td>
                <td>{{$user->cell}}</td>
              </tr>
              <tr>
                <td>E-mail:</td>
                <td>{{$user->email}}</td>
              </tr>
              <tr>
                <td>Permisão:</td>
                <td>{{$user->permission}}</td>
              </tr>
          </tbody>
        </table>
    </div>
</div>
@endsection