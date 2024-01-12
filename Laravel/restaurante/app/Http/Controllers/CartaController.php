<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bebidas = [
            ["CocaCola" , 2 , "Lata"],
            ["Fanta" , 1.80 , "Lata"],
            ["Nestea" , 3.10 , "Botella"]
        ];
         
        $platos = [
            ["Tortilla de pataas" , 4.95 , "Ración"],
            ["Chuletillas de cordero" , 9.95 , "Ración"],
            ["Ensaladilla rusa" , 3.5 , "Tapa"]
        ];

        return view('carta' , ['bebidadia' => $bebidas[rand(0,2)], 'platodia' => $platos[rand(0,2)] ,'bebidas' => $bebidas, 'platos' => $platos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
