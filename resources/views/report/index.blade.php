@extends('layouts.app')

@section('content')

<div class="col-8 m-auto">
    <a href="{{url("/")}}">
      <button class="btn btn-outline-secondary">Voltar</button>
    </a>
  </div>
  <div class="col-8 m-auto">
    <h1 class="display-5">Relatórios</h1>

  <table class="table table-striped text-center">
    <thead>
      <tr>
        <th scope="col">Nome:</th>
        <th scope="col">Descrição:</th>
        <th scope="col">Ação:</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="col">Equipamentos por Setor</td>
        <td scope="col">Busca uma relação de equipamentos por setor vinculando Computadores e Monitores</td>
        <td scope="col">
          <a href="{{url("report1/")}}">
            <button class="btn btn-outline-secondary">Selecionar</button>
          </a>
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

@endsection