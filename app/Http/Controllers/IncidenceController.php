<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Incidence;
use App\Models\Priority;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidences = Incidence::all();
        return view('incidence.index',compact('incidences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees= Employee::pluck('name','id');
        $subcategories= Subcategory::pluck('name','id');
        $category= Category::pluck('name','id');
        $priorities= Priority::pluck('name','id');


        return view('incidence.create',compact('employees','subcategories','category','priorities'));
    }
    public function getStates(Request $request)
    {
        $states = Subcategory::where('category_id', $request->category_id )
            ->get();
        
        if (count($states) > 0) {
            return response()->json($states);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'asunto' => 'required|max:255',
            'employee_id' => 'required|not_in:Seleccione Un Empleado .....',
            'priority_id' => 'required|not_in:Seleccione Una Prioridad .....',
            'subcategory_id' => 'required|not_in:Seleccione una Subcategoria .....',
            'observation' => 'required|not_in:Seleccione Un Area .....',         
         ]
        //  ,[
        //     'name.required'=>'EL nombre es un campo obligatorio.',
        //     'lastname.required'=>'El apellido es un campo obligatorio.',
        //     'phone.required'=>'EL telefono es un campo obligatorio.',
        //     'birthdate.required'=>'La fecha de nacimiento es un campo obligatorio.',
        //     'document_type_id.required' => 'El Tipo De Documento es obligatorio.',
        //     'area_id.required' => 'El area es obligatorio.',
        //     'numdocument.required'=>'El número de documento es obligatorio.',
        //     'numdocument.numeric'=>'El campo debe contener números.'

        //  ]
        );

        $Incidence = Incidence::create($request->all()+[
            'user_id'=>auth()->user()->id,
            'fechareporte'=>Carbon::now('America/Lima')
        ]);

        return redirect()->route('incidences.index')->with('guardar', 'ok');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incidence $incidence)
    {
        return view('incidence.show',compact('incidence'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
