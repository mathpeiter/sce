@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/monitor")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Cadastrar Monitor</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("monitor")}}">
            @csrf
            Patimônio:
            <input class="form-control" type="number" name="patrimony" id="patrimony" placeholder="Patrimonio" required>
            Marca:
            <input class="form-control" type="text" name="brand" id="brand" placeholder="Marca" required>
            Modelo:
            <input class="form-control" type="text" name="model" id="model" placeholder="Modelo" required>
            Polegadas:
            <input class="form-control" type="text" name="screen" id="screen" placeholder="Polegadas" required>
            SN:
            <input class="form-control" type="text" name="sn" id="sn" placeholder="SN" required>
            Computador relacionado:
            <select class="form-control" name="computer_id" id="computer_id" required>
                <option value="0">Selecione</option>
                <option value="0">Nenhum</option>
                @foreach ($computers as $computer)
                    <option value="{{$computer->id}}">{{$computer->patrimony}}</option>
                @endforeach
            </select><br>
            <input class="btn btn-outline-secondary" type="submit" value="Cadastrar">
        </form>
    </div>
</div>
@endsection