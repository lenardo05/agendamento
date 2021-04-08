@extends('templates.adm')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista de Pacientes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <a href='{!! url('/pacientes/create'); !!}' class="btn btn-warning">Cadastar Paciente</a>
        </div>
      </div>
</div>

<div class="table-responsive">
    @include('paciente.excluir')
    @include('mensagens.sucesso')
    <table class="table table-striped table-sm" id="dt_table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Celular</th>
                <th class="text-center w-25">Ação</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach ($dados as $dado)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dado->nome }}</td>
                <td>{{ $dado->idade }}</td>
                <td>{{ $dado->celular }}</td>
                <td class="text-center">
                    <a href="{{ route('pacientes.edit',$dado->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{ route('pacientes.show',$dado->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
                    <a href="{{ route('pacientes.delete',$dado->id)}}" class="btn btn-danger btn-sm">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('js')
    <script src="{{ asset('js/config.js') }}" ></script>

@endsection
