
                                @if ($item['submenu'] == [])
                                <li class="nav-item">
                                    @if ($item['sub_menu'] == 1)
                                    <a href="javascript:;" class="nav-link"><i class="nav-icon {{ $item['icono'] }}"></i> <p>{{ $item['menu'] }} <i class="right fas fa-angle-left"></i> </p></a>
                                    @else
                                    <a href="{{ url($item['clave']) }}" class="nav-link"><i class="nav-icon {{ $item['icono'] }}"></i> <p>{{ $item['menu'] }} </p></a>
                                    @endif
                                </li>
                                @else
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link">
                                        <i class="nav-icon {{ $item['icono'] }}" class="nav-link"></i> <p>{{ $item['menu'] }} <i class="right fas fa-angle-left"></i></p>
                                        
                                    </a>
                                    @if ($item['submenu'] != [])
                                    <ul class="nav nav-treeview">

                                    @foreach ($item['submenu'] as $submenu)
                                            @if ($submenu['submenu'] == [])
                                                            <li class="nav-item">
                                                                <a href="{{ url( $submenu['clave']) }}" class="nav-link"> <i class="{{ $submenu['icono'] }}"></i> <p>{{ $submenu['menu'] }}</p></a>
                                                            </li>
                                            @else
                                                @include('layouts.includes.menu-item-menu', [ 'item' => $submenu ])
                                            @endif
                                    @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endif
                                