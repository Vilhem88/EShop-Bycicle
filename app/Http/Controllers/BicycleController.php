<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Gender;
use App\Models\Bicycle;
use Illuminate\Http\Request;
use App\Http\Requests\BicycleFormRequest;

class BicycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::get();
        $genders = Gender::get();
        return view('layouts.create', compact('types', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BicycleFormRequest $request)
    {

        // dd($request->all());
        Bicycle::create([

            "image_path" => $this->storeImage($request),
            "type_id" =>  $request->type,
            "brand" => $request->brand,
            "model" => $request->model,
            "frame_size" => $request->frame_size,
            "gender_id" =>  $request->gender_type,
            "year" => $request->year,
            "price" => $request->price,
            "on_sale" => $request->on_sale,
            "quantity" => $request->quantity
        ]);

        return redirect()->route('bicycles.create')->with('success', 'A new bicycle was successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bicycle = Bicycle::FindOrFail($id);
        return view('layouts.show', compact('bicycle'));
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

    private function storeImage($request)
    {
        $model =  str_replace(" ","",$request->model);
        $newImageName = uniqid() . "-" . $model . "." . $request->image->extension();
        $request->image->move(public_path('img'), $newImageName);
        return $newImageName;
    }
}
