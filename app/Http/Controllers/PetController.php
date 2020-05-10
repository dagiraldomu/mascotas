<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pets = Pet::all();
 
        return view('pets', ['pets' => $pets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('add-pet');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petData=request()->except('_token');

        $arrayToString = implode(', ', $request->input('feed'));
        $arrayToString1 = implode(', ', $request->input('objective'));

        $petData['feed'] = $arrayToString;
        $petData['objective'] = $arrayToString1;
        
        Pet::insert($petData);
        return redirect('pets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view ('edit-pet', compact('pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $petData=request()->except(['_token','_method']);
        $arrayToString = implode(', ', $request->input('feed'));
        $arrayToString1 = implode(', ', $request->input('objective'));

        $petData['feed'] = $arrayToString;
        $petData['objective'] = $arrayToString1;

        Pet::where('id','=',$id)->update($petData);

        $pet = Pet::findOrFail($id);
        return view ('edit-pet', compact('pet'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pet::destroy($id);
        return redirect('pets');
    }
}
