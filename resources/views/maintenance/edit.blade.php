@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/maintenance")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Editar Manutenção</h1>
    <form name="register" id="register" method="post" action="{{url("maintenance/$maintenance->id")}}">
        @method('PUT')
        @csrf
        <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$maintenance->patrimony}}" required>
        <input class="form-control" type="date" name="start_date" id="start_date" value="{{$maintenance->start_date}}" required>
        <input class="form-control" type="text" name="problem" id="problem" value="{{$maintenance->problem}}" required>
        <input class="form-control" type="date" name="end_date" id="end_date" value="{{$maintenance->end_date}}" required>
        <input class="form-control" type="text" name="solution" id="solution" value="{{$maintenance->solution}}" required><br>
        <input class="btn-outline-secondary" type="submit" value="Salvar">
    </form>
</div>

@endsection