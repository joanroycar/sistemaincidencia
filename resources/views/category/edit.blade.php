@extends('layouts.panel')

@section('content') 

<div class="container">
    <div class="row">

    
        <div class="page-meta">
            {{-- <div class="col text-right"> --}}
            <a href="{{url('/category')}}" class="btn btn-xm btn-dark"  style="float: right;">Regresar</a>
              {{-- </div> --}}
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="#">Tabla</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Editar Categoria</li>
                </ol>
            </nav>
    
            
        </div>
    {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

    {{-- <form class="row g-3"> --}}
        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" value="{{$category->name}}"> 
            @error('name')
            <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
        @enderror 
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Cambios</button>
        </div>
    {!! Form::close() !!}

</div>
</div>
  @endsection
@section('scripts')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  $('.formulario').submit(function(e){
      e.preventDefault()

      Swal.fire({
        title: 'Estas seguro de Editar?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Actualizar!',
        cancelButtonText: 'Cancelar',
      }).then((result) => {
        if (result.value) {

          
          this.submit()
          
        }
      })

  })

</script>

@endsection