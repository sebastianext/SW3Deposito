@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">Registro de Entrada</div>
  </div>

	<h3 class="ui header">Realizar Entrada de Inventario</h3>
	<div id="mensajeError">
	
	</div>
{!! Form::open(['route'=>'inventario.store','method'=>'POST']) !!}
		<input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
    	@include('ventas.forms.inventario')
   	
      	<div class="ui form">
			  <div class="three fields">
					<div class="field">
					    <label>Producto</label>
					    {!! Form::select('producto_id',$productos) !!}
				  	</div>	
				  	<div class="field">
						

				          {!! link_to('#',$title='+ Agregar',$atributes=['id'=>'agregar','class'=>'ui primary  button addProdcuto'],$secure=null) !!} 
				        
					</div>
			  </div>

		</div>
		

 <table class="ui striped celled selectable table green">
  <thead>
  
    <tr >
      <th class="collapsing">Producto</th>
      <th class="collapsing">Nº Disponible</th>
      <th class="collapsing">Precio</th>
      <th class="collapsing">Cantidad</th>
      <th class="collapsing">Sub-Total</th>
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody class="productosVenta">
    
    </tbody>
    <tfoot>
    	<tr>
	    	<th></th>
	    	<th></th>
	    	<th></th>
		    <th rowspan="2" scope="col"><i class="attention icon"></i><b>TOTAL</b></th>
		    <th  scope="col">$<b class="total">0</b></th>
		    <th></th>
	    </tr>
	   
    </tfoot>
  
</table>


 



    {!! link_to('#',$title='Aceptar',$atributes=['id'=>'aceptar','class'=>'ui primary  button'],$secure=null) !!} 
{!! Form::close() !!}
	
@stop

@section('scripts')
  {!!Html::script('js/agregarproducto.js')!!}
@endsection