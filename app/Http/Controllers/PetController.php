<?php

namespace App\Http\Controllers;
use App\Feed;
use App\Group;
use App\Objective;
use App\Pet;
use App\Type;
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

        return view('pets',compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $objectives = Objective::all();
        $groups = Group::all();
        $types = Type::all();
        $feeds = Feed::all();

        return view ('add-pet' ,compact('objectives','groups','types','feeds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'name' => 'required|min:2|max:25|string',
            'type_id' => 'required|exists:types,id',
            'feeds' => 'required|exists:feeds,id',
            'objective_id' => 'required|exists:objectives,id',
            'groups' => 'required|exists:groups,id',
            'description' => 'required|string|max:250',
            'date'=>'required|date|before:tomorrow|after:01/01/2020',

        ];

        $message =[
            "required"=>'El :attribute es requerido',
            "min"=>'El :attribute no puede tener menos de 2 caracteres.',
            "max"=>'El :attribute no puede tener más de 25 caracteres.',
            "before" => 'La fecha no puede ser después de hoy.',
            "after" => 'La fecha no puede ser anterior a :date.',
        ];

        $this->validate($request,$validate,$message);


        $petData=request()->except('_token','groups','feeds');


        Pet::insert($petData);

        foreach ($request['groups'] as $group){
            Pet::firstOrNew($petData)->groups()->attach(Group::find($group));
        }

        foreach ($request['feeds'] as $feed){
            Pet::firstOrNew($petData)->feeds()->attach(Feed::find($feed));
        }

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
        $objectives = Objective::all();
        $groups = Group::all();
        $types = Type::all();
        $feeds = Feed::all();
        return view ('edit-pet', compact('pet','objectives','groups','types','feeds'));
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
        $validate = [
            'name' => 'required|min:2|max:25|string',
            'type_id' => 'required|exists:types,id',
            'feeds' => 'required|exists:feeds,id',
            'objective_id' => 'required|exists:objectives,id',
            'groups' => 'required|exists:groups,id',
            'description' => 'required|string|max:250',
            'date'=>'required|date|before:tomorrow|after:01/01/2020',

        ];

        $message =[
            "required"=>'El :attribute es requerido',
            "min"=>'El :attribute no puede tener menos de 2 caracteres.',
            "max"=>'El :attribute no puede tener más de 25 caracteres.',
            "before" => 'La fecha no puede ser después de hoy.',
            "after" => 'La fecha no puede ser anterior a :date.',
        ];

        $this->validate($request,$validate,$message);

        Pet::find($id)->groups()->detach();
        Pet::find($id)->feeds()->detach();

        foreach ($request['groups'] as $group){
            Pet::find($id)->groups()->attach(Group::find($group));
        }

        foreach ($request['feeds'] as $feed){
            Pet::find($id)->feeds()->attach(Feed::find($feed));
        }

        $petData=request()->except(['_token','_method','groups','feeds']);

        Pet::where('id','=',$id)->update($petData);

        $pet = Pet::findOrFail($id);
        $objectives = Objective::all();
        $groups = Group::all();
        $types = Type::all();
        $feeds = Feed::all();

        return view ('edit-pet', compact('pet','objectives','groups','types','feeds'))->withErrors(["Update_status" => "Actualizado correctamente!"]);
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
