@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/usage")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Editar Movimentação</h1>
    <form name="register" id="register" method="post" action="{{url("usage/$usage->id")}}">
        @method('PUT')
        @csrf
        <input class="form-control" type="number" name="patrimony" id="patrimony" value="{{$usage->patrimony}}" required readonly>
        <select class="form-control" name="sector_id" id="sector_id" required>
            @php
                $sector=$usage->find($usage->id)->relSector;
            @endphp
            <option value="{{$sector->id}}">Selecione</option>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>
        <input class="form-control" type="date" name="start_date" id="start_date" value="{{$usage->start_date}}"><br>
        <input class="btn-outline-secondary" type="submit" value="Salvar">
    </form>
</div>

@endsection