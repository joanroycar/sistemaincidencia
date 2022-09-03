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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            'phone' => 'required|numeric|max:9',
            'document_type_id' => 'required|not_in:Seleccione Un Tipo de Documento .....',
            'area_id' => 'required|not_in:Seleccione Un Area .....',
            'datebirth' => 'required|date',
            'numberdocument'=>'required|numeric'            
        ],[
            'name.required'=>'EL nombre es un campo obligatorio.',
            'lastname.required'=>'El apellido es un campo obligatorio.',
            'phone.required'=>'EL telefono es un campo obligatorio.',
            'datebirth.required'=>'La fecha de nacimiento es un campo obligatorio.',
            'document_type_id.required' => 'El Tipo De Documento es obligatorio.',
            'area_id.required' => 'El area es obligatorio.',
            'numberdocument.required'=>'El número de documento es obligatorio.',
            'numberdocument.numeric'=>'El campo debe contener números.'

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
        //
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
