<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <title>Projeto HCosta</title>
    </head>
    <body>
        <h2> LOGIN </h2>
        <form action="{{ route('redirect') }}" method="POST">
            @csrf

            Usuário: <input type="text" name="usuario"> <br> <br>
            Senha: <input type="password" name="senha"> <br> <br>

            <input type="submit" value="Entrar" name="acao">
            <input type="submit" value="Cadastrar" name="acao">
        </form>
    </body>
</html>
