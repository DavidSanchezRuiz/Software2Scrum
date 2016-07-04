@extends('layout.main')
@section('content')



<div class="container col s12 m12" style="width: 100%";>
    <div class="card">
        <div style="padding:10px">
            <span class="card-title"><i class="material-icons card-title-center">filter_list</i>Lista de publicadores</span>
            <p style="color: #5d5d5d;">Los usuarios activados podrán publicar convocatorias, enventos o revistas, los queno solamente podrán hacer búsquedas.</p>
        </div>
        <div class="divider"></div>
        <div class="card-content">
            <ul class="row" style="margin: auto">
                <li class="col s12 m12">
                    <table>
                        <thead>
                        <tr>
                            <th data-field="name">Nombre</th>
                            <th data-field="name">Apellido</th>
                            <th data-field="institute">Universidad o Instituto</th>
                            <th data-field="area">Correo</th>
                            <th data-field="area">Estado</th>
                        </tr>
                        </thead>

                        @foreach($users as $user)
                        @if($user->rol!='administrador')
                             <tbody>
                             <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token{{$user->id}}">
                    <input type="hidden" id="id">
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->name_i}}</td>
                            <td>{{$user->email}}</td>
                                
                             @if($user->rol=='pendiente')

<td id="activar{{$user->id}}"><a class="btn waves-effect waves-light green" onclick="activarUs({{$user->id}})">Activar</a></td>

                             
<td id="desactivar{{$user->id}}" style="display: none"><a class="btn waves-effect waves-light red" onclick="desactivarUs({{$user->id}})">Inactivar</a></td>

<td id="sin_sol{{$user->id}}" style="display: none"><a class="btn disabled">Sin solicitud</a></td>
                            

                            @endif

                            @if($user->rol=='buscador')
                            <td><a class="btn disabled">Sin solicitud</a></td>
                                
                            @endif


                            @if($user->rol=='publicador')

<td id="sin_sol{{$user->id}}" style="display: none"><a class="btn disabled">Sin solicitud</a></td>

                             
<td id="desactivar{{$user->id}}"><a class="btn waves-effect waves-light red" onclick="desactivarUs({{$user->id}})">Inactivar</a></td>


                            
                            @endif
                        </tr>
                      
                        </tbody>
                        @endif
                       
                        @endforeach




                    </table>
                </li>
            </ul>
        </div>
    </div>
</div>


@endsection