@extends('layouts.principal')

@section('content')

<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/credito')!!}" class="section">Creditos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Crear creditos</div>
  </div>

	<h3 class="ui header">Crear credito</h3>
  

    
  @include('alerts.request')

{!! Form::open(['route'=>'credito.store','method'=>'POST']) !!}
    	@include('credito.forms.credito')
      
			{!! Form::submit('Aceptar',['class'=>'ui primary  button']) !!}
{!! Form::close() !!}
	
@stop