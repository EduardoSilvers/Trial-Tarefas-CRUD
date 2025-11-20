<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Http\Resources\TarefaCollection;
use App\Models\Tarefa;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(Request $request)
    {
        $tarefas = Tarefa::get();

        return new TarefaCollection($tarefas);
    }

    public function store(TarefaRequest $request)
    {
        $validated = $request->validated();
        $tarefa = Tarefa::create($validated);
        return $tarefa;
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $tarefa->update($request->all());

        return $tarefa;
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return [];
    }
}
