		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
		<div class="ui form">
		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Nombre</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('nombre',null,['placeholder'=>'Nombre']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		  </div>

		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Precio Compra</label>
				    <div class="ui left icon corner labeled input">
				    <i class="dollar icon"></i>
				     {!! Form::text('preciocompra',null,['placeholder'=>'9.999']) !!}
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		    </div>
 			<div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Precio Venta</label>
				    <div class="ui left icon corner labeled input">
				    <i class="dollar icon"></i>
				      {!! Form::text('precioventa',null,['placeholder'=>'9.999']) !!}
				  
				      <div class="ui obligatorio corner label">
					  			<i class="asterisk icon"></i>
							</div>
				    </div>
		    </div>
		  
		    
		  </div>

		  <div class="three fields">
		    <div class="field padding-right-campo">
			      <label>Minimo Inventario</label>
				    <div class="ui corner labeled input">
				      {!! Form::text('minimoinventario',null,['placeholder'=>'10']) !!}
				    </div>
		    </div>
		  </div>
		  <div class="fields">
		    <div class="field fourteen wide padding-right-campo">
			      <label>Descripcion</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('descripcion',null,[ 'size' => '10x3','placeholder'=>'Descripcion']) !!}
				    </div>
		    </div>
		  </div>


		</div>
	
	<div class="ui hidden divider"></div>
                              