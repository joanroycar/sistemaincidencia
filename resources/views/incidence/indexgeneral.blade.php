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
                <li class="breadcrumb-item active" aria-current="page">Incidencias</li>
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
                            <th>Progreso</th>

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

                            <td>
                                @switch($incidence->statusprogress)
                                @case('1')
                                <span class="badge badge-light-success inv-status">DP.TI</span>

                                @break
                                @case('2')
                                <span class="badge badge-light-warning inv-status">ASU. INTERNOS</span>

                                @break
                                @case('3')
                                <span class="badge badge-light-secondary inv-status">SSOMA</span>

                                @break
                                @case('4')
                                <span class="badge badge-light-info inv-status">ADMINISTRACI??N</span>

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
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>

                                        </a>
                                        {{-- <a href="{{route('incidences.edit',$incidence)}}" class="bs-tooltip"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"
                                            data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg></a> --}}

                                            <a href="{{route('incidence.pdf',$incidence)}}" class="text-danger font-weight-bold text-xl" title="PDF" data-toggle="tooltip" data-original-title="PDF">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                              
                                            </a>

                                        




                                </ul>
                                <ul>

                                    @switch($incidence->statusprogress)
                                    @case('1')
                                   
                                    @break
                                    @case('2')
    
                                    @break
                                    @case('3')
    
                                    @break
                                    @default
                                    @endswitch
                
                                    
                                </ul>
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
          text: "??No podr??s revertir esto!",
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
<script>
    $('.internos').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de Enviar Asuntos Internos?',
          text: "??No podr??s revertir esto!",
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