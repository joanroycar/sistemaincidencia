<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    

    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:priority.index')->only('index');
         $this->middleware('can:priority.edit')->only('edit','update');
         $this->middleware('can:priority.create')->only('create','store');
         $this->middleware('can:priority.destroy')->only('destroy');

    }
    public function index()
    {
        $priorities = Priority::all();

        return view('priority.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('priority.create');
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
            'name' => 'required|max:50',
            
        ],[
            'name.required'=>'El campo nombre es requerido.'
        ]);
        $priority = Priority::create($request->all());

        return redirect()->route('priorities.index')->with('guardar', 'ok');
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
    public function edit(Priority $priority)
    {
        return view('priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Priority $priority)
    {
        $request->validate([
            'name' => 'required|max:50',
            
        ],[
            'name.required'=>'El campo nombre es requerido.'
        ]);
        $priority->update($request->all());

        return redirect()->route('priorities.index')->with('editar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()->route('priorities.index')->with('guardar', 'ok');
    }
}
