@extends('templates.adm')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Lista de Usuários</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
          <a href='{!! url('/usuarios/create'); !!}' class="btn btn-warning">Cadastar Usuário</a>
        </div>
      </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="dt_table">
        <thead>
            <tr>
                <th>Nº</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th class="text-center">Ação</th>
            </tr>
        </thead>
        <tbody>
        @php $i = 0; @endphp
        @foreach ($dados as $dado)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $dado->name }}</td>
                <td>{{ $dado->email }}</td>
                <td class="text-center">
                    <a href="{{ route('usuarios.edit',$dado->id)}}" class="btn btn-primary btn-sm">Editar</a>
                    <a href="{{ route('usuarios.delete',$dado->id)}}" class="btn btn-primary btn-sm">Excluir</a>
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
