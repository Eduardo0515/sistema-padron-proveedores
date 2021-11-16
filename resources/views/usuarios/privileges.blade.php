@extends('layouts.admin_lte_modals')
@section('content_popup_modals')
<form class="form-horizontal" id="form1" name="form1">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="bold" width="250">Menú</th>
                                <th class="bold">Privilegios
                                    <div class="pull-right">
                                        <a onclick="toglePrivilegiosTodos(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Todos</a>
                                        <a onclick="toglePrivilegiosTodos(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Ninguno</a>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center"><strong>MENU PRINCIPAL</strong></td>
                            </tr>
                            <!-- Carga Menu Del Sistema-->
                            @php
                            $ParentLastid=0;
                            @endphp

                            @foreach ($privilegios as $item)
                                @if($item->parentid==0)
                                <!-- Menu  -->
                                <tr>
                                   <td>
                                        <span style="margin-left:0px;"><i class="{{$item->icono}}"></i> {{$item->menu}}</span>
                                        <input type="hidden" name="id_menu[]" value="{{$item->id}}">
                                    </td>
                                    <td class="td-privilegios">
                                    @if($item->ver==1)
                                        @if($item->ver2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Ver<input type="hidden" name="ver_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Ver<input type="hidden" name="ver_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif
                                    @if($item->agregar==1)
                                        @if($item->agregar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Agregar<input type="hidden" name="agregar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Agregar<input type="hidden" name="agregar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif
                                    @if($item->editar==1)
                                        @if($item->editar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Editar<input type="hidden" name="editar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Editar<input type="hidden" name="editar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif
                                    @if($item->eliminar==1)
                                        @if($item->eliminar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Eliminar<input type="hidden" name="eliminar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Eliminar<input type="hidden" name="eliminar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif

                                    @if($item->impresion==1)
                                        @if($item->impresion2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Impresion<input type="hidden" name="impresion_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Impresion<input type="hidden" name="impresion_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif

                                    @if($item->exportar==1)
                                        @if($item->exportar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Exportar<input type="hidden" name="exportar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Exportar<input type="hidden" name="exportar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif


                                    </td>
                                </tr>
                                @endif

                                @if($item->parentid!=0)
                                <!-- Sub menus -->
                                <tr>
                                   <td>
                                        <span style="margin-left:30px;"><i class="{{$item->icono}}"></i> {{$item->menu}}</span>
                                        <input type="hidden" name="id_menu[]" value="{{$item->id}}">
                                    </td>
                                    <td class="td-privilegios">
                                    @if($item->ver==1)
                                        @if($item->ver2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Ver<input type="hidden" name="ver_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Ver<input type="hidden" name="ver_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif
                                    @if($item->agregar==1)
                                        @if($item->agregar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Agregar<input type="hidden" name="agregar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Agregar<input type="hidden" name="agregar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif
                                    @if($item->editar==1)
                                        @if($item->editar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Editar<input type="hidden" name="editar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Editar<input type="hidden" name="editar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif
                                    @if($item->eliminar==1)
                                        @if($item->eliminar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Eliminar<input type="hidden" name="eliminar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Eliminar<input type="hidden" name="eliminar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif

                                    @if($item->impresion==1)
                                        @if($item->impresion2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Impresion<input type="hidden" name="impresion_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Impresion<input type="hidden" name="impresion_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif

                                    @if($item->exportar==1)
                                        @if($item->exportar2==1)
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-success"><i class="fas fa-check"></i> Exportar<input type="hidden" name="exportar_{{$item->id}}" value="1"></a>
                                         @else
                                         <a onclick="togglePrivilegio(this)" class="btn btn-xs bg-danger"><i class="fas fa-ban"></i> Exportar<input type="hidden" name="exportar_{{$item->id}}" value="0"></a>
                                         @endif
                                    @endif


                                    </td>
                                </tr>
                                @endif

                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" id="id_registro" name="id_registro" value="{{$info->id}}">
                    <div class="text-center">
                        <button id="btnSave" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Guardar</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
@stop
@section('content_popup_js')
<script src="{{ asset('js/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/usuarios-privileges.js') }}"></script>
@stop
