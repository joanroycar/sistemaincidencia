@extends('layouts.panel')

@section('content')

<br>
<div class="container">


    <div class="row">

        <div class="card" style="background-color: #0e1726; background:#0e1726;">
            <div id="tabsWithIcons" class="col-lg-12 col-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Información Detallada Del Incidente</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area rounded-pills-icon" style="padding: 20">

                        <ul class="nav nav-pills mb-4 mt-3  justify-content-center" id="rounded-pills-icon-tab"
                            role="tablist">
                            <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 active text-center" id="rounded-pills-icon-home-tab"
                                    data-bs-toggle="pill" href="#rounded-pills-icon-home" role="tab"
                                    aria-controls="rounded-pills-icon-home" aria-selected="true"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>Datos del Empleado</a>
                            </li>
                            {{-- <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 text-center" id="rounded-pills-icon-profile-tab"
                                    data-bs-toggle="pill" href="#rounded-pills-icon-profile" role="tab"
                                    aria-controls="rounded-pills-icon-profile" aria-selected="false"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg> Datos del Empleado</a>
                            </li>
                            <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 text-center" id="rounded-pills-icon-contact-tab"
                                    data-bs-toggle="pill" href="#rounded-pills-icon-contact" role="tab"
                                    aria-controls="rounded-pills-icon-contact" aria-selected="false"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-phone">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                        </path>
                                    </svg> Contact</a>
                            </li> --}}

                            <li class="nav-item ml-2 mr-2">
                                <a class="nav-link mb-2 text-center" id="rounded-pills-icon-settings-tab"
                                    data-bs-toggle="pill" href="#rounded-pills-icon-settings" role="tab"
                                    aria-controls="rounded-pills-icon-settings" aria-selected="false"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-settings">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path
                                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                                        </path>
                                    </svg> Datos del Incidente</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="rounded-pills-icon-tabContent">

                            <div class="tab-pane fade show active" id="rounded-pills-icon-home" role="tabpanel"
                                aria-labelledby="rounded-pills-icon-home-tab">


                                <div class="row">

                                    <div class="col-md-3">

                                        <h6> <b>Nombres Y Apellidos:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->employees->name}} {{$incidence->employees->lastname}}

                                        </p>
                                    </div>

                                    <div class="col-md-3">
                                        <h6> <b>Telefóno:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->employees->phone}}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <h6> <b>Tipo de Documento:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->employees->documenttypes->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <h6> <b>N° Documento:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->employees->numdocument}}
                                        </p>
                                    </div>
                                    <div class="col-md-3">
                                        <h6> <b>Area:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->employees->areas->name}}
                                        </p>
                                    </div>

                                    <div class="col-md-3">
                                        <h6> <b>Fecha de Nacimiento:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->employees->birthdate}}
                                        </p>
                                    </div>
                                </div>


                            </div>
                            {{-- <div class="tab-pane fade" id="rounded-pills-icon-profile" role="tabpanel"
                                aria-labelledby="rounded-pills-icon-profile-tab">
                                <div class="media">
                                    <img class="me-3" src="../src/assets/img/profile-32.jpeg"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                        sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                        turpis. Fusce
                                        condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in
                                        faucibus.
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="rounded-pills-icon-contact" role="tabpanel"
                                aria-labelledby="rounded-pills-icon-contact-tab">
                                <p class="dropcap  dc-outline-primary">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div> --}}
                            <div class="tab-pane fade" id="rounded-pills-icon-settings" role="tabpanel"
                                aria-labelledby="rounded-pills-icon-settings-tab">
                                
                                <div class="row">


                                    @switch($incidence->priorities->name)
                                    @case('ALTA')
                                     
                                    <div class="alert alert-arrow-left alert-icon-left alert-light-danger alert-dismissible fade show mb-4" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-bs-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                        <strong>{{$incidence->priorities->name}}!</strong> {{$incidence->observation}}
                                    </div>
                                    @break
                                    @case('BAJA')
                                    <div class="alert alert-arrow-left alert-icon-left alert-light-info alert-dismissible fade show mb-4" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-bs-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                        <strong>{{$incidence->priorities->name}}!</strong> {{$incidence->observation}}
                                    </div>    
                                    @break
                                    @case('MEDIA')
                                    <div class="alert alert-arrow-left alert-icon-left alert-light-warning alert-dismissible fade show mb-4" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" data-bs-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                                        <strong>{{$incidence->priorities->name}}!</strong> {{$incidence->observation}}
                                    </div>    
                                    @break
                                    @default
                                    @endswitch



                                  
                                    <div class="col-md-2">

                                        <h6> <b>Usuario TI:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->users->name}}

                                        </p>
                                    </div>

                                    <div class="col-md-2">
                                        <h6> <b>Categoria:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->subcategories->categories->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <h6> <b>SubCategoria:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->subcategories->name}}
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <h6> <b>Descripcion De SubCategoria:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->subcategories->description}}
                                        </p>
                                    </div>
                                    <div class="col-md-2">
                                        <h6> <b>Prioridad:</b></h6>

                                        <p class="mb-4">
                                            @switch($incidence->priorities->name)
                                            @case('ALTA')
                                            <button class="btn btn-danger mb-2 me-4">ALTA</button>
            
                                            @break
                                            @case('BAJA')
                                            <button class="btn btn-info mb-2 me-4">BAJA</button>
            
                                            @break
                                            @case('MEDIA')
                                            <button class="btn btn-warning mb-2 me-4">MEDIA</button>
            
                                            @break
                                            @default
                                            @endswitch
                                        
                                        </p>

                                        
                                    </div>

                                    <div class="col-md-2">
                                        <h6> <b>Fecha De Reporte:</b></h6>

                                        <p class="mb-4">
                                            {{$incidence->fechareporte}}
                                        </p>
                                    </div>
                                </div>



                            </div>

                        </div>

                        @if ($incidence->status == 'CERRADO')

                        @include('incidence.general')


                            
                    
                        @else


                        @can('incidence.addObservarionInterno')

                        
                        @include('incidence.internos.prueba')

                        @endcan



                        @can('incidence.addObservationFile')

                        @include('incidence.ssoma.form')
                        @endcan
                        @endif

                    </div>
                </div>
            </div>
        </div>



    </div>
</div>



@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{--
<link rel="stylesheet" href="{{asset('/path/to/select2.css')}}"> --}}
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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