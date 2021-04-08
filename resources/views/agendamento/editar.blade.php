@extends('templates.adm')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Agendamento</h1>
</div>

<div class="panel-body">
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form action="{{ route('agendamentos.update', $dados->id) }}" method="POST">
        @method('PATCH') 
        @csrf
        <div class="form-row">

            <div class="form-group col-md-6">
                <label for="id_medico">Médico</label>
                <select class="form-control" id="id_medico" name="id_medico" required>
                    <option value=''>selecione</option>
                    <option value='' disabled>-----</option>
                    @foreach ($dados_medicos as $dado_medico)
                        <option value='{{ $dado_medico->id }}' {{ $dado_medico->id == $dados->id_medico ? 'selected="selected"' : ''}}>{{ $dado_medico->nome }} - {{ $dado_medico->especialidade['nome'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="id_paciente">Paciente</label>
                <select class="form-control" id="id_paciente" name="id_paciente" required>
                    <option value=''>selecione</option>
                    <option value='' disabled>-----</option>
                    @foreach ($dados_pacientes as $dado_paciente)
                        <option value='{{ $dado_paciente->id }}' {{ $dado_paciente->id == $dados->id_paciente ? 'selected="selected"' : ''}}>{{ $dado_paciente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="datahora">Data/Hora</label>
                <input type="datetime-local" id="datahora" name="datahora" class="form-control"  value="{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dados->datahora)->format('Y-m-d\TH:i') }}" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="descricao">Observação</label>
                <input type="text" id="descricao" name="descricao" class="form-control"  value="{{ $dados->descricao }}" />
            </div>

            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-sm float-right btn-primary">Atualizar</button>
                <a href='{!! url('/agendamentos'); !!}' class="btn btn-sm float-right btn-secondary mr-2">Voltar</a>
            </div>
        </div>
    </form>

</div>

@endsection