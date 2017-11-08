$(document).ready(function() {

//EMPLEADO
 $("#btnverpromedio").click(function() {
        
     $.ajax({

                   url:'partesAdmin/nexoPromedio.php',
                   type:'POST',
                   data:{operacion:"promedioempleado",empleado: $('#empleadoname').val(),mes:$('#selectmes').val()},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

              });     
          
});

//COCHERA
 $("#btnverpromedio2").click(function() {
        
     $.ajax({

                   url:'partesAdmin/nexoPromedio.php',
                   type:'POST',
                   data:{operacion:"promediocochera",cochera: $('#cocheraname').val(),mes:$('#selectmes2').val()},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

              });     
          
});

//PATENTE
 $("#btnverpromedio3").click(function() {
        
     $.ajax({

                   url:'partesAdmin/nexoPromedio.php',
                   type:'POST',
                   data:{operacion:"promediopatente",patente: $('#patentename').val(),mes:$('#selectmes3').val()},
                   async: true,
                   beforeSend: function () {
                             $("#respuesta").html("<center><img src='imagenes/spinner.gif'></center>"); 
                    },
                  success: function (dataRespuesta){
                    
                     $("#respuesta").html(dataRespuesta);
          
                  }

              });     
          
});

});