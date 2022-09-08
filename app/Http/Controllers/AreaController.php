<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:area.index')->only('index');
         $this->middleware('can:area.edit')->only('edit','update');
         $this->middleware('can:area.create')->only('create','store');
         $this->middleware('can:area.destroy')->only('destroy');

    }
    public function index()
    {
        $areas = Area::all();

        return view('area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create');
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
        $area = Area::create($request->all());

        return redirect()->route('areas.index')->with('guardar', 'ok');
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
    public function edit(Area $area)
    {
        return view('area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required|max:50',
            
        ],[
            'name.required'=>'El campo nombre es requerido.'
        ]);
        $area->update($request->all());

        return redirect()->route('areas.index')->with('guardar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();

        return redirect()->route('areas.index')->with('guardar', 'ok');
    }
}
