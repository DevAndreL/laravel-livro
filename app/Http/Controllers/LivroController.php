<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Livro;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Livro::create($request->all())) {
            return response()->json([
                "message" => "Livro criado"
            ], 200);
        } 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $livro = Livro::find($id);
        if($livro) {
            return $livro;
        } else {
            return response()->json([
                "message" => "Livro não encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $livro = Livro::find($id);
        if($livro){
        $livro->update($request->all());
        return response()->json([
            "message" => "Livro atualizado"
        ], 201);
    } else {
        return response()->json([
            "message" => "Erro ao atualizar"
        ], 404);
    }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Livro::destroy($id)) {
            return response()->json([
                "message" => "Livro deletado"
            ], 201);
        } else {
            return response()->json([
                "message" => "Erro ao deletar"
            ], 404);
        }
    }
}
