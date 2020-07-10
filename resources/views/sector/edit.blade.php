@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/sector")}}">
        <button class="btn btn-outline-secondary">Voltar</button>
    </a>
    <h1 class="display-5">Editar Setor</h1>
    <form name="register" id="register" method="post" action="{{url("sector/$sector->id")}}">
        @method('PUT')
        @csrf
        <input class="form-control" type="text" name="name" id="name" value="{{$sector->name}}"><br>
        <input class="btn-outline-secondary" type="submit" value="Salvar">
    </form>
</div>

@endsection