
$(document).ready(function() {
    MueveReloj();
});

function MueveReloj(){
    /* alert("Llamado de alarma"); */
    var momentoActual = new Date();

    var hora = momentoActual.getHours();
    var minuto = momentoActual.getMinutes();
    var segundo = momentoActual.getSeconds();

    var horaImprimible = hora + ":" + minuto + ":" + segundo;

   
    var month = momentoActual.getMonth()+1;
    var day = momentoActual.getDate();
    var year = momentoActual.getFullYear();
    var fecha = month + '-' + day + '-' + year;

    $("div#HoraReloj").text(horaImprimible);
    $("div#FechaReloj").text(fecha);
    setTimeout("MueveReloj()",1000);

    /* prueba */
    var fechaLocalStore = localStorage.getItem("FehcaInsertada");
        
            if(fechaLocalStore != ""){
                // hora == 13 && minuto >= 0 && minuto <= 1
                if((minuto >= 52 && minuto < 53) || (minuto >= 56 && minuto < 57) || (minuto >= 1 && minuto <2) || (minuto >= 5 && minuto <6) || (minuto >= 10 && minuto < 11) || (minuto >= 15 && minuto < 16) || (minuto >= 21 && minuto < 22) || (minuto >= 27 && minuto < 28) || (minuto >= 31 && minuto < 32)  || (minuto >= 35 && minuto < 36) || (minuto >= 39 && minuto < 40) || (minuto >= 43 && minuto < 44) || (minuto >= 47 && minuto < 48)){
                        if(fecha !=  fechaLocalStore){

                            $.ajax({
                                type: "POST",
                                url: "../modulos/FormulaAutomatica.php",
                                data: "data",
                                success: function (response) {
                                        if(response.trim() == "Actualizo" ){
                                            console.log("Guardo");
                                        }else{
                                            console.log("No Actualizo");
                                            sessionStorage.setItem("FehcaInsertada", fecha);
                                        }
                                }
                            });


                        }
                }

            }else{
                    sessionStorage.setItem("FehcaInsertada", fecha);
            }
    /* fin prueba */



        
    }

