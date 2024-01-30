<?php

namespace App\Http\Controllers;

use App\Models\Train;
use App\Models\TrainType;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("/trains/index", ['trains' => Train::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("/trains/create", ['train_types' => TrainType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $train = new train;
        $train->name = $request->input("name");
        $train->passengers = $request->input("passengers");
        $train->year = $request->input("year");
        $train->train_type_id = $request->input("train_type");
        $train->save();
        return redirect("trains");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("/trains/show", ['train' => Train::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("/trains/edit", ['train' => Train::find($id), 'train_types' => TrainType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $train = Train::find($id);
        $train->name = $request->input("name");
        $train->passengers = $request->input("passengers");
        $train->year = $request->input("year");
        $train->train_type_id = $request->input("train_type");
        $train->save();
        return redirect("trains");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $train=Train::find($id);
        $train->delete($id);
        return redirect("trains");
    }
}
