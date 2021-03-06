@extends('templates.adm')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Cadastrar de Médico</h1>
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
    <form action="{{ route('medicos.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="idade">Idade</label>
                <input type="text" id="idade" name="idade" class="form-control" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="sexo">Sexo</label>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value=''>selecione</option>
                    <option value='' disabled>-----</option>
                    <option value='F'>Feminino</option>
                    <option value='M'>Masculino</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="especialidade">Especialidade</label>
                <select class="form-control" id="especialidade" name="especialidade" required>
                    <option value=''>selecione</option>
                    <option value='' disabled>-----</option>
                    @foreach ($dados_especialidades as $dado_especialidade)
                        <option value="{{ $dado_especialidade->id }}">{{ $dado_especialidade->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="registro">CRM</label>
                <input type="text" id="registro" name="registro" class="form-control" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="celular">Celular</label>
                <input type="text" id="celular" name="celular" class="form-control celular" maxlength="15" required/>
            </div>

            <div class="form-group col-md-12 mt-5">
                <a href='{!! url('/medicos') !!}' class="btn btn-sm float-left btn-secondary ml-1 mr-2">Voltar</a> 
                <button type="submit" class="btn btn-sm float-left btn-primary">Cadastrar</button>
            </div>
        </div>
    </form>

</div>

@endsection