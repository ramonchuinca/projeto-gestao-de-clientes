<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return Client::paginate(10);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'telefone' => 'nullable|string',
            'cpf' => 'required|string|unique:clients',
            'status' => 'boolean',
        ]);

        $client = Client::create($data);

        return response()->json($client, 201);
    }

    public function show(Client $client)
    {
        return response()->json($client);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'telefone' => 'nullable|string',
            'cpf' => 'required|string|unique:clients,cpf,' . $client->id,
            'status' => 'boolean',
        ]);

        $client->update($data);

        return response()->json($client);
    }

    public function destroy(Request $request, Client $client)
    {
        // Verificar a permissão antes de excluir
        $this->authorize('delete', $client);

        $client->delete();

        return response()->json([
            'message' => 'Cliente removido com sucesso'
        ]);
    }
}
