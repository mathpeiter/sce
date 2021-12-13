@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/sector")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Cadastrar Setor</h1>
    <form name="register" id="register" method="post" action="{{url("sector")}}">
        @csrf
        Nome:
        <input class="form-control" type="text" name="name" id="name" placeholder="Nome" required>
        <input class="btn btn-outline-secondary" type="submit" value="Cadastrar">
    </form>
</div>

@endsection