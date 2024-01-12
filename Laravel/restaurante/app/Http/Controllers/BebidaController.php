<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bebida;

class BebidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bebidas = Bebida::all();
        /*$bebidas = [
            ["Coca-cola", 1.95, "Refresco"],
            ["Fanta", 1.95, "Refresco"],
            ["Cerveza Medac", 2.45, "Alcohol"]
        ];*/

        return view('bebidas/index',['bebidas'=>$bebidas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bebidas/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bebida = new Bebida;
        $bebida -> nombre = $request -> input('nombre');
        $bebida -> precio = $request -> input('precio');
        $bebida -> tipo = $request -> input('tipo');
        $bebida -> save();

        return redirect('bebidas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bebida = Bebidas::find($id);

        return view('bebidas/show', ['bebida'=>$bebida]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bebida= Bebida::find($id);
        return view('bebidas/edit', ['bebida'=>$bebida]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bebida = Bebida::find($id);
        $bebida -> nombre = $request -> input('nombre');
        $bebida -> precio = $request -> input('precio');
        $bebida-> tipo = $request -> input('tipo');
        $bebida-> save();
        return redirect('bebidas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
