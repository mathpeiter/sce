@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/responsible")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Cadastrar Responsável</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("responsible")}}">
            @csrf
            Matrícula:
            <input class="form-control" type="number" name="registration" id="registration" placeholder="Matricula" required>
            Nome:
            <input class="form-control" type="text" name="name" id="name" placeholder="Nome" required>
            E-mail:
            <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" required>
            <br><input class="btn btn-outline-secondary" type="submit" value="Cadastrar">
        </form>
    </div>
</div>
@endsection