@extends('layouts.panel')

@section('content')

<div class="container">
    <div class="row">

 <h4 class="mt-5">Editar Empleado</h4>
 {!! Form::model($employee, ['route' => ['employees.update', $employee], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

 <div class="col-md-4">
     <label for="name" class="form-label">Nombres</label>
     <input type="name" class="form-control" id="name" name="name" style="color: white" value="{{$employee->name}}">
     @error('name')
         <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
     @enderror   
 </div>
 <div class="col-md-4">
     <label for="lastname" class="form-label">Apellidos</label>
     <input type="lastname" class="form-control" id="lastname" name="lastname" style="color: white" value="{{$employee->lastname}}">
     @error('lastname')
         <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
     @enderror  
 </div>
 <div class="col-md-4">
     <label for="phone" class="form-label">Fecha Nacimiento</label>
     {!! Form::date('birthdate', null, ['class' => 'form-control ', 'style'=>'color:black; background:white'. ($errors->has('birthdate') ? ' border-red-600' : '')]) !!}
     @error('birthdate')
         <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
     @enderror  
 </div>
     <div class="col-md-6">
         <label for="name" class="form-label">Area</label>
         {!! Form::select('area_id', $area, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Un Area .....']) !!}
         @error('area_id')
             <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
         @enderror                   
     </div>
     <div class="col-md-6">
         <label for="phone" class="form-label">Telefono / Celular</label>
         <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}">
         @error('phone')
             <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
         @enderror  
     </div>
     <div class="col-md-6">
         <label for="name" class="form-label">Tipo De Documento</label>
         {!! Form::select('document_type_id', $documenttype, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Un Tipo de Documento .....']) !!}
         @error('document_type_id')
             <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
         @enderror                    
     </div>
     <div class="col-md-6">
         <label for="numdocument" class="form-label">Numero de Documento</label>
         <input type="text" class="form-control" id="numdocument" name="numdocument" value="{{$employee->numdocument}}">
         @error('numdocument')
             <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
         @enderror  
     </div>
     <div class="col-12">
         <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
     </div>

 {!! Form::close() !!}

</div>
</div>

@endsection