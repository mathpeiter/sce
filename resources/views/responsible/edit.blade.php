@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/responsible")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Editar Responsável</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("responsible/$responsible->id")}}">
            @method('PUT')
            @csrf
            Matrícula:
            <input class="form-control" type="number" name="registration" id="registration" value="{{$responsible->registration}}">
            Nome:
            <input class="form-control" type="text" name="name" id="name" value="{{$responsible->name}}">
            E-mail:
            <input class="form-control" type="text" name="email" id="email" value="{{$responsible->email}}"><br>
            <input class="btn btn-outline-secondary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection