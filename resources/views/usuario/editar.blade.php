@extends('templates.adm')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Editar Usuário</h1>
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
    <form action="{{ route('usuarios.update', $dados->id) }}" method="POST">
        @method('PATCH') 
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control"  value="{{ $dados->name }}" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" class="form-control"  value="{{ $dados->email }}" required/>
            </div>

            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" class="form-control"  value="{{ $dados->password }}" required/>
            </div>

            <div class="form-group col-md-12">
                <a href='{!! url('/usuarios'); !!}' class="btn btn-secondary mr-2">Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>

</div>

@endsection