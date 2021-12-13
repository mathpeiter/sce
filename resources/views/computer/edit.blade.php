@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/computer")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Editar Computador</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("computer/$computer->id")}}">
            @method('PUT')
            @csrf
            Patrimônio:
            <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$computer->patrimony}}" required>
            Marca:
            <input class="form-control" type="text" name="brand" id="brand" value="{{$computer->brand}}" required>
            Modelo:
            <input class="form-control" type="text" name="model" id="model" value="{{$computer->model}}" required>
            S.O.:
            <input class="form-control" type="text" name="so" id="so" value="{{$computer->so}}" required>
            Processador:
            <input class="form-control" type="text" name="processor" id="processor" value="{{$computer->processor}}" required>
            RAM:
            <input class="form-control" type="text" name="ram" id="ram" value="{{$computer->ram}}" required>
            Memória:
            <input class="form-control" type="text" name="memory" id="memory" value="{{$computer->memory}}" required>
            SN:
            <input class="form-control" type="text" name="sn" id="sn" value="{{$computer->sn}}" required><br>
            <input class="btn btn-outline-secondary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection