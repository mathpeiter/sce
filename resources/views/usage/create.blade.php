@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/computer")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Movimentar Equipamento</h1>
    <form name="register" id="register" method="post" action="{{url("usage")}}">
        @csrf
        <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$patrimony}}" readonly required>
        <select class="form-control" name="sector_id" id="sector_id" required>
            <option value="">Selecione</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>
        <input class="form-control" type="date" name="start_date" id="start_date" placeholder="Data Inicio" required>
        <input class="btn btn-outline-secondary" type="submit" value="Cadastrar">
    </form>
</div>

@endsection