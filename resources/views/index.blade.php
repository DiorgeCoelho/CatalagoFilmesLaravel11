<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Filmes Star Wars</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">

        <div class="card shadow-sm mb-4">
            <div class="card-body text-center">
                <h1 class="card-title display-5">Catálogo de Filmes Star Wars</h1>
                <p class="text-muted"><em>Explore os filmes clássicos e mergulhe no universo de Star Wars</em></p>
            </div>
        </div>
        
        <div class="table-responsive shadow-sm rounded bg-white p-4">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr class="text-center">
                <th scope="col" class="fw-bold text-uppercase">Título</th>
                <th scope="col" class="fw-bold text-uppercase">Data de Lançamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('films.show', ['id' => basename($film['url'])]) }}" 
                           class="text-decoration-none text-primary fw-semibold">
                            <i class="bi bi-film"></i> {{ $film['title'] }}
                        </a>
                    </td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($film['release_date'])->format('d/m/Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
