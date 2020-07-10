@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/responsible")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Editar Responsável</h1>
    <form name="register" id="register" method="post" action="{{url("responsible/$responsible->id")}}">
        @method('PUT')
        @csrf
        <input class="form-control" type="number" name="registration" id="registration" value="{{$responsible->registration}}">
        <input class="form-control" type="text" name="name" id="name" value="{{$responsible->name}}">
        <input class="form-control" type="text" name="email" id="email" value="{{$responsible->email}}">
        <select class="form-control" name="sector_id" id="sector_id" required>
            <option value="">Selecione</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select><br>
        <input class="btn-outline-secondary" type="submit" value="Salvar">
    </form>
</div>

@endsection