<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <title>Projeto HCosta</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('index') }}">Projeto de Vendas HCosta</a>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link {{$tela == 'pedidos' ? 'active' : ''}}" href="#">Pedidos</a>
                        <a class="nav-link {{$tela == 'usuarios' ? 'active' : ''}} {{$usuario->cargo != '2' ? 'disabled' : ''}}" href="{{ route('usuarios.mostrar') }}">Usuários</a>
                    </div>
                </div>
                {{ $usuario->nome }} &nbsp &nbsp
                <a class="bi bi-person-fill-gear" style="font-size: 2rem" href="{{ route('usuarios.telaAtualizar', ['id' => $usuario->id]) }}"></a> &nbsp &nbsp
                <a class="bi bi-escape" style="font-size: 2rem" href="{{ route('usuarios.sair') }}"></a>
            </div>
        </nav>

        @yield('content')
    </body>
</html>
