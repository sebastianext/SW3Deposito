@extends('layouts.principal')



@section('content')



  <div class="ui breadcrumb">
    <a  href="{!!URL::to('/inicio')!!}" class="section">Inicio</a>
    <i class="right angle icon divider"></i>
    <div class="active section">creditos</div>
  </div>

  <div class="ui divider"></div>
  <h2 class="ui center aligned icon header">
    <i class="circular cubes icon"></i>
    Creditos
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
        Listado de Creditos
        <a href="{!!URL::to('/credito/create')!!}">
        <div class="ui right floated small addCliente primary labeled icon button">
          <i class="cubes icon"></i>Crear Credito
        </div>
        </a>


        <div class="ui right floated blue floating labeled dropdown icon button">
          <i class="download icon"></i>
          <div >Descargar</div>
          <div class="menu">
           
      
            
            <a href="{!!URL::to('/creditos/pdf')!!}" class="item">
            <div class="item">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAC3UlEQVQ4T32TTUxUVxTHf/e9N18oKFKpCThMCSauDKmYVrGijQsXbnBjSLqtcWPqsjVRQSuFkiamSWPiQqMbm9CmQUO0qGH8iJW0JECKVhz8YBQEZMJzZh7z9eb2MItmphpvcnPfO7n3d/73nP9VFI3zP/+qi////10/O93e8tWhjuK4ypw7rz2PHqPn5mDzx6SuXEG1tED4Fmrrp7h9l8nYNolknL6uHrYEPO2ftLX9B1FLnV3ad+Mm/PMIvvsWlc6g79xGtbbixhZIHDiIrTVTOs8fP/7E4YNfMnp/KLxlx/Zdy0qU8/UR7R+4Dtkc6tQJdNsX0N2Jqqgg+2Cc1909vBLABHkSFy/x4kmEysrVNDU2tje3fNahZr/v0fN/DYPjYEcmcbNp2QppFFlZl0SFbRrY5RVsPHuO2egU6XSa8vIV1Nc37FTFBen/rW+q4oN161eWl+Hz+/HKtOJv0Mog4/XiJJMkZSYSSZTEfD5D0hSN/v6rurY2SFlZAK/Hg8fvwxr4nXx1NflNjYXMjrMkEEcApqyxUsDAwA1dF/qocDgQ8EsGL7nTp1FNTRjN28lksgJwRMEywGBhYaYUMDh4S9fVhbAsUwBlWH4BXL1GXmmsz3ejpZjLCgpXMD3MzjwvBdy9e0+HBGCaJl6fBxWLkQ8PYkpMB+vQNTUFQHzRxpIrTE8/KwUMDf2pg7JRKYUV8KF7ezH2tZIfDONeuADj4+T27sWVQjrfHJOOTJYChodHpIi14g6F8WqG3JkzeI4fRa1aRS6ZImtIW59HMU6eINn9A7GXT0sBY2Pjuqa2hswvvajKNbBnD9nFRbRss8XOfp+fmPhCW15MMctbXXj4cEKvb6gn2SFW378ft2otoyMjzM3PE41Gpb0reL0wT/O2HcQTcdZ9uKZUQSTyVIdCQdLie8eO47ouTyYjjI39TSqVQqQUjGRaFlVV1WzYECwFhMPh9z7ndz31fwHzKUZqBcwMqwAAAABJRU5ErkJggg==">
              <!-- <i class="file excel outline icon"></i> -->
              Pdf
            </div>
            </a>
          </div>
        </div>

      </th>
    </tr>
    <tr>
      <th class="collapsing">Editar</th>
      <th>Cliente</th>
      <th>Valor</th>
      <th>Abono</th>
      <th>Tipo Contratacion</th>
      <th>Descripcion</th>
      <th class="collapsing">Eliminar</th>
    </tr>
  </thead>
  
    <tbody>
    @foreach ($creditos as $credito)
      <tr>
        <td>
          {!! Html::decode(link_to_route('credito.edit', '<i class="large edit icon"></i>',$credito->id, null))!!}
        </td>
        <td>{{ $credito->cliente_id}}</td>
        <td>$ {{ number_format($credito->valor)}}</td>
        <td>$ {{ number_format($credito->abono)}}</td>
        <td>{{ $credito->tipo_contratacion}}</td>
        <td>{{ $credito->descripcion}}</td>
        <td>
          @include('credito.delete')
          <a class="eli {{$credito->id}}"> <i class="large trash outline icon" ></i></a>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  
</table>
@stop

