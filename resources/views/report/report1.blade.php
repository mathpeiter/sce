@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/report")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
  </div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Equipamentos por Setor</h1>

    <form name="search1" id="search1" method="post" action="{{url("/search1")}}">
      @csrf
      <div class="input-group">
        @csrf
        <select class="form-control" type="text" name="search1" id="search1" required>
            @foreach ($sectors as $sector)
                <option value="{{$sector->id}}">{{$sector->name}}</option>
            @endforeach
        </select>
        <input class="btn btn-outline-secondary" type="submit" value="Buscar">
      </div>
    </form>

  </div>
</div>

@endsection