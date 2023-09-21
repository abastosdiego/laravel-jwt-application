<?php

namespace App\Http\Controllers;

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
    public function show(string $id)
    {
        echo 'estou no show ' . $id;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
