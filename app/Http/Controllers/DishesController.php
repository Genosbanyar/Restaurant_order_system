<?php

namespace App\Http\Controllers;

use Config\alert;
use App\Models\Dishes;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDishRequest;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dishes = Dishes::OrderBy('id','desc')->get();
        return view('kitchen.dish',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('kitchen.dish_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDishRequest $request)
    {
        if(request()->dish_image != null){
            $imageName = date('YmdHis') . "." . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);
        }
         
        Dishes::create($request->validated() + ['dish_image'=>empty($imageName) ? null : $imageName]); 
        return redirect('/dish')->with('status',config("alert.message.create"));
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
    public function edit(Dishes $dish)
    {
        $categories = Category::all();
        return view("kitchen.edit",compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreDishRequest $request, Dishes $dish)
    {
        if(request()->dish_image){
            //upload image
            $imageName = date('YmdHis') . "." . request()->dish_image->getClientOriginalExtension();
            request()->dish_image->move(public_path('images'), $imageName);
        }

        $dish->update($request->validated() + ['dish_image'=>empty($imageName) ? $dish->dish_image : $imageName]);
        return redirect("dish")->with('status',config('alert.message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dishes $dish)
    {
        $dish->delete();
        return redirect("dish")->with('status',config("alert.message.delete"));
    }
}
