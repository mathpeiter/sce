@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
  <div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    @if (auth()->user()->permission == true)
    <a href="{{url("/register")}}">
      <button class="btn btn-outline-secondary">Cadastrar</button>
    </a>
    @endif
    <h1 class="display-5">Lista de Usuários</h1>
  </div>
  <div class="col-8 m-auto">
    <table class="table table-striped text-center">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">E-mail</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <a href="{{url("user/$user->id")}}">
                  <button class="btn btn-outline-secondary">Info</button>
                </a>
                @if (auth()->user()->permission == true)
                <a href="{{url("user/$user->id/edit")}}">
                  <button class="btn btn-outline-secondary">Editar</button>
                </a>
                @endif
              </td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection