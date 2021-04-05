@extends('templates.adm')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista de Agendamentos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <a href='{!! url('/agendamentos/create'); !!}' class="btn btn-warning">Cadastar Agendamento</a>
        </div>
      </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="dt_table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Descrição</th>
                <th>Data/Hora</th>
                <th>Médico</th>
                <th>Paciente</th>
                <th class="text-center">Ação</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach ($dados as $dado)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dado->descricao }}</td>
                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dado->datahora)->format('d/m/Y H:i') }}</td>
                <td>{{ $dado->medicos->nome }}</td>
                <td>{{ $dado->pacientes->nome }}</td>
                <td class="text-center">
                    <a href="{{ route('agendamentos.edit',$dado->id) }}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{ route('agendamentos.delete',$dado->id) }}" class="btn btn-primary btn-sm">Excluir</a>
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
