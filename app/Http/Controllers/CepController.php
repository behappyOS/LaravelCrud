<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function buscarCep(Request $request)
    {
        $cep = $request->input('cep');
        $cep = preg_replace('/\D/', '', $cep);

        if (strlen($cep) != 8) {
            return response()->json(['erro' => 'CEP inválido.'], 400);
        }

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->failed()) {
            return response()->json(['erro' => 'Erro ao consultar o CEP.'], 500);
        }

        $data = $response->json();

        if (isset($data['erro'])) {
            return response()->json(['erro' => 'CEP não encontrado.'], 404);
        }

        return response()->json($data);
    }
}
