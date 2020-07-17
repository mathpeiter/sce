@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/maintenance")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Nova Manutenção</h1>
    <form name="register" id="register" method="post" action="{{url("maintenance")}}">
        @csrf
        <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$patrimony}}" readonly required>
        <input class="form-control" type="date" name="start_date" id="start_date" placeholder="Data Inicio" required>  
        <input class="form-control" type="text" name="problem" id="problem" placeholder="Descrição do Problema" required>
        <input class="form-control" type="date" name="end_date" id="end_date" placeholder="Data Fim">
        <input class="form-control" type="text" name="solution" id="solution" placeholder="Descrição da Solução"><br>
        <input class="btn-outline-secondary" type="submit" value="Cadastrar">
    </form>
</div>

@endsection