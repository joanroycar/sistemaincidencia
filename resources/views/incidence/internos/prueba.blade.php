

<div class="container">
       <div class="row">


    <h4 class="mt-5">Añadir Observacion Incidencia</h4>
    

    {!! Form::model($incidence, ['route' => ['incidente.uploadinterno', $incidence], 'method' => 'put', 'files' => true, 'class'=>'formulario row g-3']) !!}
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

    @if($incidence->observation_interno == '')        

    <div class="col-md-12">
        <label for="observation" class="form-label">Agregar una Observacion:</label>
        {{-- <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">  --}}
        <textarea class="form-control" id="observation_interno" name="observation_interno" rows="3" value="{{old('observation')}}"></textarea>

        @error('observation')
        <strong class="text-sm text-red-600" style="color: red">{{$message}}</strong>
    @enderror 
    </div>
    <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
    </div>


    {!! Form::close() !!}
    @else
    <textarea class="form-control" id="observation_interno" name="observation_interno" rows="3" value="{{old('observation')}}" readonly>{{$incidence->observation_interno}}</textarea>


    @endif

</div>
</div>
