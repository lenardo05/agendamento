@extends('templates.adm')

@section('content')

<div class="row gutters-sm">
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-column align-items-center text-center">
            @if ($dados->sexo == 'M')
              <img src="{{ asset('avatar/avatar7.png') }}" alt="Admin" class="rounded-circle" width="150">
            @else
            <img src="{{ asset('avatar/avatar8.png') }}" alt="Admin" class="rounded-circle" width="150">
            @endif
            <div class="mt-3">
              <h4>Paciente</h4>
              <p class="text-secondary mb-1">ID: {{str_pad($dados->id, 5, '0', STR_PAD_LEFT)}}</p>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="col-md-8">
      <div class="card mb-3">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Nome</h6>
            </div>
            <div class="col-sm-9 text-secondary">
              {{ $dados->nome }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Idade</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ $dados->idade }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Data de Nascimento</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ Carbon\Carbon::createFromFormat('Y-m-d', $dados->data_nascimento)->format('d/m/Y') }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Celular</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ $dados->celular }}
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <h6 class="mb-0">Endere??o</h6>
            </div>
            <div class="col-sm-9 text-secondary">
                {{ $dados->endereco }}
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  
  <hr>
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista de Agendamentos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          
        </div>
      </div>
  </div>
  <div class="table-responsive mb-5">
  
    <table class="table table-striped table-sm" id="dt_table">
        <thead>
            <tr>
                <th>N??</th>
                <th>M??dico</th>
                <th>Data/Hora</th>
                <th>Observa????o</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach ($dados_agendamentos as $dado_agendamento)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dado_agendamento->medicos->nome }}</td>
                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dado_agendamento->datahora)->format('d/m/Y H:i') }}</td>
                <td>{{ $dado_agendamento->descricao }}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    <div class="col-md-12 mt-5">
      <a href='{!! url('/pacientes') !!}' class="btn btn-sm btn-secondary float-left mr-2">Voltar</a> 
      <a href="{{ route('pacientes.edit',$dados->id) }}" class="btn btn-primary btn-sm float-left">Editar</a>
    </div>
  </div>

@endsection