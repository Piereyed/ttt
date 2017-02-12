@extends('index')
@section('content')


<div class="section">

    <!--   Icon Section   -->
    <div class="row">
        <div class="col m12">
            <h1>Clientes</h1>
            <div class="row">
                <div class="col m6 s12">
                    <h6>Se encontraron {{ $size }} clientes</h6>
                </div>
                <div class="col m6 s12">
                    <a title="Ver" class="opc waves-effect waves-light btn blue disabled"><i class="material-icons left">visibility</i>Ver</a>
                    <a title="Editar" class="opc waves-effect waves-light btn yellow darken-1 disabled"><i class="material-icons left">mode_edit</i>Editar</a>
                    <a data-target="modal_eliminar" title="Eliminar" class="opc waves-effect waves-light btn red disabled"><i class="material-icons left">delete</i>Eliminar</a>
                </div>
            </div>
            
            <div class="fixed-action-btn horizontal">
                <a href="{{ route('client.create') }}" title="Nuevo cliente" class="btn-floating btn-large green">
                    <i class="large material-icons">add</i>
                </a>                
            </div>

            <!--  footer-->

            <!-- Modal Structure -->
            <div id="modal_eliminar" class="modal bottom-sheet">
                <div class="modal-content">
                    <h4>CUIDADO</h4>
                    <p>Está a punto de eliminar este elemento.</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CONTINUAR</a>
                    <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CANCELAR</a>
                </div>
            </div>

            <table class="responsive-table bordered highlight">
                <thead>
                    <tr>
                        <th data-field="id">Código</th>
                        <th data-field="name">Nombre</th>
                        <th data-field="lastname1">Apellidos paterno</th>
                        <th data-field="options">Elegir</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($clients as $client)
                    <tr class="fila" id="{{$client->id }}"  data-target="modal1">
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->lastname1. " " . $client->lastname2 }}</td>
                        <td class="opciones">
                            <p>
                                <input type="checkbox" class="check filled-in" id="{{ 'check_'.$client->id }}" />
                                <label for="{{ 'check_'.$client->id }}"></label>
                            </p>
                            <!--
<span><a class="btn-floating blue" title="Ver"><i class="material-icons">visibility</i></a></span>
<span><a class="btn-floating green" title="Editar"><i class="material-icons">mode_edit</i></a></span> 
<span><a class="btn-floating red" title="Eliminar"><i class="material-icons">delete</i></a></span> 
-->

                        </td>

                    </tr>   
                    @endforeach                 
                </tbody>
            </table>
            {{ $clients->links() }}
        </div>                    
    </div>

</div>



@endsection