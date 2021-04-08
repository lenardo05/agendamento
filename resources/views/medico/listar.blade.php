@extends('templates.adm')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista de Médicos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <a href='{!! url('/medicos/create'); !!}' class="btn btn-warning">Cadastar Médico</a>
        </div>
      </div>
</div>

<div class="table-responsive">
    @include('medico.excluir')
    @include('mensagens.sucesso')
    <table class="table table-striped table-sm" id="dt_table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Especialidade</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Celular</th>
                <th class="text-center w-25">Ação</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach ($dados as $dado)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dado->especialidade['nome'] }}</td>
                <td>{{ $dado->nome }}</td>
                <td>{{ $dado->registro }}</td>
                <td>{{ $dado->celular }}</td>
                <td class="text-center">
                    <a href="{{ route('medicos.edit',$dado->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{ route('medicos.show',$dado->id)}}" class="btn btn-primary btn-sm">Visualizar</a>
                    <a href="{{ route('medicos.delete',$dado->id)}}" class="btn btn-danger btn-sm">Excluir</a>
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