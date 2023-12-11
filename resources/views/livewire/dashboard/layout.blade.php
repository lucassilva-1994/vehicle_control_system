<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Veiculos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #121d3e">
        <div class="container-fluid">

            <a href="{{ route('vehicle.show') }}" class="navbar-brand" style="font-size: 30px" wire:navigate>
                <h1><i class="bi bi-house"></i></h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('vehicle.show') }}" wire:navigate>Veículos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('services.show') }}" wire:navigate>Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('employee.show') }}" wire:navigate>Colaboradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('profile') }}" wire:navigate>{{ auth()->user()->username }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('logout') }}" wire:navigate>Sair</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-3">
        {{ $slot }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
        $('#cep').mask('00000-000');
        $('#cpf').mask('000.000.000-00');
    </script>
</body>

</html>
