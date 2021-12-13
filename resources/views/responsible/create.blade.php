@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/responsible")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Cadastrar Responsável</h1>
    <form name="register" id="register" method="post" action="{{url("responsible")}}">
        @csrf
        Matrícula:
        <input class="form-control" type="number" name="registration" id="registration" placeholder="Matricula" required>
        Nome:
        <input class="form-control" type="text" name="name" id="name" placeholder="Nome" required>
        E-mail:
        <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" required>
        Setor:
        <select class="form-control" name="sector_id" id="sector_id" required>
            <option value="1">Selecione</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>

        <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            @foreach ($sectors as $sector)
                <input type="checkbox" class="btn-check" id="{{$sector->id}}" value="{{$sector->id}}" autocomplete="off">
                <label class="btn btn-outline-secondary" for="{{$sector->id}}">{{$sector->name}}</label>
            @endforeach
        </div>
        <br><input class="btn btn-outline-secondary" type="submit" value="Cadastrar">
    </form>
</div>

@endsection