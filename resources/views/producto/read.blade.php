@extends('layouts.principal')



@section('content')



  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Productos</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
    Productos
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
        Listado de Productos
        <a href="{!!URL::to('/producto/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button">
          <i class="cubes icon"></i>Crear Producto
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th>Nombre</th>
      <th>Precio Compra</th>
      <th>Precio Venta</th>
      <th>Minimo Inventario</th>
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($productos as $producto)
      <tr>
        <td>
          {!! Html::decode(link_to_route('producto.edit', '<i class="large edit icon"></i>',$producto->id, null))!!}
        </td>
        <td>{{ $producto->nombre}}</td>
        <td>$ {{ number_format($producto->preciocompra)}}</td>
        <td>$ {{ number_format($producto->precioventa)}}</td>
        <td>{{ $producto->minimoinventario}}</td>
        <td>
          @include('producto.delete')
          <a class="eli {{$producto->id}}"> <i class="large trash outline icon" ></i></a>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

