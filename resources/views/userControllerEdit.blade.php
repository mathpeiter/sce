@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <div class="col-8 m-auto">
        <a href="{{url("/user")}}">
            <button class="btn btn-outline-secondary">Voltar</button>
        </a>
        <h1 class="display-5">Editar Usuário</h1>
    </div>
    <div class="col-8 m-auto">
        <form name="register" id="register" method="post" action="{{url("user/$user->id")}}">
            @method('PUT')
            @csrf
            Patrimônio:
                <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required>
            CPF:
                <input class="form-control" type="text" name="cpf" id="cpf" value="{{$user->cpf}}" required>
            Celular:
                <input class="form-control" type="text" name="cell" id="cell" value="{{$user->cell}}" required>
            E-Mail:
                <input class="form-control" type="email" name="email" id="email" value="{{$user->email}}" required>
            Senha:
                <input for="password" class="form-control" type="password" name="password" id="password" value="">
            Permissão:
            @if (auth()->user()->permission == true)
                <select class="form-control" type="boolean" name="permission" id="permission" value="" required>
                <option value="{{$user->permission}}">Atual: 
                    @if ($user->permission == 0)
                        Usuário
                    @else
                        Administrador
                    @endif
                </option>
                <option value=0>0 - Usuário</option>
                <option value=1>1 - Administrador</option>
                </select>
            @else
                <select class="form-control" type="boolean" name="permission" id="permission" value="" readonly required>
                    <option value="{{$user->permission}}">Atual: 
                        @if ($user->permission == 0)
                            Usuário
                        @else
                            Administrador
                        @endif
                    </option>
                </select>
            @endif
            <br><input class="btn btn-outline-secondary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection