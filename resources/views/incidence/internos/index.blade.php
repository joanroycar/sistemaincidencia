@extends('layouts.panel')

@section('content')
<div class="middle-content container-xxl p-0">

    <!-- BREADCRUMB -->
    <div class="page-meta">
        {{-- <div class="col text-right"> --}}
            <a href="{{url('/incidence/create')}}" class="btn btn-xm btn-primary" style="float: right;">Registrar
                Incidencia</a>
            {{--
        </div> --}}
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tabla</a></li>
                <li class="breadcrumb-item active" aria-current="page">Incidencias / Asuntos Internos</li>
            </ol>
        </nav>


    </div>


    <!-- /BREADCRUMB -->

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empleado</th>
                            <th>TI - Usuario</th>
                            <th>Categoria</th>
                            <th>SubCategoria</th>
                            <th>Prioridad</th>
                            <th>Fecha Reporte</th>
                            <th>Fecha Termino</th>
                            <th>Estado</th>

                            <th class="text-center dt-no-sorting">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($incidences as $incidence)

                        <tr>
                            <td>
                                <div class="d-flex">

                                    <p class="align-self-center mb-0 admin-name"> {{$incidence->id}} </p>
                                </div>
                            </td>
                            <td>{{$incidence->employees->name}}</td>
                            <td>{{$incidence->users->name}}</td>
                            <td>{{$incidence->subcategories->categories->name}}</td>
                            <td>{{$incidence->subcategories->name}}</td>
                            <td>

                                @switch($incidence->priorities->name)
                                @case('ALTA')
                                <span class="badge badge-light-danger inv-status">ALTA</span>

                                @break
                                @case('BAJA')
                                <span class="badge badge-light-info inv-status">BAJA</span>

                                @break
                                @case('MEDIA')
                                <span class="badge badge-light-warning inv-status">MEDIA</span>

                                @break
                                @default
                                @endswitch

                            </td>
                            <td>{{$incidence->fechareporte}}</td>
                            <td>

                                @if($incidence->fechatermino == '')
                                <span class="badge badge-light-secondary inv-status display">A TERMINAR</span>

                                @else
                                {{$incidence->fechatermino}}

                                @endif





                            </td>
                            <td>
                                {{-- {{$incidence->status}} --}}
                                @switch($incidence->status)
                                @case('CERRADO')
                                <span class="badge badge-light-success inv-status">CERRADO</span>

                                @break
                                @case('ABIERTO')
                                <span class="badge badge-light-warning inv-status">ABIERTO</span>

                                @break

                                @default
                                @endswitch




                            </td>

                            <td class="text-center">
                                <ul class="table-controls">
                                    <a href="{{route('incidences.show',$incidence)}}" class="bs-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Ver"
                                        data-original-title="Ver">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>

                                    </a>
                                    {{-- <a href="{{route('incidente.edit',$incidence)}}" class="bs-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detaller"
                                        data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-edit-2 p-1 br-8 mb-1">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg></a> --}}
                                    <a href="{{route('incidente.view',$incidence)}}" class="bs-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Detaller"
                                        data-original-title="Edit">Recursos</a>


                                    {{-- <form action="{{route('incidences.destroy', $incidence)}}" method="POST"
                                        class="casino">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('incidences.edit',$incidence)}}" class="bs-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                            data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a>

                                        <button type="submit" class="" style="background-color: none"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash p-1 br-8 mb-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                            </svg></button>

                                    </form> --}}



                                </ul>
                                @if($incidence->observation_interno != '')
                                <ul>
                                    

                                    @switch($incidence->statusprogress)
                                    @case('2')
                                    <form action="{{route('incidences.estado', $incidence)}}" class="internos mt-4"
                                    method="POST">
                                    @csrf
                                    {{-- <button class="btn w-full" type="submit"
                                        style="color:aliceblue; background-color: #3d9970">
                                        Enviar AS.INTERNOS</button> --}}
                                    <button type="submit" class="" style="background-color: none"> Enviar SSOMA

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-send">
                                            <line x1="22" y1="2" x2="11" y2="13"></line>
                                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                        </svg>
                                    </button>
                                 </form>    
                                    @break
                                    @case('1')
    
                                    @break
                                    @case('3')
    
                                    @break

                                    @case('4')
    
                                    @break
                                    @default
                                    @endswitch
                
                                    
                                </ul>
                                @else

                                @endif

                            </td>
                        </tr>

                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>
@endsection
@section('scripts')
@if(session('guardar'))

<script>
    Swal.fire(
     'Registrado!',
     'Los datos se registraron.',
     'success'
     )

</script>
@endif

@if(session('eliminar'))

<script>
    Swal.fire(
    'Eliminado!',
    'Los datos se eliminaron.',
    'success'
    )

</script>
@endif
@if(session('editar'))

<script>
    Swal.fire(
    'Actualizados!',
    'Los datos se actualizaron.',
    'success'
    )

</script>
@endif
<script>
    $('.casino').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de Eliminar?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminar!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
</script>

@endsection