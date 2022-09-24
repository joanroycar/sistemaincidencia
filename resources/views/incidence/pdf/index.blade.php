<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Margenes de la hoja -->



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <div class="wrapper">
        <div class="content-wrapper" class="d-flex flex-column">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <img src={{URL::asset('assets/img/fcca.jpg')}} alt="" style="width: 100; height:100" class="float-left">
                        <br>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </div>

   
    <div class="wrapper">
        <div class="content-wrapper" class="d-flex flex-column">
            <div class="content">
                <div class="container-fluid">

                    <!-- Encabezado tabla -->
                    <h1 class="h6 font-weight-lighter text" style="text-align:right"><b> <small>FERRROCARRIL</small>
                        </b></h1>
                    <h1 class="h6 font-weight-lighter text" style="text-align:right"><b><small>SERVICIOS</small></b>
                    </h1>
                    <h1 class="h6 font-weight-lighter text" style="text-align:right"><b><small>HUACHIPA</small></b></h1>
                    <h1 class="h6 font-weight-lighter text" style="text-align:right">
                        <b><small>{{\Carbon\Carbon::now('America/Lima')}}</small></b>
                    </h1>

                    <div class="card  mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-lighter text " style="text-align:center"><small><b>DATOS DEL
                                        EMPLEADO</b></small></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col"> <small><b>Nombres y Apellidos</b> </small></th>

                                            <th scope="col"><small> <b>Telefono</b> </small> </th>
                                            <th scope="col"> <small><b>Tipo de Documento</b></small></th>
                                            <th scope="col"><small><b>N° Documento</b></small> </th>
                                            <th scope="col"><small><b>Area</b></small> </th>
                                            <th scope="col"><small><b>Fecha de Nacimiento</b></small> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td><small>{{$incidence->employees->name}}
                                                    {{$incidence->employees->lastname}}
                                                </small></td>

                                            <td> <small>{{$incidence->employees->phone}}</small> </td>
                                            <td> <small>{{$incidence->employees->documenttypes->name}}
                                                </small> </td>
                                            <td> <small>{{$incidence->employees->numdocument}}
                                                </small> </td>

                                            <td> <small>{{$incidence->employees->areas->name}}

                                                </small> </td>

                                            <td> <small>{{$incidence->employees->birthdate}}


                                                </small> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="content-wrapper" class="d-flex flex-column">
            <div class="content">
                <div class="container-fluid">

                    <!-- Encabezado tabla -->
                    <div class="card  mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-lighter text " style="text-align:center"><small><b>DATOS DEL
                                        INCIDENTE</b></small></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> USUARIO DE TI: </b> {{$incidence->users->name}}
                                    </p>

                                    {{-- <p style="color:black">
                                    </p> --}}
                                </div>
                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> CATEGORIA:
                                        </b>
                                        {{$incidence->subcategories->categories->name}}
                                    </p>

                                    {{-- <p style="color:black">
                                    </p> --}}
                                </div>

                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> SUBCATEGORIA: </b>
                                        {{$incidence->subcategories->name}}
                                    </p>


                                </div>



                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> DESCRIPCIÓN DE SUBCATEGORIA: </b>
                                        {{$incidence->subcategories->description}}
                                    </p>


                                </div>

                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> FECHA DE REPORTE DE INCIDENTE: </b>
                                        {{$incidence->fechareporte}}

                                    </p>

                                    {{-- <p style="color:black">
                                    </p> --}}
                                </div>
                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> FECHA DE TERMINO DE INCIDENTE: </b>
                                        {{$incidence->fechatermino}}

                                        {{--
                                    <p style="color:black">
                                    </p> --}}
                                </div>
                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> ASUNTO: </b>
                                        {{$incidence->asunto}}

                                        {{--
                                    <p style="color:black">
                                    </p> --}}
                                </div>
                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> OBSERVACIÓN: </b>
                                        {{$incidence->observation}}

                                        {{--
                                    <p style="color:black">
                                    </p> --}}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="content-wrapper" class="d-flex flex-column">
            <div class="content">
                <div class="container-fluid">

                    <!-- Encabezado tabla -->
                    <div class="card  mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-lighter text " style="text-align:center"><small><b>OBSERVACION
                                        DEL AREA DE ASUNTOS INTERNOS</b></small></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> OBSERVACIÓN: </b>
                                        {{$incidence->observation_interno}}
                                    </p>

                                    {{-- <p style="color:black">
                                    </p> --}}
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="content-wrapper" class="d-flex flex-column">
            <div class="content">
                <div class="container-fluid">

                    <!-- Encabezado tabla -->
                    <div class="card  mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-lighter text " style="text-align:center"><small><b>OBSERVACION
                                        DEL AREA SSOMA</b></small></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-6">

                                    <p class="" style="color:black"> <b> OBSERVACIÓN: </b>
                                        {{$incidence->observation_soma}}
                                    </p>

                                    {{-- <p style="color:black">
                                    </p> --}}
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <h1></h1>





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
{{--
<!doctype html>
<html lang="en">

<head>
    <title>Documento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <h1> Datos de Vehiculo</h1>
        </div>

        <div class="col-md-6">

            <p class="" style="color:black"> <b> Numero de Placa: </b></p>

            <p style="color:black"> {{$especializado->vehiculos->numero_placa}}
            </p>
        </div>

        <div class="col-md-6">

            <p class="" style="color:black"> <b>Marca:</b></p>

            <p style="color:black"> {{$especializado->vehiculos->modelos->marcas->nombre}}
            </p>
        </div>
        <div class="col-md-6">

            <p class="" style="color:black"> <b> Modelo: </b></p>

            <p style="color:black"> {{$especializado->vehiculos->modelos->nombre}}
            </p>
        </div>

        <div class="col-md-6">

            <p class="" style="color:black"> <b> CIFRA VIN: </b></p>

            <p style="color:black"> {{$especializado->vehiculos->cifra_vin}}
            </p>




        </div>
    </div>

    <img id="picture" class="figure-img img-fluid rounded"
        src="{{Storage::url('especializado/'.$especializado->img_salida_2)}}" alt="">

    <p> Iamgenes de Salida</p>

    <img id="picture" class="figure-img img-fluid rounded"
        src="{{Storage::url('especializado/'.$especializado->img_inicial_2)}}" alt="">

    <p> Iamgenes de Salida</p>
    <img id="picture" class="figure-img img-fluid rounded"
        src="{{Storage::url('especializado/'.$especializado->img_inicial_3)}}" alt="">

    <div class="container py-5">
        <h5 class=" font-weight-bold">DOMPDF Tutorial</h5>
        <table class="table table-bordered mt-5">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Carro</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $especializado->id }}</td>
                    <td>{{ $especializado->ot }}</td>
                    <td>{{ $especializado->vehiculos->numero_placa}}</td>
                    <td>{{$especializado->vehiculos->modelos->marcas->nombre}}</td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html> --}}