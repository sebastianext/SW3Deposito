@extends('layouts.principal')



@section('content')



  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Clientes</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular users icon"></i>
    Clientes
  </h2>
  <div class="ui divider"></div>

    @if(Session::has('mensaje'))
      <div class="ui green floating icon message">
      <i class="check circle icon"></i>
        <i class="close icon"></i>
        <div class="header">
          Accion Procesada!.  
        </div>
        <div>&nbsp; El registro se {{Session::get('mensaje')}} <b>exitosamente</b>.</div>
      </div>
    @endif

 <table class="ui striped celled selectable table blue" id="tableDataTable">
  <thead>
    <tr>
      <th colspan="12">
        Listado de Clientes
        <a href="{!!URL::to('/cliente/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button">
          <i class="add user icon"></i> Crear Cliente
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th >Cedula</th>
      <th >Nombres</th>
      <th >Apellidos</th>
      <th >Direccion</th>
      <th >Telefono</th>
      <th >Correo</th>
      <th class="collapsing" >Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($clientes as $cliente)
      <tr>
        <td>
        <!-- {!!link_to_route('cliente.edit', $title = 'Editar', $parameters = $cliente->id, $attributes = ['class'=>'large edit icon']);!!} -->
        {!! Html::decode(link_to_route('cliente.edit', '<i class="large edit icon"></i>',$cliente->id, null))!!}
        </td>
        <td>{{ $cliente->cedula}}</td>
        <td>{{ $cliente->nombres}}</td>
        <td>{{ $cliente->apellidos}}</td>
        <td>{{ $cliente->direccion}}</td>
        <td>{{ $cliente->telefono}}</td>
        <td>{{ $cliente->correo}}</td>
        <td>
           <!-- {!! Html::decode(link_to_route('cliente.edit', '<i class="large trash outline icon"></i>',$cliente->id, null))!!} -->
        @include('cliente.delete')
       
        <a class="eli {{$cliente->id}}"> <i class="large trash outline icon" ></i></a>

        </td>
        
      </tr>
       @endforeach
    </tbody>
 
</table>
@stop

