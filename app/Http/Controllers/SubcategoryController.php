<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class SubcategoryController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:subcategory.index')->only('index');
         $this->middleware('can:subcategory.edit')->only('edit','update');
         $this->middleware('can:subcategory.create')->only('create','store');
         $this->middleware('can:subcategory.destroy')->only('destroy');

    }
    public function index()
    {
        $subcategories= Subcategory::all();

        return view('subcategory.index',compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::pluck('name','id'); ///OBTIENE LOS DATOS DE LA TABLA CATEGORIA
        return view('subcategory.create',compact('categories'));
    }

     ///METODO PARA GUARDAR DATOS
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'category_id' => 'required|not_in:Seleccione Una Categoria .....',
            'description'=>'required'
        ],[
            'category_id.required'=>'Seleccione una Categoria, por favor.',
            'name.required'=>'EL nombre es un campo obligatorio.',
            'description.required'=>'La descripción es campo obligatorio.'
        ]);
        ///GUARDAR TODOS LOS DATOS MANDADOS EN LOS INPUTS DE LA VISTA CREAR
        $subcategory = Subcategory::create($request->all());
        return redirect()->route('subcategories.index')->with('guardar', 'ok');

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
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::pluck('name','id');

        return view('subcategory.edit',compact('subcategory','categories'));
    }

    ///METODO PARA ACTUALIZAR
    public function update(Request $request,  Subcategory $subcategory)
    {
        //VALIDACIONES
        $request->validate([
            'name' => 'required|max:50',
            'category_id' => 'required|not_in:Seleccione Una Categoria .....',
            'description'=>'required'
        ],[
            'category_id.required'=>'Seleccione una Categoria, por favor.', ///COMENTARIOS DE LAS VALIDACIONES
            'name.required'=>'EL nombre es un campo obligatorio.',
            'description.required'=>'La descripción es campo obligatorio.'
        ]);
        ///METODO ACTUALIZAR
        $subcategory->update($request->all());
        return redirect()->route('subcategories.index')->with('editar', 'ok');

    }

    //METODO PARA ELIMINAR LOS DATOS
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('eliminar', 'ok');

        
    }
}
