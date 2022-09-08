<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
         $this->middleware('can:users.index')->only('index');
         $this->middleware('can:users.edit')->only('edit','update');
         $this->middleware('can:users.create')->only('create','store');
         $this->middleware('can:users.destroy')->only('destroy');

    }
    
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'email' => 'required|email',
            'password' => 'required|max:50|min:6',
            
        ],[
            'name.required'=>'El nombre es un campo obligatorio, por favor.',
            'email.required'=>'EL email es un campo obligatorio.',
            'password.required'=>'La contraseña es un campo obligatorio.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = ($request->password);
        $user->save();// No es necesario poner Bycrit ya que en el Modelo hay un metodo
        // que encripta todo los datos enviados en un Input con name password.

        return redirect()->route('users.index')->with('guardar', 'ok');
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
    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function editrol(User $user){

        $roles = Role::all();

        return view('user.role',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email'
        ],[
            'name.required'=>'El nombre es un campo obligatorio, por favor.',
            'email.required'=>'EL email es un campo obligatorio.'
        ]);

        $user->update([
            $user->name = $request->name,
            $user->email = $request->email,
            $user->password = ($request->password) // No es necesario poner Bycrit ya que en el Modelo hay un metodo
                                                   // que encripta todo los datos enviados en un Input con name password.
        ]);

        return redirect()->route('users.index');
    }

    public function updaterol(Request $request, User $user)
    {
        $request->validate([
            'roles' => 'required'
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
