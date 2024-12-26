<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Models\ApiLog;

class FilmeController extends Controller
{

public function films(Request $request)

{
    $url = "https://swapi.py4e.com/api/films";
    $response = Http::get($url);

     // Registrar o log da requisição
     $this->logApiRequest('GET', $url, $response);

    if ($response->successful()) {
        $dados = collect($response['results']);
        $films = $dados->sortBy('release_date');
        return view('index', compact('films'));
        
    }

    return response()->json(['error' => 'Falha ao carregar os dados da API.'], 500);

    
}

public function show($id)
{
    $response = Http::get("https://swapi.py4e.com/api/films/{$id}/");
    

    

    if ($response->successful()) {
        $film = $response->json();
        // dd($film);
        // Calcular a idade do filme
        $releaseDate = Carbon::parse($film['release_date']);
        $currentDate = Carbon::now();
        $age = $releaseDate->diff($currentDate);

        // Buscar nomes dos personagens
        $characterNames = [];
        foreach ($film['characters'] as $characterUrl) {
            $characterResponse = Http::get($characterUrl);
            if ($characterResponse->successful()) {
                $characterNames[] = $characterResponse->json()['name'];
            }
        }

        return view('show', [
            'film' => $film,
            'age' => $age,
            'characterNames' => $characterNames,
        ]);
    } else {
        return response('Erro ao buscar dados da API.', 500);
    }
}

private function logApiRequest($method, $url, $response)
{
    ApiLog::create([
        // 'timestamp' => now(),
        'method' => $method,
        'url' => $url,
        'status_code' => $response->status(),
        
    ]);
}


}
