<table>
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
            <th>Observación TI</th>
            <th>Observación INTERNOS</th>
            <th>Observación SSOMA</th>


        </tr>
    </thead>
    <tbody>
        @foreach($incidences as $incidence)
        <tr>
            <td>{{$incidence->id }}</td>
            <td>{{$incidence->employees->name}}</td>
            <td>{{$incidence->users->name}}</td>
            <td>{{$incidence->subcategories->categories->name}}</td>
            <td>{{$incidence->subcategories->name}}</td>
            <td>{{$incidence->priorities->name}}</td>
            <td>{{$incidence->fechareporte}}</td>
            <td>{{$incidence->fechatermino}}</td>
            <td>{{$incidence->observation}}</td>
            <td>{{$incidence->observation_soma}}</td>

            <td>{{$incidence->observation_interno}}</td>

        </tr>
        @endforeach
    </tbody>
</table>