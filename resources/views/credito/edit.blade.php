@extends('layouts.principal')

@section('content')
<div class="ui breadcrumb">
    <a href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <a href="{!!URL::to('/credito')!!}" class="section">creditos</a>
     <i class="right angle icon divider"></i>
    <div class="active section">Actualizar creditos</div>
  </div>
	<h3 class="ui header">Actualizar credito</h3>
@include('alerts.request')
{!! Form::model($credito,['route'=>['credito.update',$credito->id],'method'=>'PUT'])!!}
        	@include('credito.forms.credito')
			{!! Form::submit('Aceptar',['class'=>'ui primary button']) !!}
{!! Form::close() !!}
	
@stop