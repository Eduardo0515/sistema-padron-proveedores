@unless($datosTabla->count()>0)
    <!--<h4>Sin Informacion Registrada</h4>-->
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dependencia</th>
                <th>Tel. Oficina</th>
                <th>Extension(es)</th>
                <th>Celular</th>
                <th>Fecha Captura</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        <tr>   
            <td colspan="9" style="text-align: center;"> Sin resultados </td>
        </tr>
        </tbody>
        
    </table>

@else
    <p> Mostrando registros del {{ $datosTabla->firstItem() }} al {{ $datosTabla->lastItem() }} de un total de {{ $datosTabla->total() }} registros </p>
    <table class="table table-bordered table-striped datatable">
        <thead>
            <tr>
                <th></th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dependencia</th>
                <th>Area que labora</th>
                <th>Tel. Oficina</th>
                <th>Extension(es)</th>
                <th>Celular</th>
                <th>Fecha Captura</th>
                <th>Estatus</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
             @foreach($datosTabla as $datoActual)
                <tr>
                
                    <td> {{$loop->iteration}} </td>
                    <td> {{$datoActual->username}} </td>
                    <td> {{$datoActual->nombres}}  </td>
                    <td> {{$datoActual->apellidos}}</td>
                    <td> {{$datoActual->dependencias->dependencia}} </td>
                    <td> {{$datoActual->area_labora}}</td>
                    <td> {{$datoActual->tel_oficina}}</td>
                    <td> {{$datoActual->extensiones}}</td>
                    <td> {{$datoActual->celular}} </td>
                    <td> {{$datoActual->created_at}} </td>
                    <td> {{$datoActual->estatus->estatus}} </td>
                    <td style="text-align: center;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Acciones</button>
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                            <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="javascript:;" onclick="window.location.href='{{ url('/usuarios/'.$datoActual->id.'/edit') }}'"><i class="fas fa-edit"></i>Editar</a>
                            <a class="dropdown-item" href="javascript:;" onclick="f_popup_info('privilegios/@php echo $datoActual->id @endphp/edit','Privilegios del Usuario');"><i class="fas fa-user-cog"></i>Privilegios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:;"  onclick="f_delete_row('usuarios/@php echo $datoActual->id @endphp','{{$datoActual->username}}');"><i class="fas fa-trash"></i>Eliminar</a>
                        </div>
                    </td>
                </tr>
                @endforeach
        </tbody>
        
    </table>
     {{$datosTabla->links()}}
@endunless
