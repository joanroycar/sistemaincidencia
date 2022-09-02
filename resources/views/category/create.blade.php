@extends('layouts.panel')

@section('content')

<div class="container">
    <br>
       <div class="row">

        <div class="page-meta">
            {{-- <div class="col text-right"> --}}
            <a href="{{url('/category')}}" class="btn btn-xm btn-dark"  style="float: right;">Regresar</a>
              {{-- </div> --}}
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="#">Tabla</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Crear Categoria</li>
                </ol>
            </nav>
    
            
        </div>
{{-- 
    <h4 class="mt-5">Crear Categoria</h4>
    <a href="{{url('/category/create')}}" class="btn btn-xm btn-primary"  style="float: right;">Crear Categoria</a> --}}

    {!! Form::open(['route' => 'categories.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" value="{{old('name')}}"> 
        
            @error('name')
            <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
        @enderror 
        </div>
      
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Crear Categoria</button>
        </div>
    {!! Form::close() !!}

</div>
</div>

@endsection

@section('scripts')
<script>
    $('.formulario').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de guardar?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Guardar!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
  </script>   
@endsection