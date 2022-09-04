@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Registrar Incidencia</h4>
    

    {!! Form::open(['route' => 'incidences.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}
    <div class="col-md-12">
        <label for="asunto" class="form-label">Asunto:</label>
        <input type="name" class="form-control" id="asunto" name="asunto" style="color: white" value="{{old('asunto')}}">
        @error('asunto')
            <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
        @enderror   
    </div>
  
    <div class="col-md-6">
        <label for="name" class="form-label">Empleado:</label>
        {!! Form::select('employee_id', $employees, null, ['class' => 'form-control  block w-full','style'=>'width: 100%','id'=>'employee' ,'placeholder'=>'Seleccione Un Empleado .....']) !!}
        @error('employee_id')
            <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
        @enderror                   
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Prioridad:</label>
        {!! Form::select('priority_id', $priorities, null, ['class' => 'form-control  block w-full','style'=>'width: 100%; background-color: red !important','id'=>'priority', 'placeholder'=>'Seleccione Una Prioridad .....']) !!}
        @error('priority_id')
            <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
        @enderror                   
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Categoria:</label>
        {!! Form::select('category_id', $category, null, ['class' => 'form-control  block w-full','style'=>'background:#1b2e4b;width: 100%','id'=>'country', 'placeholder'=>'Seleccione  una Categoria .....']) !!}
        {{-- <select class="form-select form-select-lg mb-3" id="country">
            <option selected disabled>Select country</option>
            @foreach ($category as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
            @endforeach
        </select> --}}
        @error('category_id')
            <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
        @enderror                    
    </div>
    {{-- <div class="col-md-6">
        <label for="name" class="form-label">SubCategoria:</label>
        {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Una SubCategoria .....']) !!}
        @error('subcategory_id')
            <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
        @enderror                    
    </div> --}}
    <div class="col-md-6">
        <label for="name" class="form-label">SubCategoria:</label>
        {!! Form::select('subcategory_id', $subcategories, null, ['class' => 'form-control  block w-full','style'=>'color:white;width: 100%','id'=>'state', 'placeholder'=>'Seleccione una Subcategoria .....']) !!}

        {{-- <select class="form-select form-select-lg mb-3" id="state" name="subcategory_id"></select> --}}
        @error('subcategory_id')
        <strong class="text-sm text-red-600"  style="color: red">{{$message}}</strong>
    @enderror 
    </div>

    <div class="col-md-12">
        <label for="observation" class="form-label">Observaciones:</label>
        {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
        <textarea class="form-control" id="observation" name="observation" rows="3" value="{{old('observation')}}"></textarea>

        @error('observation')
        <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
    @enderror 
    </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
        </div>

    {!! Form::close() !!}

</div>
</div>

@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <link rel="stylesheet" href="{{asset('/path/to/select2.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


@section('scripts')

<script>
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryId = this.value;
            $('#state').html('');
            $.ajax({
                url: '{{ route('getStates') }}?category_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#state').html('<option value="" selected　@if(old('subcategory_id')=='3')selected  @endif>Seleccione una Subcategoria .....</option>');
                    $.each(res, function (key, value) {
                        $('#state').append('<option value="' + value
                            .id + '"       >' + value.name + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });
     
    });
</script>
<script>
    $('#country').select2({theme: "bootstrap4"  });
  </script>
  <script>
    $('#state').select2({theme: "bootstrap4"  });
  </script>
   <script>
    $('#employee').select2({theme: "bootstrap4"  });
  </script>
   <script>
    $('#priority').select2({theme: "bootstrap4"  });
  </script>
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