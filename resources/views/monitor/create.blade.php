@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/monitor")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Cadastrar Monitor</h1>
    <form name="register" id="register" method="post" action="{{url("monitor")}}">
        @csrf
        <input class="form-control" type="number" name="patrimony" id="patrimony" placeholder="Patrimonio" required>
        <input class="form-control" type="text" name="brand" id="brand" placeholder="Marca" required>
        <input class="form-control" type="text" name="model" id="model" placeholder="Modelo" required>
        <input class="form-control" type="text" name="screen" id="screen" placeholder="Tela" required>
        <input class="form-control" type="text" name="sn" id="sn" placeholder="SN" required><br>
        <input class="btn-outline-secondary" type="submit" value="Cadastrar">
    </form>
</div>

@endsection