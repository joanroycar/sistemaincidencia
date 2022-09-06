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
    public function __construct()
    {
        $this->middleware('can:Modulo Asuntos Internos')->only('getStates', 'estado', 'editIncidente','addObservationFile','viewResource','downloadResource');
        $this->middleware('can:Modulo Incidencias')->only('getStates', 'estado', 'editIncidente','addObservationFile','viewResource','downloadResource');
        $this->middleware('can:Modulo SSOMA')->only('getStates', 'estado', 'editIncidente','addObservationFile','viewResource','downloadResource');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidences = Incidence::where('statusprogress','1')->get();
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
    public function edit(Incidence $incidence)
    {
        $employees= Employee::pluck('name','id');
        $subcategories= Subcategory::pluck('name','id');
        $category= Category::pluck('name','id');
        $priorities= Priority::pluck('name','id');


        return view('incidence.edit',compact('incidence','employees','subcategories','category','priorities'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Incidence $incidence)
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
        $incidence->update($request->all());
        return redirect()->route('incidences.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function estado(Incidence $incidence)
    {
        if ($incidence->statusprogress == '1') {
            $incidence->update(['statusprogress'=>'2']);
            return redirect()->back();
        } elseif($incidence->statusprogress == '2') {
            $incidence->update(['statusprogress'=>'3']);
            return redirect()->back();
        } 
    }

    public function getIncidentes()
    {
        $incidences = Incidence::where('statusprogress','2')->get();
        return view('incidence.internos.index',compact('incidences'));
    }

    public function editIncidente(Incidence $incidence)
    {
        return view('incidence.internos.edit', compact('incidence'));
    }

    public function addObservationFile(Request $request, Incidence $incidence)
    {
        $request->validate([
            'observation_interno'=>'required',
            'file'=>'required'
        ]);

        $url = $request->file->store('resources');

        $incidence->resources()->create([
            'url' => $url
        ]);

        $incidence->update([
            $incidence->observation_interno = $request->observation_interno
        ]);

        return redirect()->route('incidente.index')->with('guardar', 'ok');
    }

    public function viewResource(Incidence $incidence)
    {
        return view('incidence.internos.show', compact('incidence'));
    }

    public function downloadResource(Request $request)
    {
        return response()->download(storage_path('app/' . $request->url));
    }

    public function getIncidentesssoma()
    {
        $incidences = Incidence::where('statusprogress','3')->get();
        return view('incidence.ssoma.index',compact('incidences'));
    }
}
