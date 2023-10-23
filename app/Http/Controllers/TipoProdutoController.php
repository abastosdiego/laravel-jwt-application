<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoProdutoRequest;
use App\Models\TipoProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(TipoProduto::get(), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoProduto $tipoProduto)
    {
        //Log::info($tipoProduto?->imagem?->caminho);
        return $tipoProduto;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoProdutoRequest $request)
    {
        TipoProduto::create($request->all());

        return response(
            '{"message": "Cadastrado com sucesso!"}',
            201
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoProdutoRequest $request, TipoProduto $tipoProduto)
    {
        $tipoProduto->update($request->all());

        return response(
            '{"message": "Atualizado com sucesso"}',
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipoProduto $tipoProduto)
    {
        $tipoProduto->delete();

        return response(
            '{"message": "Excluído com sucesso"}',
            200
        );
    }
}
