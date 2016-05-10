@extends('layouts.principal')



@section('content')



  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Lista de ventas</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular add to cart icon"></i>
    Ventas
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
        Listado de ventas
        <a href="{!!URL::to('/inventario/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button">
          <i class="cubes icon"></i>Registro de Entrada
        </div>
        </a>
      </th>
    </tr>
    <tr>
      <th>Producto</th>
      <th>Cantidad</th>
      <th  class="collapsing">Fecha de Creacion</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($ventas as $producto)
      <tr>
        <td>{{ $producto->nombre}}</td>
        <td>{{ $producto->cantidad}}</td>
        <td>{{ $producto->created_at}}</td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

