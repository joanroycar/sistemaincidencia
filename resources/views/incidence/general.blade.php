

    <div class="row">

 <h4 class="mt-5 text-center">Observacion Del Area de TI</h4>
 
 <div class="col-md-6">
     <label for="asunto" class="form-label">Asunto:</label>
     {{-- <input type="name" class="form-control" id="asunto" name="asunto" style="color: white" value="{{$incidence->asunto}}" readonly> --}}
     <p>{{$incidence->asunto}}</p>
     @error('asunto')
         <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
     @enderror   
 </div>

 <div class="col-md-6">
     <label for="observation" class="form-label">Observacion:</label>
      <p>{{$incidence->observation}}</p>
     @error('observation')
     <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
 @enderror 
 </div>
</div>

 <br>

 <div class="row">

 <h4 class="mt-5 text-center">Observaciones de Asuntos Internos:</h4>
 
 <div class="col-md-12">
    <label for="observation text-center" class="form-label">Observacion:</label>
    {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
    <p>
        @if($incidence->observation_interno == '')

        No Se Agregaron observaciones.

        @else  
        {{$incidence->observation_interno}}

        @endif


        
    </p>

  
</div>
</div>

<br>
<div class="row">

<h4 class="mt-5 text-center">Observación de Ssoma:</h4>

 <div class="col-md-12">
     <label for="observation" class="form-label"> Observacion:</label>
     {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
        <p>{{$incidence->observation_soma}}</p>
     @error('observation')
     <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
 @enderror 
 </div>

 <div class="row">

    <h4 class="mt-5 text-center">Recursos de la Incidencia: {{$incidence->asunto}}</h4>

    @foreach ($incidence->resources as $resource)

    <div class="flex justify-between items-center">
        {!! Form::open(['route' => 'incidente.download', 'files' => true]) !!}
        <input name="url" value="{{$resource->url}}" readonly class="form-control">
        <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Download</button>
        

        {!! Form::close() !!}
    </div>

    @endforeach
    

</div>


</div>
</div>

