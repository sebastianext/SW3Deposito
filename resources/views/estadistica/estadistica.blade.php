@extends('layouts.principal')



@section('content')


<div class="ui two cards">
  <div class="green card">
    <div class="image">
    <div id="container" style="width:100%; height:400px;"></div>
    
    </div>
  </div>
  <div class="green card">
    <div class="image">
    <div id="container2" style="width:100%; height:400px;"></div>
    
    </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}"></script>
 

      <script type="text/javascript">
          $(function () {
              $('#container').highcharts(
                  {!! json_encode($yourFirstChart) !!}
              );

              $('#container2').highcharts(
                  {!! json_encode($clientesGrafica) !!}
              );
          })
      </script>
@stop

