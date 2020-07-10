@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/responsible")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Cadastrar Responsável</h1>
    <form name="register" id="register" method="post" action="{{url("responsible")}}">
        @csrf
        <input class="form-control" type="number" name="registration" id="registration" placeholder="Matricula" required>
        <input class="form-control" type="text" name="name" id="name" placeholder="Nome" required>
        <input class="form-control" type="text" name="email" id="email" placeholder="E-mail" required>
        <select class="form-control" name="sector_id" id="sector_id" required>
            <option value="1">Selecione</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>
        <input class="btn-outline-secondary" type="submit" value="Cadastrar">
    </form>
</div>

@endsection