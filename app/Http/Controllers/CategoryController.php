<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:category.index')->only('index');
         $this->middleware('can:category.edit')->only('edit','update');
         $this->middleware('can:category.create')->only('create','store');
         $this->middleware('can:category.destroy')->only('destroy');

    }
    public function index()
    {
        $categories= Category::all();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
        
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
        $measure = Category::create($request->all());

        return redirect()->route('categories.index')->with('guardar', 'ok');


        
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
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:50',
            
        ],[
            'name.required'=>'El campo nombre es requerido.'
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('editar', 'ok');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();


        return redirect()->route('categories.index')->with('eliminar', 'ok');

    }
}
