

<div class="container">
    <div class="row">

 <h4 class="mt-5">Añadir Observacion Incidencia</h4>
 

 {!! Form::model($incidence, ['route' => ['incidente.upload', $incidence], 'method' => 'put', 'files' => true, 'class'=>'formulario row g-3']) !!}
 <div class="col-md-12">
     <label for="asunto" class="form-label">Asunto:</label>
     <input type="name" class="form-control" id="asunto" name="asunto" style="color: white" value="{{$incidence->asunto}}" readonly>
     @error('asunto')
         <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
     @enderror   
 </div>

 <div class="col-md-12">
     <label for="observation" class="form-label">Observacion:</label>
     {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
     <textarea class="form-control" id="observation" name="observation" rows="3" value="{{$incidence->observation}}" readonly>{{$incidence->observation}}</textarea>

     @error('observation')
     <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
 @enderror 
 </div>

 <h4>APARTADO DE ASUNTOS INTERNOS:</h4>
 
 <div class="col-md-12">
    <label for="observation" class="form-label">Observacion:</label>
    {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
    <p>
        @if($incidence->observation_interno == '')

        No Se Agregaron observaciones.

        @else  
        {{$incidence->observation_interno}}

        @endif


        
    </p>

  
</div>

<h4>APARTADO DE SSOMA:</h4>

 <div class="col-md-12">
     <label for="observation" class="form-label">Agregar una Observacion:</label>
     {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
     <textarea class="form-control" id="observation_soma" name="observation_soma" rows="3" value="{{old('observation')}}"></textarea>

     @error('observation')
     <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
 @enderror 
 </div>

 <div class="flex items-center">
     <input id="file" name="file" type="file" class="form-input flex-1">
 </div>

 @error('file')
     <span class="text-xs text-red-500">{{$message}}</span>
 @enderror

     <div class="col-12">
         <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
     </div>

 {!! Form::close() !!}

</div>
</div>
