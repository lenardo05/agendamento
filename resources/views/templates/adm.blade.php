<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <title>Sistema de Agendamento</title>

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Controle de Agenda</a>
      
      <h4 class='text-right'><span class="badge badge-secondary">{{ Auth::user()->name }}</span></h4>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="{{ route('logout') }}">Logaut</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link {{ Request::is('medicos*') ? 'active' : '' }}" href='{!! url('/medicos'); !!}'>
                  <span data-feather="home"></span>
                  Listar Médicos <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('pacientes*') ? 'active' : '' }}" href='{!! url('/pacientes'); !!}'>
                  <span data-feather="file"></span>
                  Listar Pacientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }}" href='{!! url('/usuarios'); !!}'>
                  <span data-feather="shopping-cart"></span>
                  Listar Usuários
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('agendamentos*') ? 'active' : '' }}" href='{!! url('/agendamentos'); !!}'>
                  <span data-feather="users"></span>
                  Listar Agendamentos
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


          @yield('content')


        </main>
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
  </body>
</html>
