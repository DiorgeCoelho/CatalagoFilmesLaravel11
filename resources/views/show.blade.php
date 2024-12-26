<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Filme - {{ $film['title'] }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <!-- Cabeçalho -->
        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <h1 class="card-title display-5">{{ $film['title'] }}</h1>
                <p class="text-muted"><em>Nº Episódio:</em> {{ $film['episode_id'] }}</p>
            </div>
        </div>

        <!-- Informações Detalhadas -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Sinopse</th>
                        <td>{{ $film['opening_crawl'] }}</td>
                    </tr>
                    <tr>
                        <th>Data de Lançamento</th>
                        <td>{{ \Carbon\Carbon::parse($film['release_date'])->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Diretor(a)</th>
                        <td>{{ $film['director'] }}</td>
                    </tr>
                    <tr>
                        <th>Produtor(es)</th>
                        <td>{{ $film['producer'] }}</td>
                    </tr>
                    <tr>
                        <th>Idade do Filme</th>
                        <td>{{ $age->y }} anos, {{ $age->m }} meses e {{ $age->d }} dias</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Lista de Personagens -->
        <h4 class="mt-4">Personagens:</h4>
        <ul class="list-group mb-4">
            @foreach ($characterNames as $name)
                <li class="list-group-item">{{ $name }}</li>
            @endforeach
        </ul>

        <!-- Botão Voltar -->
        <div class="text-center">
            <a href="{{ url('/fil') }}" class="btn btn-primary btn-lg">Voltar ao Catálogo</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
