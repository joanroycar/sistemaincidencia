@extends('layouts.panel')

@section('content')


<div class="container">
    <div class="row">

    

    <h4 class="mt-5">Editar Prioridad</h4>
    {!! Form::model($priority, ['route' => ['priorities.update', $priority], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

    {{-- <form class="row g-3"> --}}
        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" value="{{$priority->name}}">
            @error('name')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror  
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Editar Prioridad</button>
        </div>
    {!! Form::close() !!}

</div>
</div>



@endsection