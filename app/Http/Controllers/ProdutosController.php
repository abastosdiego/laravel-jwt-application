<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
/**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('api');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return abort(404, 'página não encontrada');
        return response(Produto::get(), 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return Produto::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlunoRequest $request)
    {
        // A Validação passou para dentro do AlunoRequest
        /*$request->validate([
            'descricao' => ['required','string','between:2,100'],
            'tipo_produto' => ['required','int','exists:tipo_produtos,id']
        ]);*/

        Produto::create($request->all());

        return response(
            '{"message": "Produto cadastrado com sucesso!"',
            201
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(AlunoRequest $request, Produto $produto)
    {
        // A Validação passou para dentro do AlunoRequest
        /*
        $request->validate([
            'descricao' => ['required','string','between:2,100'],
            'tipo_produto' => ['required','int','exists:tipo_produtos,id']
        ]);*/

        $produto->update($request->all());

        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return response(
            '{"message": "Excluído com sucesso"',
            200
        );
    }
}
