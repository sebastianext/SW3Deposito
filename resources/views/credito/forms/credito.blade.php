		<div class="ui custom popup top left transition hidden">
			 Este campo es obligatorio
		</div>
		<div class="ui divider"></div>
			


		<div class="ui form">

		  <div class="three fields">
		  		<div class="field">
					    <label>Cliente</label>
					    {!! Form::select('cliente_id',$clientes) !!}
				</div>	
		  </div>

		  
		  	<div class="three fields">
			    <div class="field">
				      <label>Valor</label>
					    <div class="ui left icon corner labeled input">
					    <i class="dollar icon"></i>
					     {!! Form::text('valor',null,['placeholder'=>'9.999','id'=>'valor']) !!}
					      <div class="ui obligatorio corner label">
						  			<i class="asterisk icon"></i>
								</div>
					    </div>
			    </div>
		    </div>

		    <div class="three fields">
			    <div class="field">
				      <label>Abono</label>
					    <div class="ui left icon corner labeled input">
					    <i class="dollar icon"></i>
					     {!! Form::text('abono',null,['placeholder'=>'9.999','id'=>'abono']) !!}

					    </div>
			    </div>
		    </div>


		  <div class="three fields">
		  		<div class="field">
					    <label>Tipo Contratacion</label>
					    {!!Form::select('tipo_contratacion', ['1' => 'Publico', '2' => 'Privado','3' => 'Independiente'])!!}
				</div>	
		  </div>
		  <div class="fields">
		    <div class="field fourteen wide padding-right-campo">
			      <label>Descripcion</label>
				    <div class="ui corner labeled input">
				      {!! Form::textarea('descripcion',null,[ 'size' => '10x3','placeholder'=>'Descripcion','id'=>'descripcion']) !!}
				    </div>
		    </div>
		  </div>

		</div>
	
	<div class="ui hidden divider"></div>
                              