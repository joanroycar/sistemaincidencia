<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\DocumentType;
use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:employee.index')->only('index');
         $this->middleware('can:employee.edit')->only('edit','update');
         $this->middleware('can:employee.create')->only('create','store');
         $this->middleware('can:employee.destroy')->only('destroy');

    }
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = Area::pluck('name','id');
        $documenttype = DocumentType::pluck('name','id');

        return view('employee.create',compact('documenttype','area'));
   
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
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'required|size:9',
            'document_type_id' => 'required|not_in:Seleccione Un Tipo de Documento .....',
            'area_id' => 'required|not_in:Seleccione Un Area .....',
            'birthdate' => 'required|date',
            'numdocument'=>'required|numeric'            
        ],[
            'name.required'=>'EL nombre es un campo obligatorio.',
            'lastname.required'=>'El apellido es un campo obligatorio.',
            'phone.required'=>'EL telefono es un campo obligatorio.',
            'birthdate.required'=>'La fecha de nacimiento es un campo obligatorio.',
            'document_type_id.required' => 'El Tipo De Documento es obligatorio.',
            'area_id.required' => 'El area es obligatorio.',
            'numdocument.required'=>'El número de documento es obligatorio.',
            'numdocument.numeric'=>'El campo debe contener números.'

        ]);
    
        $employee = Employee::create($request->all());

        return redirect()->route('employees.index')->with('guardar', 'ok');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $area = Area::pluck('name','id');
        $documenttype = DocumentType::pluck('name','id');
        return view('employee.edit',compact('employee','documenttype','area'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lastname' => 'required|max:255',
            'phone' => 'required|size:9',
            'document_type_id' => 'required|not_in:Seleccione Un Tipo de Documento .....',
            'area_id' => 'required|not_in:Seleccione Un Area .....',
            'birthdate' => 'required|date',
            'numdocument'=>'required|numeric'            
        ],[
            'name.required'=>'EL nombre es un campo obligatorio.',
            'lastname.required'=>'El apellido es un campo obligatorio.',
            'phone.required'=>'EL telefono es un campo obligatorio.',
            'birthdate.required'=>'La fecha de nacimiento es un campo obligatorio.',
            'document_type_id.required' => 'El Tipo De Documento es obligatorio.',
            'area_id.required' => 'El area es obligatorio.',
            'numdocument.required'=>'El número de documento es obligatorio.',
            'numdocument.numeric'=>'El campo debe contener números.'

        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('editar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        
        return redirect()->route('employees.index')->with('eliminar', 'ok');

    }
}
