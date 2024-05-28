<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Requests\MealRequest;



class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meals = Meal::paginate(2);
        return view('meals.index', compact('meals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MealRequest $request)
    {
        $path= $request->image->store('puplic/meals');

        Meal::create([
            'name' => $request->name ,
            'description' => $request->description,
            'small_meal_price' => $request->small_meal_price,
            'medium_meal_price' => $request->medium_meal_price,
            'large_meal_price' => $request->large_meal_price,
            'category' => $request->category,
            'image' => $path ,
        ]);
        
        return redirect()->route('meals.index')->with('message','Meal added sucessfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $meal = Meal::find($id);
        return view ('meals.edit' , compact('meal')); 
    }

   
    public function update(MealRequest $request,  $id)
    {
        $meal = Meal::find($id);

        if ($request-> has('image')){
            $path = $request->image->store('public/meals');
        }else { 
            $path = $meal->image;

        }
        $meal->name = $request->name;
     $meal->description = $request->description;
     $meal->small_meal_price = $request->small_meal_price;
     $meal->medium_meal_price = $request->medium_meal_price;
     $meal->large_meal_price = $request->large_meal_price;
     $meal->category = $request->category;
     $meal->image =$path;
        
        
        $meal->save();
        return redirect()->route('meals.index')->with('message','Meal updated succfully');

    }//update   

    
    public function destroy( $id)
    {
        $meal = Meal::find($id)->delete();
        return redirect()->route('meals.index')->with('message','Meal Deleted succfully');


    }
}