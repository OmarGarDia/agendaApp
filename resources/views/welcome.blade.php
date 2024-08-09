<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            margin-top: 0;
            font-size: 2rem;
            color: #333;
        }

        p {
            color: #555;
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s;
            margin: 10px;
            text-transform: uppercase;
        }

        .btn-enter {
            background-color: #ff6f61;
        }

        .btn-enter:hover {
            background-color: #e55b50;
            transform: translateY(-2px);
        }

        .btn-register {
            background-color: #4caf50;
        }

        .btn-register:hover {
            background-color: #45a049;
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bienvenido a la Agenda</h1>
        <p>Por favor, elige una opción para continuar:</p>
        <a href="{{ route('login') }}" class="btn btn-enter">Entrar</a>
        <a href="{{ route('register') }}" class="btn btn-register">Registrar</a>
    </div>
</body>

</html>
