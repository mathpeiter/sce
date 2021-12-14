@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/sector")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Editar Setor</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("sector/$sector->id")}}">
            @method('PUT')
            @csrf
            Nome:
            <input class="form-control" type="text" name="name" id="name" value="{{$sector->name}}">
            Responsável:
            <select class="form-control" name="responsible_id" id="responsible_id" required>
                <option value="{{$sector->responsible_id}}">Selecione</option>
                @foreach ($responsibles as $responsible)
                    <option value="{{$responsible->id}}">{{$responsible->name}}</option>
                @endforeach
            </select><br>
            <input class="btn btn-outline-secondary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection