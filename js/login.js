$(document).ready(function() {

    $('body').css('background', '#cee3f6');

    $("#entrarbtn").click(function() {
    
        var funcionAjax = $.ajax({

            url:'validarLogin.php',
            type:'POST',
            data:{usuario: $('#usuario').val(), password: $('#clave').val() , error: 'false',recordar: $('#recordarme').is(':checked')}, 
            async: true,
            beforeSend: function () {
                      
                        $("#respuesta").html("<img src='imagenes/spinner.gif'>"); 
            },
        /*
            success: function (dataRespuesta){
                //dataRespuesta= JSON.stringify(dataRespuesta);
                //console.log(dataRespuesta);
                
                if(dataRespuesta.error){// == 'error'
                    $("#respuesta").html("<b class= 'alert alert-danger'>No se pudo iniciar sesion,verifique los datos!.</b>");                     
                }
                else{    
                    window.location.href= "index.php";
                }   
            }
        */
        });
        funcionAjax.done(function(respuesta){
            //console.log("Respuesta del servidor: "+respuesta);
            var obj = $.parseJSON(respuesta);
            //console.log(obj['perfil']);
            //var perfil = obj['perfil'];
            if (!obj.error) {
                //console.log("EL error es: "+obj.error);
                if (obj.perfil == "admin") {
                        //--------------------------------------
                        sessionStorage.setItem("Usuario", obj.usuario);
                        sessionStorage.setItem("Perfil", obj.perfil);
                        //--------------------------------------
                        if(obj.recordar == "true")
                        {
                            localStorage.setItem("Usuario", obj.usuario);
                            localStorage.setItem("Perfil", obj.perfil);
                            console.log("Recordando!!!");
                        }else
                        {
                            console.log("Olvidando!!!");
                        }
                    window.location.href= "./index.php";
                }else if(obj.perfil == "empleado"){
                        //--------------------------------------
                        sessionStorage.setItem("Usuario", obj.usuario);
                        sessionStorage.setItem("Perfil", obj.perfil);
                        //--------------------------------------
                        if(obj.recordar == "true")
                        {
                            localStorage.setItem("Usuario", obj.usuario);
                            localStorage.setItem("Perfil", obj.perfil);
                            console.log("Recordando!!!");
                        }else
                        {
                            console.log("Olvidando!!!");
                        }
                    window.location.href= "./index.php";
                }
            }else{
                $("#respuesta").html("<b class= 'alert alert-danger'>No se pudo iniciar sesion,verifique los datos!.</b>");
            }
        });
        funcionAjax.fail(function(resp){
            console.log(resp.responseText);
        });
        funcionAjax.always(function(){
            console.log("complete");
        });
    /*
        funcionAjax.done(function(respuesta){
            console.log(respuesta);
            if (!respuesta.error) {
                if (respuesta.perfil == "admin") {
                        localStorage.setItem("Usuario", dataRespuesta.usuario);
                        localStorage.setItem("Perfil", dataRespuesta.perfil);
                        //--------------------------------------
                        sessionStorage.setItem("Usuario", dataRespuesta.usuario);
                        sessionStorage.setItem("Perfil", dataRespuesta.perfil);
                    location.href= "./index.php";
                }else if(respuesta.perfil == "empleado"){
                        localStorage.setItem("Usuario", dataRespuesta.usuario);
                        localStorage.setItem("Perfil", dataRespuesta.perfil);
                        //--------------------------------------
                        sessionStorage.setItem("Usuario", dataRespuesta.usuario);
                        sessionStorage.setItem("Perfil", dataRespuesta.perfil);
                    location.href= "./index.php";
                }
            }else{
                $("#respuesta").html("<b class= 'alert alert-danger'>No se pudo iniciar sesion,verifique los datos!.</b>");
            }
        });
        funcionAjax.fail(function(resp){
            console.log(resp.responseText);
        });
        funcionAjax.always(function(){
            console.log("complete");
        });
    */
    });

        $("#resetbtn").click(function() {
        $('#usuario').val("");
        $('#clave').val("");
        $('#respuesta').empty(); 
        });

        $("#testUsuarioBTN").click(function() {
        $('#usuario').val("empleado1");
        $('#clave').val("1234");
        $('#respuesta').empty(); 
        });

        $("#testAdminBTN").click(function() {
        $('#usuario').val("admin");
        $('#clave').val("1234");
        $('#respuesta').empty(); 
        });

});

