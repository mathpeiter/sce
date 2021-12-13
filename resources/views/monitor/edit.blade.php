@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/monitor")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Editar Monitor</h1>
    <form name="register" id="register" method="post" action="{{url("monitor/$monitor->id")}}">
        @method('PUT')
        @csrf
        @php
            $computer1=$monitor->find($monitor->id)->relComputer;
        @endphp
        Patimônio:
        <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$monitor->patrimony}}">
        Marca:
        <input class="form-control" type="text" name="brand" id="brand" value="{{$monitor->brand}}">
        Modelo:
        <input class="form-control" type="text" name="model" id="model" value="{{$monitor->model}}">
        Polegadas:
        <input class="form-control" type="text" name="screen" id="screen" value="{{$monitor->screen}}">
        SN:
        <input class="form-control" type="text" name="sn" id="sn" value="{{$monitor->sn}}">
        Computador relacionado:
        <select class="form-control" name="computer_id" id="computer_id" required>
            @if ($computer1 != null)
            <option value="{{$computer1->id}}">{{$computer1->patrimony}}</option>    
            @endif
            <option value="0">Nenhum</option>
            @foreach ($computers as $computer)
                <option value="{{$computer->id}}">{{$computer->patrimony}}</option>
            @endforeach
        </select><br>
        <input class="btn btn-outline-secondary" type="submit" value="Salvar">
    </form>
</div>

@endsection