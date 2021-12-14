@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/maintenance")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Editar Manutenção</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("maintenance/$maintenance->id")}}">
            @method('PUT')
            @csrf
            Parimônio:
            <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$maintenance->patrimony}}" required readonly>
            Data Inicio:
            <input class="form-control" type="date" name="start_date" id="start_date" value="{{$maintenance->start_date}}" required>
            Problema:
            <input class="form-control" type="text" name="problem" id="problem" value="{{$maintenance->problem}}" required>
            Data Fim:
            <input class="form-control" type="date" name="end_date" id="end_date" value="{{$maintenance->end_date}}" required>
            Solução:
            <input class="form-control" type="text" name="solution" id="solution" value="{{$maintenance->solution}}" required><br>
            <input class="btn btn-outline-secondary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection