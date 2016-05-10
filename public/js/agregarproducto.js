$(document).ready(function(){
    
    $('#agregar').click(function(){

      var producto=$('select[name=producto_id]').val();
      var token=$('#token').val();
      var route='http://localhost:8000/ventas/'+producto;
      var route2='http://localhost:8000/ventasDisponible/'+producto;

       
        
      
      $.get(route,function(res){
          // console.log("Respuesta: "+res);
          // console.log('hola');
       
          $.get(route2,function(res2){

          if (res2[0].cantidad<=res[0].minimoinventario) {
              $('.productosVenta').append(
              "<tr class='"+res[0].id+"'><td>"+"<input type='hidden' value='"+res[0].id+"' class='prodHidden'></input>"
              +res[0].nombre+"</td><td class='redDispo'><i class='attention icon'></i><span class='cantidadDispo'>"+res2[0].cantidad+"</span></td><td class='precioventa"+res[0].id+"''>"
              +res[0].precioventa+"</td><td><div class='ui input'><input class='campoCant campoCant"+res[0].id+" "
              +res[0].id+"' type='number' min='1' value='1'></input></div></td><td class='subtotal subtotal"+res[0].id+"'>"
              +res[0].precioventa+"</td><td><i class='large trash outline icon delete "+res[0].id+"'></i></td></tr> ");
          }else{
              $('.productosVenta').append(
              "<tr class='"+res[0].id+"'><td>"+"<input type='hidden' value='"+res[0].id+"' class='prodHidden'></input>"
              +res[0].nombre+"</td><td class='greenDispo'><i class='icon checkmark'></i><span class='cantidadDispo'>"+res2[0].cantidad+"</span></td><td class='precioventa"+res[0].id+"''>"
              +res[0].precioventa+"</td><td><div class='ui input'><input class='campoCant campoCant"+res[0].id+" "
              +res[0].id+"' type='number' min='1' value='1'></input></div></td><td class='subtotal subtotal"+res[0].id+"'>"
              +res[0].precioventa+"</td><td><i class='large trash outline icon delete "+res[0].id+"'></i></td></tr> ");

          }
           });
      
      }); 
    }); 


    

 
    setInterval(function(){

        $('i.delete').click(function(e){
              var clase="."+this.classList[5];
              $( "tr" ).remove( clase );
              // console.log(clase);
        });

        $('input.campoCant').keyup(function(){
          var clase=this.classList[2];
          var clase2='input.campoCant.campoCant'+clase;
          var cantidad=$(clase2).val();
          var valorventa=$('.precioventa'+clase).text();
          $('.subtotal'+clase).text(cantidad*valorventa);
          // console.log("campo: "+clase);
          
        });
       
         $('input.campoCant').click(function(){
            var clase=this.classList[2];
            var clase2='input.campoCant.campoCant'+clase;
            var cantidad=$(clase2).val();
            var valorventa=$('.precioventa'+clase).text();
            $('.subtotal'+clase).text(cantidad*valorventa);
            // console.log("campo: "+clase);
         });

       var sub=0;
    $( ".subtotal" ).each(function( index, element )  {
            // console.log(index);

            // console.log($(this).text());
            var subtotal=$(this).text();
            sub+=parseInt(subtotal);
            $('.total').text(sub);
           //$('.total').text();
    });
    }, 500);
      
});
