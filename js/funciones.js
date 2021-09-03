 /*** LLAMADO EN HTML  onkeypress="return ValidarSoloNumeros(event);" */
 function ValidarSoloNumeros(e){
        tecla = (document.all) ? e.keyCode : e.which;
         //alert("Entre a la funcion");
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8 || tecla==13){
              // llamamos esta funcion
            return true;
        }

        // Patron de entrada, en este caso solo acepta numeros
        patron =/[0-9]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    }
        
        /*** LLAMADO EN HTML  onkeypress="return ValidarSolOLetras(event);" */
function ValidarSoloLetras(e){
        tecla = (document.all) ? e.keyCode : e.which;
         //alert("Entre a la funcion");
        //Tecla de retroceso para borrar, siempre la permite
        if (tecla==8 || tecla==13 || tecla==32 || tecla==9){
              // llamamos esta funcion
            return true;
        }

        // Patron de entrada, en este caso solo acepta numeros
        patron =/[A-Za-z]/;
        tecla_final = String.fromCharCode(tecla);
        return patron.test(tecla_final);
    } 
function ValidacionCorreos(CorreoVerificar)
{       
        
        valueForm=CorreoVerificar;
        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ( !expr.test(valueForm) )
        {
                return 1;
        }else
        {
                return 0;
        }

        
} 

/*------------------------ Inicio Funcion Validación Cajas de Fecha -------------------------------------*/
function FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaEntrada,FechaSalida)
{
        var Fecha = new Date();
        var Ano = Fecha.getFullYear();
        var Mes = Fecha.getMonth();
        var Dia = Fecha.getDay();
        var Hora = Fecha.getHours()+":00";
        if(Dia<10){
                Dia='0'+Dia;
            } 
            if(Mes<10){
                Mes='0'+Mes;
            } 
        var FechaActual = Ano+"-"+Mes+"-"+Dia+" "+Hora;
       // alert(FechaActual+"  "+FechaEntrada+"  "+FechaSalida);
        if(FechaSalida != "" || FechaEntrada !="")
        {
                if(FechaEntrada>FechaSalida || FechaSalida<FechaEntrada || FechaEntrada<FechaActual)
                {
                        return 1;
                }
                 else
                {
                        return 0;
                }
        }
}
/*------------------------ Fin Funcion Valifación Cajas de Fecha ----------------------------------------*/
/** LimpiarCajas*/ 

function LimpiarCajas()
{
var Contenedor = document.getElementById('Forms');
var Numero = Contenedor.getElementsByTagName('input').length;
var Inputs;
var ContadorErrores;
for(var i=0;i<Numero;i++)
{
document.getElementsByTagName('input')[i].value="";
}

var Contenedor1 = document.getElementById('Forms');
var Numero1 = Contenedor1.getElementsByTagName('textarea').length;
var Inputs1;
var ContadorErrores1;
for(var b=0;b<Numero1;b++){
document.getElementsByTagName('textarea')[b].value="";
}

} 
/** LimpiarCajas */
/**--------------------------------- Registrar Usuarios---------------------------------------------------- */
$(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });

function UsuarioRegistrar()
{
        /*** PRIMERO SE VALIDA TODO Y DEPSUES SE REALIZA LA TRAIDA DE DATOS PARA ENVIARLAS A
         PHP ***/
if(ValidacionCorreos($('#correo').val())==0)
{
        if(ValidacionVaciosUsuario(0)==0)
        {
                
                        var NombreUsuario = $('#nombre').val();
                        var ApellidoUsuario = $('#apellido').val();
                        var RolUsuario = $('#rol').val();
                        var TelefonoUsuario = $('#telefono').val();
                        var CorreoUsuario = $('#correo').val();
                        var ContrasenaUsuario = $('#contrasena').val();
                        var NombreProceso="RegistrarUsuario";
                        var parametros = {
                                        "NombreProceso":NombreProceso,
                                        "NombreUsuario" : NombreUsuario,
                                        "ApellidoUsuario" : ApellidoUsuario,
                                        "RolUsuario" : RolUsuario,
                                        "TelefonoUsuario" : TelefonoUsuario,
                                        "CorreoUsuario" : CorreoUsuario,
                                        "ContrasenaUsuario" : ContrasenaUsuario
                                        };
                        $.ajax({
                                data:  parametros,
                                url:   '../modulos/parametrizacion/funciones.php',
                                type:  'post',
                                beforeSend: function () {
                                        $("#ResultadoRegistro").html("Procesando, espere por favor...");
                                },
                                success:  function (response) {         
                                                                                                   
                                        if(response.trim()=="REGISTRO")
                                        {
                                                swal("¡Bien!", "Se ha registrado el usuario", "success");
                                        }
                                        if(response.trim()=="NOREGISTRO")
                                        {
                                                swal("¡Error!", "Se ha registrado el usuario", "error");
                                        }
                                        if(response.trim()=="ERROR")
                                        {
                                                swal("¡Error!", "Se no se ha registrado, el usuario ya existe, verifique los campos", "error");
                                        }
                                        var url="../modulos/parametrizacion/MostrarUsuarios.php"                        
                                        cargar(url,"TablaRecarga");                                                                                                                                                                                                                                                              
                                }
                        });                               
        }else
        {
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
}else
{
        swal("¡Error!", "¡La dirección de email "+$('#correo').val()+" es incorrecta...     !", "warning");    
}

}
/**--------------------------------- Registrar Usuarios---------------------------------------------------- */


/**--------------------------------- Actualizar Usuarios ---------------------------------------------------- */
function ActualizarDatosUsuario()
{
      if($('#NuevoCorreoUsuario').val()=="")
      {
        ActualizarDatosUsuario1();
      }else{
              if(ValidacionCorreos($('#NuevoCorreoUsuario').val())==0)
              {
                ActualizarDatosUsuario1();
              }else{
                swal("¡Error!", "¡La dirección de email "+$('#NuevoCorreoUsuario').val()+" es incorrecta...     !", "warning");  
              }
        
      }

        function ActualizarDatosUsuario1()
        {        
                        var IdUsuario = $('#IdUsuario').val();
                        var NombreUsuario = $('#NuevoNombreUsuario').val();
                        var ApellidoUsuario = $('#NuevoApellidoUsuario').val();
                        var RolUsuario = $('#NuevoRolUsuario').val();
                        var TelefonoUsuario = $('#NuevoTelefonoUsuario').val();
                        var CorreoUsuario = $('#NuevoCorreoUsuario').val();
                        var ContrasenaUsuario = $('#NuevaContrasenaUsuario').val();
                        var NombreProceso="ActualizarDatosUsuario";
                        var parametros = {"NombreProceso":NombreProceso,"IdUsuario":IdUsuario,"NombreUsuario" : NombreUsuario,"ApellidoUsuario" : ApellidoUsuario,"RolUsuario" : RolUsuario,"TelefonoUsuario" : TelefonoUsuario,"CorreoUsuario" : CorreoUsuario,"ContrasenaUsuario" : ContrasenaUsuario};
                        $.ajax({
                                data:  parametros,
                                url:   '../modulos/parametrizacion/funciones.php',
                                type:  'post',
                                beforeSend: function () {
                                       // $("#ResultadoActualizarDatos").html("Procesando, espere por favor...");
                                },
                                success:  function (response) {
                                                                             
                                        if(response.trim()=="ACTUALIZO")
                                        {
                                                swal("¡Bien!", "Se ha actualizado el usuario", "success");
                                        }
                                        if(response.trim()=="NOACTUALIZO")
                                        {
                                                swal("¡Error!", "No se ha actualizado el usuario", "error");
                                        }
                                        if(response.trim()=="ERROR")
                                        {
                                                swal("¡Error!", "El usuario ya existe verifique los campos", "warning");
                                        }
                                        var url="../modulos/parametrizacion/MostrarUsuarios.php"                        
                                        cargar(url,"TablaRecarga");
                                }
                        });     

        }      
                         

}
/**--------------------------------- Actualizar Usuarios ---------------------------------------------------- */

       
/**--------------------------------- Traer Usuarios ---------------------------------------------------- */     
function ActualizarUsuarios(UsuarioActualizar)
{       
        var IdUsuario=UsuarioActualizar;
        var NombreProceso="TraerUsuario";
        var parametros = {"NombreProceso" : NombreProceso,"IdUsuario":IdUsuario};
        $.ajax({
                data:  parametros,
                url:   '../modulos/parametrizacion/funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                        var datos = JSON.parse(response);
                        
                        document.getElementById("IdUsuario").value = datos[0].IdUsuario;
                        document.getElementById("NuevoNombreUsuario").value = datos[0].NombreUsuario;
                        document.getElementById("NuevoApellidoUsuario").value = datos[0].ApellidoUsuario;                
                        document.getElementById("NuevoTelefonoUsuario").value = datos[0].TelefonoUsuario;
                        document.getElementById("NuevoRolUsuario").value=datos[0].RolUsuario;                       
                       
                }
        });
}
/**--------------------------------- Traer Usuarios ---------------------------------------------------- */




/**--------------------------------- Registrar Tipo Producto ---------------------------------------------------- */

function RegistrarTipoProductos()
{
        if(ValidarVacios(0)>0)
        {
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }else{
        var TipoProductoNombre = $('#TipoProductoNombre').val();
        var TipoProductosObservaciones = $('#TipoProductosObservaciones').val();
        var TipoProductosImpuesto = $('#TipoProductosImpuesto').val();
        var TipoProductosCentroContable = $('#TipoProductosCentroContable').val();
        var TipoProductosCuentaContable = $('#TipoProductosCuentaContable').val();
        var TipoProductosConceptoContable = $('#TipoProductosConceptoContable').val();
        var NombreProceso="RegistrarTipoProductos";
        var parametros = {
                        "NombreProceso":NombreProceso,
                        "TipoProductoNombre" : TipoProductoNombre,
                        "TipoProductosObservaciones" : TipoProductosObservaciones,
                        "TipoProductosImpuesto" : TipoProductosImpuesto,
                        "TipoProductosCentroContable" : TipoProductosCentroContable,
                        "TipoProductosCuentaContable" : TipoProductosCuentaContable,
                        "TipoProductosConceptoContable" : TipoProductosConceptoContable
                        };
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',
                beforeSend: function () {                        
                },
                success:  function (response) {                              
                        if(response.trim()=="REGISTRO")
                        {
                                swal("¡Bien!", "La clasificacion se registrado correctamente", "success");
                        }
                        if(response.trim()=="NOREGISTRO")
                        {
                                swal("¡Error!", "La clasificacion no se registrado correctamente", "error");
                        }
                        if(response.trim()=="ERROR")
                        {
                                swal("¡Error!", "La clasificacion ya existe verifique los campos", "warning");
                        }
                        var url="../modulos/inventario/MostrarTipoProductos.php"                        
                        cargar(url,"TablaRecarga");                     
                }
        });
        }
        
}
/**--------------------------------- Registrar Tipo Producto ---------------------------------------------------- */

/**--------------------------------- Eliminar Tipo Producto ---------------------------------------------------- */
function EliminarTipoProductos(IdTipoProducto)
{
        var IdTipoProducto=IdTipoProducto;
        var NombreProceso="EliminarTipoProductos";
        var parametros = {"NombreProceso" : NombreProceso,"IdTipoProducto":IdTipoProducto};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) 
                {   
                        if(response.trim()=="ELIMINO")
                        {
                                swal("¡Bien!", "Se ha eliminado el tipo de producto", "success");
                        }
                        if(response.trim()=="NOELIMINO")
                        {
                                swal("¡Error!", "No se ha eliminado el tipo de producto ", "error");
                        }            
                        if(response.trim()=="HAY")
                        {
                                swal("¡Error!", "No se ha actualizado el tipo de producto EXISTEN PRODUCTOS CON ESTA CLASIFICACIÓN", "warning");
                        }              
                        var url="../modulos/inventario/MostrarTipoProductos.php";                        
                        cargar(url,"TablaRecarga");
                }
                
        });
}
/**--------------------------------- Eliminar Tipo Producto ---------------------------------------------------- */

/**--------------------------------- Traer Tipo Producto ---------------------------------------------------- */
function TraerTipoProductos(ActualizarTipoProductos)
{       
        var IdTipoProducto=ActualizarTipoProductos;
        var NombreProceso="TraerTipoProductos";
        var parametros = {"NombreProceso" : NombreProceso,"IdTipoProducto":IdTipoProducto};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                        var datos = JSON.parse(response);
                        console.log(datos);
                        document.getElementById("NuevoTipoProductoId").value = datos[0].IdProductoTipo;
                        document.getElementById("NuevoTipoProductoNombre").value = datos[0].NombreProductoTipo;
                        document.getElementById("NuevoTipoProductosObservaciones").value = datos[0].ObservacionesProductoTipo;                
                        document.getElementById("NuevoTipoProductosImpuesto").value = datos[0].ImpuestoProductoTipo;
                        document.getElementById("NuevoTipoProductosCentroContable").value=datos[0].CentroContableProductoTipo;
                        document.getElementById("NuevoTipoProductosCuentaContable").value=datos[0].CuentaContableProductoTipo;       
                        document.getElementById("NuevoTipoProductosConceptoContable").value=datos[0].ConceptoContableProductoTipo;       

                }
        });
}
/**--------------------------------- Traer Tipo Producto ---------------------------------------------------- */

/**--------------------------------- Actualizar Tipo Producto ---------------------------------------------------- */
function ActualizarDatosTipoProductos()
{    
                        var NuevoTipoProductoId=$("#NuevoTipoProductoId").val();
                        var NuevoTipoProductoNombre=$("#NuevoTipoProductoNombre").val();
                        var NuevoTipoProductosObservaciones=$("#NuevoTipoProductosObservaciones").val();           
                        var NuevoTipoProductosImpuesto=$("#NuevoTipoProductosImpuesto").val();
                        var NuevoTipoProductosCentroContable=$("#NuevoTipoProductosCentroContable").val();                        
                        var NuevoTipoProductosCuentaContable=$("#NuevoTipoProductosCuentaContable").val();
                        var NuevoTipoProductosConceptoContable=$("#NuevoTipoProductosConceptoContable").val();
                        var NombreProceso="ActualizarDatosProductoTipos";
                        var parametros = {"NombreProceso":NombreProceso,"NuevoTipoProductoId":NuevoTipoProductoId,"NuevoTipoProductoNombre" : NuevoTipoProductoNombre,"NuevoTipoProductosObservaciones" : NuevoTipoProductosObservaciones,"NuevoTipoProductosImpuesto" : NuevoTipoProductosImpuesto,"NuevoTipoProductosCentroContable" : NuevoTipoProductosCentroContable,"NuevoTipoProductosCuentaContable" : NuevoTipoProductosCuentaContable,"NuevoTipoProductosConceptoContable" : NuevoTipoProductosConceptoContable};
                        $.ajax({
                                data:  parametros,
                                url:   '../modulos/inventario/funciones.php',
                                type:  'post',
                                beforeSend: function () {
                                        
                                },
                                success:  function (response) {
                                
                                        if(response.trim()=="ACTUALIZO")
                                        {
                                                swal("¡Bien!", "Se ha actualizado el tipo de producto", "success");
                                        }
                                        if(response.trim()=="NOACTUALIZO")
                                        {
                                                swal("¡Error!", "No se ha actualizado el tipo de producto ", "error");
                                        }
                                        var url="../modulos/inventario/MostrarTipoProductos.php"                        
                                        cargar(url,"TablaRecarga");
                                       
                                
                                }
                        });                
              
}
/**--------------------------------- Actualizar Tipo Producto ---------------------------------------------------- */


/**--------------------------------- Registrar Producto ---------------------------------------------------- */
function RegistrarProductos()
{
        if(ValidarVaciosProductos(0)>0)
        {
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }else
        {
        var ProductoNombre = $('#ProductoNombre').val();
        var ProductoMarca = $('#ProductoMarca').val();
        var ProductoValor = $('#ProductoValor').val();
        var ProductoObservaciones = $('#ProductoObservaciones').val();
        var ProductoDescripcion = $('#ProductoDescripcion').val();
        var ProductoIdTipoProducto = $('#ProductoIdTipoProducto').val();
        var ProductoIdProveedores = $('#ProductoIdProveedores').val();
        var ProductoCantidad = $('#ProductoCantidad').val();
        var ProductoMedida = $('#ProductoMedida').val();
        var NombreProceso="RegistrarProductos";
        var parametros = {
                        "NombreProceso":NombreProceso,
                        "ProductoObservaciones":ProductoObservaciones,
                        "ProductoNombre" : ProductoNombre,
                        "ProductoMarca" : ProductoMarca,
                        "ProductoValor" : ProductoValor,
                        "ProductoDescripcion":ProductoDescripcion,
                        "ProductoIdTipoProducto" : ProductoIdTipoProducto,
                        "ProductoIdProveedores" : ProductoIdProveedores,
                        "ProductoCantidad" : ProductoCantidad,
                        "ProductoMedida":ProductoMedida
                        };
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',
                beforeSend: function () {
                       
                },
                success:  function (response) 
                {                              
                        console.log("aqui");
                        if(response.trim()=="REGISTRO")
                        {
                                swal("¡Bien!", "El producto se registrado correctamente", "success");
                        }
                        if(response.trim()=="NOREGISTRO")
                        {
                                swal("¡Error!", "El producto no se registrado correctamente", "error");
                        }
                        if(response.trim()=="ERROR")
                        {
                                swal("¡Error!", "El producto ya existe verifique los campos", "warning");
                        }   
                        var url="../modulos/inventario/MostrarProductos.php";                        
                        cargar(url,"TablaRecarga1");
                        
                }
        });
        }  
}
/**--------------------------------- Registrar Producto ---------------------------------------------------- */


/**--------------------------------- Traer Producto ---------------------------------------------------- */

function TraerProductos(ActualizarProductos)
{       
        var IdProducto=ActualizarProductos;
        var NombreProceso="TraerProductos";
        var parametros = {"NombreProceso" : NombreProceso,"IdProducto":IdProducto};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                        var datos = JSON.parse(response);                     
                        document.getElementById("ProductoId").value = datos[0].IdProductos;
                        document.getElementById("NuevoProductoNombre").value = datos[0].NombreProductos;
                        document.getElementById("NuevoProductoMarca").value = datos[0].MarcaProductos;                
                        document.getElementById("NuevoProductoValor").value = datos[0].ValorProductos;
                        document.getElementById("NuevoProductoObservaciones").value=datos[0].ObservacionesProductos;
                        document.getElementById("NuevoProductoDescripcion").value=datos[0].DescripcionProductos;
                        document.getElementById("NuevoProductoIdTipoProducto").value=datos[0].IdProductoTipo;       
                        document.getElementById("NuevoProductoIdProveedores").value=datos[0].IdProveedores;       
                        document.getElementById("NuevoProductoCantidad").value=datos[0].CantidadProductos;       
                        document.getElementById("NuevoProductoMedida").value=datos[0].MedidaProductos;       

                }
        });
}
/**--------------------------------- Traer Producto ---------------------------------------------------- */

/**--------------------------------- Actualizar Producto ---------------------------------------------------- */

function ActualizarDatosProductos()
{
        if(ValidarVaciosActualizarProductos()==0)
        {
                var ProductoId = $('#ProductoId').val();
                var NuevoProductoNombre = $('#NuevoProductoNombre').val();        
                var NuevoProductoMarca = $('#NuevoProductoMarca').val();
                var NuevoProductoValor = $('#NuevoProductoValor').val();
                var NuevoProductoObservaciones = $('#NuevoProductoObservaciones').val();
                var NuevoProductoDescripcion= $('#NuevoProductoDescripcion').val();
                var NuevoProductoIdTipoProducto = $('#NuevoProductoIdTipoProducto').val();
                var NuevoProductoIdProveedores = $('#NuevoProductoIdProveedores').val();
                var NuevoProductoCantidad = $('#NuevoProductoCantidad').val();
                var NuevoProductoMedida = $('#NuevoProductoMedida').val();
                var NombreProceso="ActualizarDatosProductos";
                var parametros = {
                                "ProductoId":ProductoId,
                                "NombreProceso":NombreProceso,
                                "NuevoProductoObservaciones":NuevoProductoObservaciones,
                                "NuevoProductoDescripcion":NuevoProductoDescripcion,
                                "NuevoProductoNombre" : NuevoProductoNombre,
                                "NuevoProductoMarca" : NuevoProductoMarca,
                                "NuevoProductoValor" : NuevoProductoValor,
                                "NuevoProductoIdTipoProducto" : NuevoProductoIdTipoProducto,
                                "NuevoProductoIdProveedores" : NuevoProductoIdProveedores,
                                "NuevoProductoCantidad" : NuevoProductoCantidad,
                                "NuevoProductoMedida":NuevoProductoMedida
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/inventario/Funciones.php',
                        type:  'post',
                        beforeSend: function () {
                              
                        },
                        success:  function (response) {                              
                                if(response.trim()=="ACTUALIZO")
                                {
                                        swal("¡Bien!", "Se ha actualizado el producto", "success");
                                }
                                if(response.trim()=="NOACTUALIZO")
                                {
                                        swal("¡Error!", "No se ha actualizado el producto", "error");
                                }
                                var url="../modulos/inventario/MostrarProductos.php";
                                cargar(url,"TablaRecarga1");                                
                                                                
                        }
                });
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        } 
}
/**--------------------------------- Actualizar Producto ---------------------------------------------------- */


/**--------------------------------- Registrar Bienes ---------------------------------------------------- */
function RegistrarBienes()
{
       if(ValidacionVaciosBienes(0)==1)
       {
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
       }else{
                var BienesNombre = $('#BienesNombre').val();
                var BienesValor = $('#BienesValor').val();
                var BienesIdTipoBienes = $('#BienesIdTipoBienes').val();
                var BienesObservaciones = $('#BienesObservaciones').val();
                var BienesEstado = $('#BienesEstado').val();
                var NombreProceso="RegistrarBienes";
                var parametros = {
                                "NombreProceso":NombreProceso,
                                "BienesObservaciones":BienesObservaciones,
                                "BienesNombre" : BienesNombre,                       
                                "BienesIdTipoBienes" : BienesIdTipoBienes,                        
                                "BienesValor" : BienesValor,                        
                                "BienesEstado" : BienesEstado,                        
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/inventario/Funciones.php',
                        type:  'post',
                        beforeSend: function () {
                          
                        },
                        success:  function (response) {  
                                if(response.trim()=="REGISTRO")
                                {
                                        swal("¡Bien!", "El activo se registrado correctamente", "success");
                                }
                                if(response.trim()=="NOREGISTRO")
                                {
                                        swal("¡Error!", "El activo no se registrado correctamente", "error");
                                }
                                if(response.trim()=="ERROR")
                                {
                                        swal("¡Error!", "El activo ya existe verifique los campos", "warning");
                                } 
                                var url="../modulos/inventario/MostrarBienes.php";                        
                                cargar(url,"TablaRecarga1");                                                                                                                              
                        }
                });        
        }
}
/**--------------------------------- Registrar Bienes ---------------------------------------------------- */


/**--------------------------------- traer Bienes ---------------------------------------------------- */
function TraerBienes(IdBienes)
{
        var IdBienes=IdBienes;
        var NombreProceso="TraerBienes";
        var parametros = {"NombreProceso" : NombreProceso,"IdBienes":IdBienes};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {
                        var datos = JSON.parse(response);
                        //console.log(datos);
                        document.getElementById("BienesId").value = datos[0].IdBienes;
                        document.getElementById("NuevoBienesNombre").value = datos[0].NombreBienes;
                        document.getElementById("NuevoBienesValor").value = datos[0].ValorBienes;                
                        document.getElementById("NuevoBienesEstado").value = datos[0].EstadoBienes;
                        document.getElementById("NuevoBienesIdTipoBienes").value=datos[0].IdTipoBienes;
                        document.getElementById("NuevoBienesObservaciones").value=datos[0].ObservacionBienes;                                   
                }
        });
}
/**--------------------------------- traer Bienes ---------------------------------------------------- */

/**--------------------------------- Actualizar Bienes ---------------------------------------------------- */
function ActualizarBienes()
{
        if(ValidarVaciosActalizarBienes(0)==0)
        {
                var BienesId = $('#BienesId').val();
                var NuevoBienesNombre = $('#NuevoBienesNombre').val();                
                var NuevoBienesValor = $('#NuevoBienesValor').val();
                var NuevoBienesIdTipoBienes = $('#NuevoBienesIdTipoBienes').val();
                var NuevoBienesObservaciones = $('#NuevoBienesObservaciones').val();
                var NuevoBienesEstado = $('#NuevoBienesEstado').val();
                var NombreProceso="ActualizarBienes";
                var parametros = {
                                "NombreProceso":NombreProceso,
                                "BienesId":BienesId,
                                "NuevoBienesObservaciones":NuevoBienesObservaciones,
                                "NuevoBienesNombre" : NuevoBienesNombre,                       
                                "NuevoBienesIdTipoBienes" : NuevoBienesIdTipoBienes,                        
                                "NuevoBienesValor" : NuevoBienesValor,                        
                                "NuevoBienesEstado" : NuevoBienesEstado,                        
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/inventario/Funciones.php',
                        type:  'post',
                        success:  function (response) {                              
                                if(response.trim()=="ACTUALIZO")
                                {
                                        swal("¡Bien!", "Se ha actualizado el Activo", "success");
                                }
                                if(response.trim()=="NOACTUALIZO")
                                {
                                        swal("¡Error!", "No se ha actualizado el Activo", "error");
                                }   
                                var url="../modulos/inventario/MostrarBienes.php";
                                cargar(url,"TablaRecarga1");                                                                                             
                        }
                });   
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
               
} 
/**--------------------------------- Actualizar Bienes ---------------------------------------------------- */


/**--------------------------------- Registrar tipo Bienes ---------------------------------------------------- */
function RegistrarTipoBienes()
{
        var TipoBienesNombre= $('#TipoBienesNombre').val();       
        if(TipoBienesNombre=="")
        {
                $("#TipoBienesResultadoRegistro").html("Diligencie los campos correctamente");
        }else{
        var NombreProceso="RegistrarTipoBienes";
        var parametros = {
                        "NombreProceso":NombreProceso,                                                
                        "TipoBienesNombre" : TipoBienesNombre,                                                 
                        };
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',
                beforeSend: function () {
                        
                },
                success:  function (response) {                              
                        if(response.trim()=="REGISTRO")
                        {
                                swal("¡Bien!", "La clasificación se registrado correctamente", "success");
                        }
                        if(response.trim()=="NOREGISTRO")
                        {
                                swal("¡Error!", "La clasificación no se registrado correctamente", "error");
                        }
                        if(response.trim()=="ERROR")
                        {
                                swal("¡Error!", "La clasificación ya existe verifique los campos", "warning");
                        }   
                        var url="../modulos/inventario/MostrarTipoBienes.php";                      
                        cargar(url,"TablaRecarga");
                        
                        
                }
        });
        }
}
/**--------------------------------- Registrar tipo Bienes ---------------------------------------------------- */

/**--------------------------------- Eliminar tipo Bienes ---------------------------------------------------- */
function EliminarTipoBienes(IdTipoBienes)
{
        var IdTipoBienes=IdTipoBienes;
        var NombreProceso="EliminarTipoBienes";
        var parametros = {"NombreProceso" : NombreProceso,"IdTipoBienes":IdTipoBienes};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) 
                {   
                        $("#TipoBienesResultadoEliminar").html(response);
                        var url="../modulos/inventario/MostrarTipoBienes.php";                      
                        cargar(url,"TablaRecarga");
                }
                
        });
}
/**--------------------------------- Eliminar tipo Bienes ---------------------------------------------------- */

/**--------------------------------- Actualizar tipo Bienes ---------------------------------------------------- */
function ActualizarTipoBienes()
{
        var TipoBienesId=$('#TipoBienesId').val(); 
        var NuevoTipoBienesNombre=$('#NuevoTipoBienesNombre').val();
        if (TipoBienesId=="" || NuevoTipoBienesNombre=="" ) {
                $("#TipoBienesResultadoActualizacion").html("Diligencie los campos correctamente");
        }else
        {       
                
                var NombreProceso="ActualizarTipoBienes";
                var parametros = {
                                "TipoBienesId":TipoBienesId, 
                                "NombreProceso":NombreProceso,                                                
                                "NuevoTipoBienesNombre" : NuevoTipoBienesNombre,                                                
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/inventario/Funciones.php',
                        type:  'post',
                        beforeSend: function () {
                                
                        },
                        success:  function (response) {                              
                                if(response.trim()=="ACTUALIZO")
                                {
                                        swal("¡Bien!", "Se ha actualizado el Tipo de activo", "success");
                                }
                                if(response.trim()=="NOACTUALIZO")
                                {
                                        swal("¡Error!", "No se ha actualizado el Tipo de activo", "error");
                                }
                                if(response.trim()=="ERROR")
                                {
                                        swal("¡Error!", "El Tipo de activo ya existe verifique los campos", "warning");
                                }       
                                var url="../modulos/inventario/MostrarTipoBienes.php";                       
                                cargar(url,"TablaRecarga");                                                         
                        }
                });
        }
}
/**--------------------------------- Actualizar tipo Bienes ---------------------------------------------------- */


/**--------------------------------- Traer Bienes ---------------------------------------------------- */
function TraerTipoBienes(ActualizarTipoBienes)
{       
        var IdTipoBienes=ActualizarTipoBienes;
        var NombreProceso="TraerTipoBienes";
        var parametros = {"NombreProceso" : NombreProceso,"IdTipoBienes":IdTipoBienes};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/funciones.php',
                type:  'post',                
                success:  function (response) {               
                        var datos = JSON.parse(response);
                        document.getElementById("TipoBienesId").value = datos[0].IdTipoBienes;
                        document.getElementById("NuevoTipoBienesNombre").value = datos[0].NombreTipoBienes;
                          
        
                }
        });
}
                   

/**--------------------------------- Traer Bienes ---------------------------------------------------- */



/**--------------------------------- Registrar Proveedores ---------------------------------------------------- */
function RegistrarProveedores()
{
        var ProveedoresNombre = $('#ProveedoresNombre').val();
        var ProveedoresNit = $('#ProveedoresNit').val();
        var ProveedoresTelefono = $('#ProveedoresTelefono').val();
        var ProveedoresDireccion = $('#ProveedoresDireccion').val();
        var ProveedoresCorreo = $('#ProveedoresCorreo').val();
        var ProveedoresCelular = $('#ProveedoresCelular').val();
        var NombreProceso="RegistrarProveedores";
        var parametros = {
                        "NombreProceso":NombreProceso,
                        "ProveedoresNit" : ProveedoresNit, 
                        "ProveedoresCorreo":ProveedoresCorreo,
                        "ProveedoresNombre" : ProveedoresNombre,                       
                        "ProveedoresDireccion" : ProveedoresDireccion,                        
                        "ProveedoresTelefono" : ProveedoresTelefono,                        
                        "ProveedoresCelular" : ProveedoresCelular,                        
                        };
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',
                beforeSend: function () {
                },
                success:  function (response) {                              
                        if(response.trim()=="REGISTRO")
                        {
                                swal("¡Bien!", "La clasificación se registrado correctamente", "success");
                        }
                        if(response.trim()=="NOREGISTRO")
                        {
                                swal("¡Error!", "La clasificación no se registrado correctamente", "error");
                        }
                        if(response.trim()=="ERROR")
                        {
                                swal("¡Error!", "La clasificación ya existe verifique los campos", "warning");
                        }   
                        var url="../modulos/inventario/MostrarProveedores.php";                       
                        cargar(url,"TablaRecarga");
                        
                        
                }
        }); 

}
/**--------------------------------- Registrar Proveedores ---------------------------------------------------- */

/**--------------------------------- Traer Proveedores ---------------------------------------------------- */

function TraerProveedores(IdProveedores) 
{
        var IdProveedores=IdProveedores;
        var NombreProceso="TraerProveedores";
        var parametros = {"NombreProceso" : NombreProceso,"IdProveedores":IdProveedores};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',                
                success:  function (response) {               
                        var datos = JSON.parse(response);
                        document.getElementById("ProveedoresId").value = datos[0].IdProveedores;
                        document.getElementById("NuevoProveedoresNit").value = datos[0].NitProveedores;
                        document.getElementById("NuevoProveedoresNombre").value = datos[0].NombreProveedores;
                        document.getElementById("NuevoProveedoresTelefono").value = datos[0].TelefonoProveedores;
                        document.getElementById("NuevoProveedoresDireccion").value = datos[0].DireccionProveedores;
                        document.getElementById("NuevoProveedoresCorreo").value = datos[0].CorreoProveedores;
                        document.getElementById("NuevoProveedoresCelular").value = datos[0].CelularProveedores;
                          
        
                }
        });
}
/**--------------------------------- Traer Proveedores ---------------------------------------------------- */

/**--------------------------------- * Actualizar Proveedores ---------------------------------------------------- */

function ActualizarProveedores()
{
        var ProveedoresId=$('#ProveedoresId').val(); 
        var NuevoProveedoresNit=$('#NuevoProveedoresNit').val();
        var NuevoProveedoresNombre=$('#NuevoProveedoresNombre').val();
        var NuevoProveedoresTelefono=$('#NuevoProveedoresTelefono').val();
        var NuevoProveedoresDireccion=$('#NuevoProveedoresDireccion').val();
        var NuevoProveedoresCorreo=$('#NuevoProveedoresCorreo').val();
        var NuevoProveedoresCelular=$('#NuevoProveedoresCelular').val();
             
                
                var NombreProceso="ActualizarProveedores";
                var parametros = {
                                "ProveedoresId":ProveedoresId,
                                "NuevoProveedoresNit" : NuevoProveedoresNit, 
                                "NuevoProveedoresNombre":NuevoProveedoresNombre, 
                                "NuevoProveedoresTelefono":NuevoProveedoresTelefono, 
                                "NuevoProveedoresDireccion":NuevoProveedoresDireccion, 
                                "NuevoProveedoresCorreo":NuevoProveedoresCorreo, 
                                "NuevoProveedoresCelular":NuevoProveedoresCelular, 
                                "NombreProceso":NombreProceso,                                                                                                                               
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/inventario/Funciones.php',
                        type:  'post',
                        beforeSend: function () {
                                
                        },
                        success:  function (response) {                              
                                if(response.trim()=="ACTUALIZO")
                                {
                                        swal("¡Bien!", "Se ha actualizado el proveedor", "success");
                                }
                                if(response.trim()=="NOACTUALIZO")
                                {
                                        swal("¡Error!", "No se ha actualizado el proveedor", "error");
                                }
                                if(response.trim()=="ERROR")
                                {
                                        swal("¡Error!", "El proveedor ya existe verifique los campos", "warning");
                                } 
                                var url="../modulos/inventario/MostrarProveedores.php";                       
                                cargar(url,"TablaRecarga");                                                               
                        }
                });
        
}

/**--------------------------------- * Actualizar Proveedores ---------------------------------------------------- */


/**--------------------------------- Registrar Servicios ---------------------------------------------------- */

function RegistrarServicios()
{

        var ServiciosNombre = $('#ServiciosNombre').val();                        
        var ServiciosImpuesto = $('#ServiciosImpuesto').val();
        var ServiciosValor = $('#ServiciosValor').val();
        var ServiciosObservaciones = $('#ServiciosObservaciones').val();
        var ServiciosDescripcion = $('#ServiciosDescripcion').val();
        var NombreProceso="RegistrarServicios";
        var IdTipoServicio=$('#ServcioTipoServicio').val();
        var parametros = {
                        "NombreProceso":NombreProceso,                        
                        "ServiciosNombre" : ServiciosNombre,                       
                        "ServiciosValor":ServiciosValor,                                             
                        "ServiciosImpuesto":ServiciosImpuesto,  
                        "ServcioTipoServicio":IdTipoServicio,                                        
                        "ServiciosObservaciones" : ServiciosObservaciones,                        
                        "ServiciosDescripcion" : ServiciosDescripcion,                        
                        };
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',
                beforeSend: function () 
                {
                },
                success:  function (response) {
                        console.log(response);                         
                        if(response.trim()=="REGISTRO")
                        {
                                swal("¡Bien!", "El servicio se registrado correctamente", "success");
                        }
                        if(response.trim()=="NOREGISTRO")
                        {
                                swal("¡Error!", "El servicio no se registrado correctamente", "error");
                        }
                        if(response.trim()=="ERROR")
                        {
                                swal("¡Error!", "El servicio ya existe verifique los campos", "warning");
                        }
                        var url="../modulos/inventario/MostrarServicios.php";                                          
                        cargar(url,"TablaRecarga");                           
                        
                }
        });

}
/**--------------------------------- Registrar Servicios ---------------------------------------------------- */

/**--------------------------------- Traer Servicios ---------------------------------------------------- */

function TraerServicios(IdServicios) 
{
        var IdServicios=IdServicios;
        var NombreProceso="TraerServicios";
        var parametros = {"NombreProceso" : NombreProceso,"IdServicios":IdServicios};
        $.ajax({
                data:  parametros,
                url:   '../modulos/inventario/Funciones.php',
                type:  'post',                
                success:  function (response) {               
                        var datos = JSON.parse(response);
                        document.getElementById("ServiciosId").value = datos[0].IdServicios;                        
                        document.getElementById("NuevoServiciosNombre").value = datos[0].NombreServicios;
                        document.getElementById("NuevoServiciosImpuesto").value = datos[0].ImpuestoServicios;
                        document.getElementById("NuevoServiciosValor").value = datos[0].ValorServicios;
                        document.getElementById("NuevoServiciosObservaciones").value = datos[0].ObservacionesServicios;
                        document.getElementById("NuevoServiciosDescripcion").value = datos[0].DescripcionServicios;
                        document.getElementById("ServiciosNuevoTipoServicio").value = datos[0].IdServicioTipo;        
                }
        });
}
/**--------------------------------- Traer Servicios ---------------------------------------------------- */

/**--------------------------------- Actualizar Servicios ---------------------------------------------------- */

function ActualizarServicios() 
{
        var ServiciosId=$('#ServiciosId').val(); 
        var NuevoServiciosImpuesto=$('#NuevoServiciosImpuesto').val();
        var NuevoServiciosNombre=$('#NuevoServiciosNombre').val();
        var NuevoServiciosValor=$('#NuevoServiciosValor').val();
        var NuevoServiciosObservaciones=$('#NuevoServiciosObservaciones').val();
        var NuevoServiciosDescripcion=$('#NuevoServiciosDescripcion').val();        
             
                
                var NombreProceso="ActualizarServicios";
                var parametros = {
                                "ServiciosId":ServiciosId,
                                "NuevoServiciosImpuesto" : NuevoServiciosImpuesto, 
                                "NuevoServiciosNombre":NuevoServiciosNombre, 
                                "NuevoServiciosValor":NuevoServiciosValor, 
                                "NuevoServiciosObservaciones":NuevoServiciosObservaciones, 
                                "NuevoServiciosDescripcion":NuevoServiciosDescripcion,                                 
                                "NombreProceso":NombreProceso,                                                                                                                               
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/inventario/Funciones.php',
                        type:  'post',
                        beforeSend: function () {
                                
                        },
                        success:  function (response) {                              
                                if(response.trim()=="ACTUALIZO")
                                {
                                        swal("¡Bien!", "Se ha actualizado el servicio", "success");
                                }
                                if(response.trim()=="NOACTUALIZO")
                                {
                                        swal("¡Error!", "No se ha actualizado el servicio", "error");
                                }
                                if(response.trim()=="ERROR")
                                {
                                        swal("¡Error!", "El servicio ya existe verifique los campos", "warning");
                                }   
                                var url="../modulos/inventario/MostrarServicios.php";
                                cargar(url,"TablaRecarga");                                                             
                        }
                });
}
/**--------------------------------- Actualizar Servicios ---------------------------------------------------- */



/**--------------------------------- Registrar Parametrizacion hotel ---------------------------------------------------- */
function RegistrarParametrizacionhotel()
{
        if(ValidacionVaciosRegistroParametrolHotel(0)==0)
        {
                var ParametrosHoraCheckIn=$('#ParametrosHoraCheckIn').val(); 
                var ParametrosHoraCheckOut=$('#ParametrosHoraCheckOut').val();
                var ParametrosLimiteEdad=$('#ParametrosLimiteEdad').val();        
                var ParametrosPorcentajePenalizacion=$('#ParametrosPorcentajePenalizacion').val();
                var ParametrosFechaVencimientoFactura=$('#ParametrosFechaVencimientoFactura').val(); 
                var ParametrosValorSeguro=$('#ParametrosValorSeguro').val(); 
                var NombreProceso="RegistrarParametrizacionhotel";

                var parametros = {
                                "ParametrosHoraCheckIn":ParametrosHoraCheckIn,
                                "ParametrosHoraCheckOut" : ParametrosHoraCheckOut, 
                                "ParametrosLimiteEdad":ParametrosLimiteEdad,                         
                                "ParametrosPorcentajePenalizacion":ParametrosPorcentajePenalizacion, 
                                "ParametrosFechaVencimientoFactura":ParametrosFechaVencimientoFactura,
                                "ParametrosValorSeguro":ParametrosValorSeguro,                                 
                                "NombreProceso":NombreProceso,                                                                                                                               
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/parametrizacion/funciones.php',
                        type:  'post',
                        beforeSend: function () 
                        {
                        },
                        success:  function (response) {
                        // console.log(response);                         
                                if(response.trim()=="REGISTRO")
                                {
                                        swal("Bien!", "Los Parametros se han  registrado correctamente", "success");
                                }
                                if(response.trim()=="NOREGISTRO")
                                {
                                        swal("Error!", "Los Parametros no se han registrado correctamente", "error");
                                }
                                if(response.trim()=="ERROR")
                                {
                                        swal("Error!", "Los Parametros ya existen", "warning");
                                }                        
                                
                        }
                });
        }else{
                swal("Error!", "Diligencie correctamente los campos!", "warning");
        }
}


/**--------------------------------- Registrar Parametrizacion hotel ---------------------------------------------------- */


/**--------------------------------- Registrar Parametrizacion hotel ---------------------------------------------------- */
function TraerParametrosHotel(){

        var NombreProceso="TraerParametrosHotel";
        var parametros = {"NombreProceso" : NombreProceso};
        $.ajax({
                data:  parametros,
                url:   '../modulos/parametrizacion/funciones.php',
                type:  'post',                
                success:  function (response) {
                       // console.log(response);
                          
                       if(response.trim()=="NADA")
                       {
                        swal("Hola!", "el hotel no registra parametros porfavor crealos para el correcto funcionamiento", "warning");
                       }else{
                        
                        var datos = JSON.parse(response);   
                        document.getElementById('NuevaParametrosLimiteEdad').value = datos[0].LimiteEdadParametros;                        
                        document.getElementById('NuevaParametrosPorcentajePenalizacion').value = datos[0].PorcentajePenalizacionParametros
                        document.getElementById('NuevaParametrosFechaVencimientoFactura').value = datos[0].FechaVencimientoFacturaParametros
                        document.getElementById('NuevaParametrosHoraCheckIn').value = datos[0].HoraCheckInParametros; 
                        document.getElementById('NuevaParametrosHoraCheckOut').value = datos[0].HoraCheckOutParametros;                        
                        document.getElementById('NuevoParametrosValorSeguro').value = datos[0].ValorSeguroParametros;                        
        
                       }
                       
                }
        });
}

/**--------------------------------- Registrar Parametrizacion hotel ---------------------------------------------------- */

function ActualizarParametrosHotel()
{
        if(ValiadacionVaciosActualizarParametrosHotel(0)==0)
        {
                        var NombreProceso="ActualizarParametrosHotel";
                        var NuevaParametrosHoraCheckIn=$('#NuevaParametrosHoraCheckIn').val(); 
                        var NuevaParametrosHoraCheckOut=$('#NuevaParametrosHoraCheckOut').val();
                        var NuevaParametrosLimiteEdad=$('#NuevaParametrosLimiteEdad').val();                        
                        var NuevaParametrosPorcentajePenalizacion=$('#NuevaParametrosPorcentajePenalizacion').val();
                        var NuevaParametrosFechaVencimientoFactura=$('#NuevaParametrosFechaVencimientoFactura').val();                        
                        var NuevoParametrosValorSeguro=$('#NuevoParametrosValorSeguro').val();                        
                        var parametros = {
                                        "NuevaParametrosHoraCheckIn":NuevaParametrosHoraCheckIn,
                                        "NuevaParametrosHoraCheckOut" : NuevaParametrosHoraCheckOut, 
                                        "NuevaParametrosLimiteEdad":NuevaParametrosLimiteEdad,  
                                        "NuevaParametrosPorcentajePenalizacion":NuevaParametrosPorcentajePenalizacion, 
                                        "NuevaParametrosFechaVencimientoFactura":NuevaParametrosFechaVencimientoFactura,    
                                        "NuevoParametrosValorSeguro":NuevoParametrosValorSeguro,                             
                                        "NombreProceso":NombreProceso,                                                                                                                               
                                        };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/parametrizacion/funciones.php',
                        type:  'post',                
                        success:  function (response) {
                                if(response.trim()=="ACTUALIZO")
                                {
                                        swal("¡Bien!", "Se han actualizado los parametros correctamente", "success");
                                }
                                if(response.trim()=="NOACTUALIZO")
                                {
                                        swal("¡Error!", "No se han actualizado los perimetros", "error");
                                }
                        }
                });
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");        
        }
}

//**--------------------------------- Traer ciudades ---------------------------------------------------- */


//**--------------------------------- Traer ciudades ---------------------------------------------------- */

function TraerCiudades()
{   

        IdDepartamento=document.getElementById('SelectDepartamentos').value;
        if(IdDepartamento=="EXTRANGERO"|| IdDepartamento==""){

        }else{
        var parametros = {
                "IdDepartamento" :IdDepartamento                                                                                                                             
                };
        $.ajax({
                data:  parametros,
                url:   '../modulos/controles/CiudadSelect.php',
                type:  'post',                
                success:  function (response) {
                        $('#SelectCiudades').html(response);
                }
        });
        }
}

//**--------------------------------- Validaciones ---------------------------------------------------- */
 
function AgregarFila()
{
                   
        $.ajax({
                
                url:   '../modulos/registro/RegistrarHuespedes.php',
                type:  'post',
                beforeSend: function () 
                {
                },
                success:  function (response) {  
                        jQuery("#FormularioHuespedes").append(jQuery('<form class="form-inline" style="padding:10px;"><div class="form-group" style="padding:5px;"><select class="form-control HuespedTipoDocumento" required  placeholder="Tipo Documento"><option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option><option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option><option value="CEDULA DE EXTRANJERIA">CEDULA DE EXTRANJERIA</option><option value="PASAPORTE">PASAPORTE</option></select></div><div class="form-group" style="padding:5px;">                                                        <input class="form-control HuespedId" required  placeholder="Cedula" onkeypress="return ValidarSoloNumeros(event);"/></div><div class="form-group" style="padding:5px;"><input class="form-control HuespedNombre"  required  placeholder="Nombre" onkeypress="return ValidarSoloLetras(event);"/></div><div class="form-group" style="padding:5px;"><input  class="form-control HuespedApellido" required  placeholder="Apellido"  onkeypress="return ValidarSoloLetras(event);"/></div><div class="form-group" style="padding:5px;"><input class="form-control HuespedNacionalidad" required  placeholder="Nacionalidad" onkeypress="return ValidarSoloLetras(event);"/></div><div class="form-group" style="padding:5px;"><div class="input-group date" ><input type="text" required class="form-control HuespedFechaNaciento" placeholder="Fecha de nacimiento"></div></div><div class="form-group" style="padding:5px;"><input class="form-control HuespedSeguro" required  placeholder="Seguro" onkeypress="return ValidarSoloNumeros(event);"/></div></form>'));  
                }
        });
}


function ValidacionVaciosRegistroParametrolHotel(Respuesta)
{
        var ParametrosHoraCheckIn=$('#ParametrosHoraCheckIn').val(); 
        var ParametrosHoraCheckOut=$('#ParametrosHoraCheckOut').val();
        var ParametrosLimiteEdad=$('#ParametrosLimiteEdad').val();
        var ParametrosIvaEstadia=$('#ParametrosIvaEstadia').val();
        var ParametrosPorcentajePenalizacion=$('#ParametrosPorcentajePenalizacion').val();
        var ParametrosFechaVencimientoFactura=$('#ParametrosFechaVencimientoFactura').val();        
        if(ParametrosHoraCheckIn=="" || ParametrosHoraCheckOut=="" || ParametrosLimiteEdad=="" || ParametrosIvaEstadia=="" || ParametrosPorcentajePenalizacion=="" || ParametrosFechaVencimientoFactura=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }
        
}

function ValidacionVaciosBienes(Respuesta)
{
        var BienesNombre = $('#BienesNombre').val();
        var BienesValor = $('#BienesValor').val();
        var BienesIdTipoBienes = $('#BienesIdTipoBienes').val();
        var BienesObservaciones = $('#BienesObservaciones').val();
        var BienesEstado = $('#BienesEstado').val();
        if(BienesNombre=="" || BienesValor=="" || BienesIdTipoBienes=="" || BienesObservaciones=="" || BienesEstado=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }
}
function ValiadacionVaciosActualizarParametrosHotel(Respuesta){
        var NuevaParametrosHoraCheckIn=$('#NuevaParametrosHoraCheckIn').val(); 
        var NuevaParametrosHoraCheckOut=$('#NuevaParametrosHoraCheckOut').val();
        var NuevaParametrosLimiteEdad=$('#NuevaParametrosLimiteEdad').val();
        var NuevaParametrosIvaEstadia=$('#NuevaParametrosIvaEstadia').val();
        var NuevaParametrosPorcentajePenalizacion=$('#NuevaParametrosPorcentajePenalizacion').val();
        var NuevaParametrosFechaVencimientoFactura=$('#NuevaParametrosFechaVencimientoFactura').val();    
        var NuevoParametrosValorSeguro=$('#NuevoParametrosValorSeguro').val();  
        if(NuevoParametrosValorSeguro=="" ||  NuevaParametrosHoraCheckIn=="" || NuevaParametrosHoraCheckOut=="" || NuevaParametrosLimiteEdad=="" || NuevaParametrosIvaEstadia=="" || NuevaParametrosPorcentajePenalizacion=="" || NuevaParametrosFechaVencimientoFactura=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }
}

function BuscarIdHabitacionOcupacion(IdHabitacion){
        //alert("aqui");
            var IdHabitacion=IdHabitacion;
            var NombreProceso="BuscarIdHabitacionOcupacion";
            var parametros = {
                    "NombreProceso" :NombreProceso,
                    "IdHabitacion" : IdHabitacion,                                                                                                                             
                    };
            $.ajax({
                    data:  parametros,
                    url:   '../modulos/registro/funciones.php',
                    type:  'post',                
                    success:  function (response) {
                        var datos = JSON.parse(response);
                        if(datos=="")
                        {
                                var Mensaje="La habitacion consultada no tiene una ocupación asignada";
                           
                                $('[data-toggle="tooltip"]').attr('data-original-title',Mensaje).tooltip('show');   
                        }else{
                                var Mensaje="Ocupacion: "+datos[0].IdMovimiento+" fecha de entrada: "+datos[0].FechaEntradaMovimientoHabitacion+" fecha de salida: "+datos[0].FechaSalidaMovimientoHabitacion;
                           
                           $('[data-toggle="tooltip"]').attr('data-original-title',Mensaje).tooltip('show');
                        }
                           
                           
                    }
            });
            
    }
 

function ValidacionVaciosUsuario(Respuesta)
{
        var NombreUsuario = $('#nombre').val();
        var ApellidoUsuario = $('#apellido').val();
        var RolUsuario = $('#rol').val();
        var TelefonoUsuario = $('#telefono').val();
        var CorreoUsuario = $('#correo').val();
        var ContrasenaUsuario = $('#contrasena').val();
        
        if(NombreUsuario=="" || ApellidoUsuario=="" || TelefonoUsuario=="" || CorreoUsuario=="" || ContrasenaUsuario=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }
}
function ValidarVaciosProductos(Erroes)
{
        var ProductoNombre = $('#ProductoNombre').val();
        var ProductoMarca = $('#ProductoMarca').val();
        var ProductoValor = $('#ProductoValor').val();
        var ProductoCantidad = $('#ProductoCantidad').val();
        if(ProductoNombre=="" || ProductoMarca=="" ||ProductoValor==""||ProductoCantidad=="")
        {
                return 1; 
        }else
        {
                return 0; 
        }  
}

function ValidarVaciosActualizarProductos()
{
        var ProductoId = $('#ProductoId').val();
        var NuevoProductoNombre = $('#NuevoProductoNombre').val();        
        var NuevoProductoMarca = $('#NuevoProductoMarca').val();
        var NuevoProductoValor = $('#NuevoProductoValor').val();
        var NuevoProductoObservaciones = $('#NuevoProductoObservaciones').val();
        var NuevoProductoCantidad = $('#NuevoProductoCantidad').val();
        var NuevoProductoMedida = $('#NuevoProductoMedida').val();        
        if(ProductoId=="" || NuevoProductoNombre=="" || NuevoProductoMarca=="" || NuevoProductoValor=="" || NuevoProductoObservaciones=="" || NuevoProductoCantidad=="" || NuevoProductoMedida=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }
}


/**--------------------------------- Validaciones ---------------------------------------------------- */



/**ValidarVacios() */
function ValidarVacios(Erroes)
{

        var TipoProductoNombre = $('#TipoProductoNombre').val();
        var TipoProductosObservaciones = $('#TipoProductosObservaciones').val();        
        var TipoProductosImpuesto = $('#TipoProductosImpuesto').val();
        var TipoProductosCentroContable = $('#TipoProductosCentroContable').val();
        var TipoProductosCuentaContable = $('#TipoProductosCuentaContable').val();
        var TipoProductosConceptoContable = $('#TipoProductosConceptoContable').val();
        
        if(TipoProductoNombre=="" || TipoProductosObservaciones=="" || TipoProductosImpuesto=="" || TipoProductosCentroContable=="" || TipoProductosCuentaContable=="" || TipoProductosConceptoContable=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }

}


function ValidarVaciosActalizarBienes(errores)
{
        var BienesId = $('#BienesId').val();
        var NuevoBienesNombre = $('#NuevoBienesNombre').val();                
        var NuevoBienesValor = $('#NuevoBienesValor').val();
        var NuevoBienesIdTipoBienes = $('#NuevoBienesIdTipoBienes').val();
        var NuevoBienesObservaciones = $('#NuevoBienesObservaciones').val();
        var NuevoBienesEstado = $('#NuevoBienesEstado').val();

        if(BienesId=="" || NuevoBienesNombre=="" || NuevoBienesValor=="" || NuevoBienesIdTipoBienes=="" || NuevoBienesObservaciones=="" || NuevoBienesEstado=="")
        {
                return 1;
        }
        else
        {
                return 0;
        }
}

        function cargar(url,div){
                
                $.ajax({   
                    type: "POST",
                    url:url,
                    data:{},
                    success: function(datos){       
                        var p = datos; 
                        $('#'+div).html(p);                        
                    }
                });
                
                /** despues del succes:
                 *  var url="../modulos/inventario/MostrarServicios.php";
                                cargar(url,"TablaRecarga");     */        
            }

                        

/*------------------------------------- Brayan ----------------------------------*/

// Se realiza para el registro de Habitaciones en Parametros del Hotel

function HabitacionRegistrar(){

        var HabitacionNombre = $('#HabitacionNombre').val();
        var  HabitacionEstado = $('#HabitacionEstado').val();
        var  HabitacionTipo = $('#HabitacionTipo').val();
        var  HabitacionObservacion = $('#HabitacionObservacion').val();

        var parametros ={
                "HabitacionNombre" : HabitacionNombre,
                "HabitacionEstado" : HabitacionEstado,
                "HabitacionTipo" : HabitacionTipo,
                "HabitacionObservacion" : HabitacionObservacion,
                "NombreProceso": "RegistrarHabitacion"
        };

        $.ajax({
                data:  parametros,
                url:   '../modulos/parametrizacion/funciones.php',
                type:  'post',
                beforeSend: function () {
                   
                },
                success:  function (response) {
                       
                        if (response.trim() == "REGISTRO") {
                                swal("¡Registrado!",
                                        "Registro Realizado con Exito. !",
                                        "success");
                        } else {
                                swal("Error", "No se puedo registrar la información", "error");
                        }
                        LimpiarCajas();
                           /** despues del succes:
                                */ 
                               var url="../modulos/parametrizacion/HabitacionListarDatos.php";
                                cargar(url,"ListadoDatosHabitacion"); 
                }
        });
}

//registro de Informacion del Hotel

function DatosEmpresaRegistrar(){
        var formulario = $('#formUpload');
        var datos = formulario.serialize();
        var DatosEmpresaLogo = new FormData();	
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) { 
        DatosEmpresaLogo.append((formulario.find('input[type="file"]:eq('+i+')').attr("name")),((formulario.find('input[type="file"]:eq('+i+')')[0]).files[0]));
        }
        
        $.ajax({
                data:  DatosEmpresaLogo,
                url:   '../modulos/parametrizacion/funciones.php?'+datos,
                type: 'POST',
                contentType: false, 
                processData:false,
                beforeSend: function () {
                     //   $("#ResultadoDatosEmpresa").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                       //console.log(response);
                       LimpiarCajas();
                        swal("¡Dato Registrado!",
                                "Registro Realizado con Exito. !",
                                "success");
                                BloquearInformacionHotel();
                }
        });
}

///Modificar Contenido

function ConsultarHabitacion(dato){
        // alert("El contenido es "+id);
       var Id = dato;
        var parametros={ 
                "NombreProceso":'ConsultarHabitacion',
                "HabitacionId":Id
        };
        // console.log(parametros);
        $.ajax({
                data:  parametros,
                url:   '../modulos/parametrizacion/funciones.php',
                type:  'POST',
                beforeSend: function () {
                        //$("#Resultado").html("Procesando, espere por favor...");
                },
                success:  function (respuesta) {
                        // console.log(respuesta);
                        var datos = JSON.parse(respuesta);
                        //  console.log(datos);
                        document.getElementById("HabitacionCodigoActualizar").value = datos[0].IdHabitacion;
                        document.getElementById("HabitacionTipoActualizar").value = datos[0].NombreHabitacion;
                        document.getElementById("HabitacionNombreAcutalizar").value = datos[0].NombreHabitacion;
                        document.getElementById("HabitacionObservacionActualizar").value = datos[0].ObservacionesHabitacion;
                        document.getElementById("HabitacionEstadoActualizar").value = datos[0].EstadoHabitacion;
                        document.getElementById("HabitacionTipoActualizar").value = datos[0].IdHabitacionTipo;
                        /* console.log(datos[0].NombreHabitacionTipo); */
                        // LimpiarCajas();
                      //$("#Resultado").html("<pre>"+datos.NombreHabitacion+"</pre>");
                }
        });

}

//cargar los datos en los campos Actualizar Empresa

function DatosEmpresaConsultar(){
        $.ajax({
                data:  {"NombreProceso":'ConsultarDatosEmpresa'},
                url:   '../modulos/parametrizacion/funciones.php',
                type:  'POST',
                beforeSend: function () {
                        //$("#Resultado").html("Procesando, espere por favor...");
                },
                success:  function (respuesta) {
                        // console.log(respuesta);
                        
                        var datos = JSON.parse(respuesta);
                         // console.log(datos);
                         if(datos.length !=0){
                         document.getElementById("DatosEmpresaCodigoActualizar").value = datos[0].IdDatosEmpresa;
                         document.getElementById("DatosEmpresaNitActualizar").value = datos[0].NitDatosEmpresa;
                         document.getElementById("DatosEmpresaNombreActualizar").value = datos[0].NombreDatosEmpresa;
                         document.getElementById("DatosEmpresaTelefonoActualizar").value = datos[0].TelefonoDatosEmpresa;
                         document.getElementById("DatosEmpresaCorreoActualizar").value = datos[0].CorreoDatosEmpresa;
                         document.getElementById("DatosEmpresaDireccionActualizar").value = datos[0].DireccionDatosEmpresa;
                         var imagen = document.getElementById("MostrarImagenActualizar"); 
                         ruta = "../modulos/parametrizacion/ImagenLogo/"+datos[0].LogoDatosEmpresa;
                         imagen.setAttribute("src", ruta);  
                         document.getElementById("DatosEmpresaWebActualizar").value = datos[0].WebDatosEmpresa;
                         }
                     
                }
        });
}


function DatosEmpresaActualizar(){
       
        var Id = $('#DatosEmpresaCodigoActualizar').val();
        var ValidarFoto = document.getElementById("DatosEmpresaLogoActualizar").value;

        if ( ValidarFoto == "" ){

        var formulario = $('#formUpload1');
        var datos = formulario.serialize();
        var DatosEmpresaLogo = new FormData();
        for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {
                DatosEmpresaLogo.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
        }
         var parament= '&NombreProceso=ActualizarDatosEmpresaGET1&DatosEmpresaId='+Id;
                var parametros =  datos+parament ;
               // console.log(parametros);
        $.ajax({
                //data: parametros,
                url: '../modulos/parametrizacion/funciones.php?' + parametros,
                type: 'GET',
                contentType: false,
                processData: false,
                beforeSend: function () {
                },
                
                success: function (response) {
                        DatosEmpresaConsultar();
                        swal("¡Actualizado!",
                                "Cambio realizado con exito. !",
                                "success");
                }
        }); 

       }else{

                

                var formulario = $('#formUpload1');
                var datos = formulario.serialize();
                var DatosEmpresaLogo = new FormData();
                for (var i = 0; i < (formulario.find('input[type=file]').length); i++) {
                        DatosEmpresaLogo.append((formulario.find('input[type="file"]:eq(' + i + ')').attr("name")), ((formulario.find('input[type="file"]:eq(' + i + ')')[0]).files[0]));
                }

                var parament = '&NombreProceso=ActualizarDatosEmpresaGET2&DatosEmpresaId=' + Id;
                var parametros = datos + parament;

                $.ajax({
                        data: DatosEmpresaLogo,
                        url: '../modulos/parametrizacion/funciones.php?' + parametros,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                        },
                        success: function (response) {
                                //console.log(response);
                                DatosEmpresaConsultar();
                                swal("¡Actualizado!",
                                        "Cambio realizado con exito. !",
                                        "success");
                        }
                });

       }
}
function TipoHabitacionRegistrar(){
        
        var TipoHabitacionNombre = $('#TipoHabitacionNombreRegistrar').val();
        var TipoHabitacionCantidadPax = $('#TipoHabitacionCantidadPaxRegistrar').val();
        var TipoHabitacionValorPax = $('#TipoHabitacionValorPaxRegistrar').val();
        var TipoHabitacionValorAdicional = $('#TipoHabitacionValorAdicionalRegistrar').val();
        var parametros = {
                "TipoHabitacionNombre": TipoHabitacionNombre,
                "TipoHabitacionCantidadPax": TipoHabitacionCantidadPax,
                "TipoHabitacionValorPax": TipoHabitacionValorPax,
                "TipoHabitacionValorAdicional": TipoHabitacionValorAdicional,
                "NombreProceso": "RegistrarTipoHabitacion"
        };

        if(TipoHabitacionNombre.trim() == ""){
                swal("Campo Vacio", "No se Puedo Registrar Tipo Nombre Habitación", "warning");
        }else if(TipoHabitacionCantidadPax.trim()==""){
                swal("Campo Vacio", "No se Puedo Registrar Tipo Cantidad Pax", "warning");
        }else if(TipoHabitacionValorPax.trim()==""){
                swal("Campo Vacio", "No se Puedo Registrar Tipo Valor Pax", "warning");
        }else if(TipoHabitacionValorAdicional.trim()==""){
                swal("Campo Vacio", "No se Puedo Registrar Tipo la Valor Adicional", "warning");
        }else{
                $.ajax({
                        data: parametros,
                        url: '../modulos/parametrizacion/funciones.php',
                        type: 'POST',
                         beforeSend: function () {
                         },
        
                         success: function (response) {
                                
                                 if ( response.trim() == "REGISTRO") {
                                         swal("¡Registrado!",
                                                 "Registro Realizado con Exito. !",
                                                 "success");
                                 } else {
                                         swal("Error", "No se Puedo Registrar la Información", "error");
                                 }
                                 LimpiarCajas();
                                 var url="../modulos/parametrizacion/TipoHabitacionListarDatos.php";
                                cargar(url,"ListadoDatosTipoHabitacion"); 
                                CargarSelectTipohabitacion();
                         }
                });
        }
         
}

function BloquearInformacionHotel(){
       
        $.ajax({
                data: {"NombreProceso":"ConsultarEmpresaRegistrada"},
                url: '../modulos/parametrizacion/funciones.php',
                type: 'POST',
                success: function (respuesta) {
                       console.log(respuesta.trim());
                       if(respuesta.trim() == "EMPRESAREGISTRADA"){
                        $("#DatosEmpresaNit").attr("disabled", "disabled");     
                        $("#DatosEmpresaNombre").attr("disabled", "disabled");     
                        $("#DatosEmpresaTelefono").attr("disabled", "disabled");     
                        $("#DatosEmpresaCorreo").attr("disabled", "disabled");     
                        $("#DatosEmpresaDireccion").attr("disabled", "disabled");     
                        $("#DatosEmpresaLogo").attr("disabled", "disabled");     
                        $("#DatosEmpresaWeb").attr("disabled", "disabled");     
                        $("#GuardarDatosEmpresa").attr("disabled", "disabled");     
                       }
                }
        });
}

///Consultar Contenido

function ConsultarTipoHabitacion(dato) {
        
        /*  console.log(dato); */
        
        document.getElementById("TipoHabitacionCodigoActualizar").value = dato.IdHabitacionTipo;
        document.getElementById("TipoHabitacionNombreActualizar").value = dato.NombreHabitacionTipo;
        document.getElementById("TipoHabitacionCantidadPaxActualizar").value = dato.CantidadPaxHabitacionTipo;
        document.getElementById("TipoHabitacionValorPaxActualizar").value = dato.ValorPaxHabitacionTipo;
        document.getElementById("TipoHabitacionValorAdicionalActualizar").value = dato.ValorAdicionalHabitacionTipo;
                   

}


// actualizar tipo habitación

function TipoHabitacionActualizar() {
        var Id = document.getElementById("TipoHabitacionCodigoActualizar").value;
        var Nombre = document.getElementById("TipoHabitacionNombreActualizar").value;
        var CantidadPax  = document.getElementById("TipoHabitacionCantidadPaxActualizar").value;
        var ValorPax = document.getElementById("TipoHabitacionValorPaxActualizar").value;
        var AdicionalPax = document.getElementById("TipoHabitacionValorAdicionalActualizar").value;

        var parametros = {
                "NombreProceso": 'ActualizarTipoHabitacion',
                "TipoHabitacionNombre": Nombre,
                "TipoHabitacionId": Id,
                "CantidadPax": CantidadPax,
                "ValorPax": ValorPax,
                "AdicionalPax": AdicionalPax
        };
        
        if(Id.trim() == ""){
                 swal("Campo Vacio", "No Puede estar Vacio Codigo", "warning");
        }
        else if(Nombre.trim() == ""){
                 swal("Campo Vacio", "No Puede estar Vacio Nombre ", "warning");
        }
        else if(CantidadPax.trim() == ""){
                 swal("Campo Vacio", "No Puede estar Vacio CantidadPax ", "warning");
        }
        else if(ValorPax.trim() == ""){
                 swal("Campo Vacio", "No Puede estar Vacio ValorPax ", "warning");
        }
        else if(AdicionalPax.trim() == ""){
                 swal("Campo Vacio", "No Puede estar Vacio AdicionalPax ", "warning");
        }else{
                $.ajax({
                        data: parametros,
                        url: '../modulos/parametrizacion/funciones.php',
                        type: 'POST',
                        beforeSend: function () {
                                //$("#Resultado").html("Procesando, espere por favor...");
                        },
                        success: function (response) {
                                if (response.trim() == "ACTUALIZO") {
                                        swal("¡Registrado!",
                                                "Actualizo Realizado con Exito. !",
                                                "success");
                                } else {
                                        swal("Error", "No se Puedo Registrar la Información", "error");
                                }
                                LimpiarCajas();
                                var url="../modulos/parametrizacion/TipoHabitacionListarDatos.php";
                                cargar(url,"ListadoDatosTipoHabitacion"); 
                                CargarSelectTipohabitacion();
                        }
                });
        }

        

}


//Eliminar Tipo Habitacion 

function EliminarTipoHabitacion(dato) {
        
        parametros = {
                "NombreProceso": 'ElminarTipoHabitacion',
                "TipoHabitacionId": dato
        };

        swal({
                title: "¿Eliminar el Registro?",
                text: "Esta Seguro que desea eliminar el Registro!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Si, Eliminar!",
                closeOnConfirm: false
        },
                function () {
                
                        $.ajax({
                                data: parametros,
                                url: '../modulos/parametrizacion/funciones.php',
                                type: 'POST',
                                beforeSend: function () {
                                },
                                success: function (response) {
                                        if (response.trim() == "ELIMINO") {
                                                swal("Borrado!", "Registro eliminado con exito.", "success");
                                        } else {
                                                
                                               swal("Error", "No se puedo eliminar la información", "error");
                                        }
                                        var url="../modulos/parametrizacion/TipoHabitacionListarDatos.php";
                                        cargar(url,"ListadoDatosTipoHabitacion"); 
                                }
                        });

                });

}
function HabitacionActualizar(){

        var HabitacionCodigoActualizar = $('#HabitacionCodigoActualizar').val();
        var HabitacionNombreAcutalizar = $('#HabitacionNombreAcutalizar').val();
        var  HabitacionEstadoActualizar = $('#HabitacionEstadoActualizar').val();
        var  HabitacionTipoActualizar = $('#HabitacionTipoActualizar').val();
        var  HabitacionObservacionActualizar = $('#HabitacionObservacionActualizar').val();

        var parametros ={
                "HabitacionCodigoActualizar" : HabitacionCodigoActualizar,
                "HabitacionNombreAcutalizar" : HabitacionNombreAcutalizar,
                "HabitacionEstadoActualizar" : HabitacionEstadoActualizar,
                "HabitacionTipoActualizar" : HabitacionTipoActualizar,
                "HabitacionObservacionActualizar" : HabitacionObservacionActualizar,
                "NombreProceso": "ActualizarHabitacion"
        };

        if(   HabitacionCodigoActualizar.trim() == "" || HabitacionNombreAcutalizar.trim() == "" || HabitacionEstadoActualizar.trim() == "" || HabitacionTipoActualizar.trim() == "" ){
                swal("Faltan", "Diligencie los Campos Correctamente", "warning");
        }else{

        $.ajax({
                data:  parametros,
                url:   '../modulos/parametrizacion/funciones.php',
                type:  'post',
                beforeSend: function () {
                   
                },
                success:  function (response) {
                       
                        if (response.trim() == "ACTUALIZO") {
                                swal("¡Actualizado!",
                                        "Registro Actualizado con Exito. !",
                                        "success");
                        } else {
                                swal("Error", "No se puedo actualizar la información", "error");
                        }
                        LimpiarCajas();
                           /** despues del succes:
                                */ 
                                var url="../modulos/parametrizacion/HabitacionListarDatos.php";
                                cargar(url,"ListadoDatosHabitacion");
                                var url = "../contenido/RackGrafico.php";
                                cargar(url,"TablaRecargar"); 
                }
        });
        }
}



function VehiculoRegistrar() {
        
        var documento = document.getElementById("VehiculoDocumento").value;
        var parametros = {
                "CedulaCliente": documento,
                "NombreProceso": "ConsultaCliente"
        };
        $.ajax({
                data: parametros,
                url: '../modulos/cliente/funciones.php',
                type: 'POST',
                beforeSend: function () {
                },
                success: function (response) {
                        var datos = JSON.parse(response);
                        // console.log(datos);

                        if (datos.Id >=  1){
                                var VehiculoPlaca = document.getElementById("VehiculoPlaca").value;
                                var VehiculoFechaEntrada = document.getElementById("VehiculoFechaEntrada").value;
                                var VehiculoFechaSalida = document.getElementById("VehiculoFechaSalida").value;
                                var VehiculoObservacion = document.getElementById("VehiculoObservacion").value;
                                
                                var parametros = {
                                        "IdCliente": datos.Id,
                                        "VehiculoPlaca": VehiculoPlaca,
                                        "VehiculoFechaEntrada": VehiculoFechaEntrada,
                                        "VehiculoFechaSalida": VehiculoFechaSalida,
                                        "VehiculoObservacion": VehiculoObservacion,
                                        "NombreProceso": 'RegistrarVehiculo'
                                };

                                if(ValidarVehiculo(parametros)==false){
                                        swal("Faltan", "Diligencie los campos Correctamente", "warning");
                                }else{

                                $.ajax({
                                        data: parametros,
                                        url: '../modulos/cliente/funciones.php',
                                        type: 'POST',
                                        beforeSend: function () {
                                        },
                                        success: function (response) {
                                                if (response.trim() == "REGISTRO") {
                                                        swal("Registro!", "Registro Ingresado Con Exito.", "success");
                                                        var url = "../modulos/cliente/VehiculoListarDatos.php";
                                                        cargar(url,"ListadoDatosVehiculos");
                                                        LimpiarCajas();
                                                        
                                                } else {

                                                        swal("Error", "No se puedo Registrar la información", "error");
                                                        LimpiarCajas();
                                                }
                                        }
                                });
                                }

                        }else{
                                swal("Error", "Los datos del Campo cedula son invalidos o no esta registrado el cliente", "warning");
                               
                        }
                }
        });

}


function ValidarVehiculo(DatosVehiculo) {
        
        if (DatosVehiculo.IdCliente == "" || DatosVehiculo.VehiculoPlaca == "" || DatosVehiculo.VehiculoFechaEntrada == "" || DatosVehiculo.VehiculoFechaSalida =="" ){
              return false;
        }else{
             return true;
        }
}

function ConsultarVehiculo(dt) {

        var parametros = {
                "IdVehiculo": dt,
                "NombreProceso": "ConsultarVehiculo"
        };

        $.ajax({
                data: parametros,
                url: '../modulos/cliente/funciones.php',
                type: 'POST',   
                success: function (response) {
                        var datos = JSON.parse(response);
                        // console.log(datos);
                        //Conenido de carga de campos  
                        document.getElementById("VehiculoActualizarPlaca").value = datos[0].PlacaVehiculoCliente; 
                        document.getElementById("VehiculoActualizarFechaEntrada").value = datos[0].FechaInicialVehiculoCliente; 
                        document.getElementById("VehiculoActualizarFechaSalida").value = datos[0].FechaFinalVehiculoCliente; 
                        document.getElementById("VehiculoActualizarObservacion").value = datos[0].DescripcionVehiculoCliente; 
                        document.getElementById("VehiculoActualizarCodigo").value = datos[0].IdVehiculoCliente;  
                        document.getElementById("VehiculoActualizarDocumento").value = datos[0].NitCliente;
                }
        });
       
}

function VehiculoActualizar() { 
        //Actualizacion de Datos
        var Vehiculo  = document.getElementById("VehiculoActualizarPlaca").value;
        var FechaInicial  = document.getElementById("VehiculoActualizarFechaEntrada").value;
        var FechaFinal  = document.getElementById("VehiculoActualizarFechaSalida").value;
        var Observacion  = document.getElementById("VehiculoActualizarObservacion").value;
        var Codigo  = document.getElementById("VehiculoActualizarCodigo").value;
        var Documento  = document.getElementById("VehiculoActualizarDocumento").value;

        var parametros = { 
                "Vehiculo": Vehiculo,
                "FechaInicial": FechaInicial,
                "FechaFinal": FechaFinal,
                "Observacion": Observacion,
                "Codigo": Codigo,
                "Documento": Documento,
                "NombreProceso": 'ActualizarVehiculo'
        };

        if(parametros.Vehiculo.trim() == "" ||  parametros.FechaInicial.trim() == "" || parametros.FechaFinal.trim() =="" || parametros.Codigo.trim() == "" || parametros.Documento.trim() == "" ){
                swal("Error", "Faltan campos por llenar del vehiculo cliente", "warning");
        }else{

                $.ajax({
                        data: parametros,
                        url: '../modulos/cliente/funciones.php',
                        type: 'POST',
                        beforeSend: function () {
                        },
                        success: function (response) {
                                if (response.trim() == "ACTUALIZO") {
                                        swal("Actualizo!", "Registro Actualizado Con Exito.", "success");
                                        var url = "../modulos/cliente/VehiculoListarDatos.php";
                                        cargar(url,"ListadoDatosVehiculos");
                                        LimpiarCajas();
                                } else {
                                        
                                       swal("Error", "no se puedo registrar la Información", "error");
                                }
                        }
                });
        }
}

function TipoContribuyenteRegistrar(){

        var TipoContribuyenteNombre = document.getElementById("TipoContribuyenteNombre").value;
        var parametros = { 
                "TipoContribuyenteNombre": TipoContribuyenteNombre,
                "NombreProceso": 'RegistrarTipoContribuyente'
        };

        if(parametros.TipoContribuyenteNombre.trim()==""){
                swal("Faltan Campos", "Faltan campos por llenar ", "warning");
        }else{
                $.ajax({
                        data: parametros,
                        url: '../modulos/cliente/funciones.php',
                        type: 'POST',
                        beforeSend: function () {
                        },
                        success: function (response) {
                                if (response.trim() == "REGISTRO") {
                                        swal("Registro!", "Registro Realizado Con Exito.", "success");
                                        var url = "../modulos/cliente/TipoContribuyenteListarDatos.php";
                                        cargar(url,"ListadoDatosContribuyente");
                                        LimpiarCajas();
                                } else {
                                        
                                       swal("Error", "No se puedo registrar la información", "error");
                                }
                        }
                });
        }
}

function ConsultarTipoContribuyente(dt){

        var parametros = {
                "TipoContribuyenteCodigo": dt,
                "NombreProceso": 'ConsultaTipoContribuyente' 
        };
                $.ajax({
                        data: parametros,
                        url: '../modulos/cliente/funciones.php',
                        type: 'POST',
                        beforeSend: function () {
                        },
                        success: function (response) {

                                if(response.trim() != ""){
                                  var conversion = JSON.parse(response);
                                        document.getElementById("ActualizarTipoContribuyenteCodigo").value =  conversion[0].IdTipoContribuyente ;
                                        document.getElementById("ActualizarTipoContribuyenteNombre").value = conversion[0].NombreTipoContribuyente ;
                                }else{
                                 swal("Error", "No se puedo consultar la Información", "error");
                                }
                        }
                });
}

function ActualizarTipoContribuyente(){

        var TipoContribuyenteNombre = document.getElementById("ActualizarTipoContribuyenteNombre").value.trim();
        var TipoContribuyenteCodigo = document.getElementById("ActualizarTipoContribuyenteCodigo").value.trim();
        
        var parametros = {
                "TipoContribuyenteCodigo": TipoContribuyenteCodigo,
                "TipoContribuyenteNombre": TipoContribuyenteNombre,
                "NombreProceso": 'ActualizarTipoContribuyente' 
        };

        if(TipoContribuyenteCodigo == "" || TipoContribuyenteNombre == ""){
                swal("Faltan Campos", "Faltan campos por llenar ", "warning");
        }else{
                $.ajax({
                        data: parametros,
                        url: '../modulos/cliente/funciones.php',
                        type: 'POST',
                        beforeSend: function () {
                        },
                        success: function (response) {
                                if (response.trim() == "ACTUALIZAR") {
                                        swal("Actualización!", "Actualización Realizada Con Exito.", "success");
                                        var url = "../modulos/cliente/TipoContribuyenteListarDatos.php";
                                        cargar(url,"ListadoDatosContribuyente");
                                        LimpiarCajas();
                                } else {
                                        
                                       swal("Error", "No se puedo actualizar la Información", "error");
                                }
                        }
                });
        }

}

function CargarSelectTipohabitacion(){
        $.ajax({ 
                type: "POST",
                url: '../modulos/parametrizacion/TipoHabitacion.php',
                data:{},
                success: function(datos){ 
                var p = datos; 
                $('#HabitacionTipo').html(p); 
                $('#HabitacionTipoActualizar').html(datos); 
                }
        });
}
/*------------------------------------- Brayan ----------------------------------*/
function ValidarExistenciaCliente(){
        var ClienteNumeroDocumento = $("#ClienteNumeroDocumento").val();
        var Parametros = {
                "NumeroDocumento":ClienteNumeroDocumento,
                "NombreProceso": "ConsultaCliente"
        };
        $.ajax({
                type: "POST",
                url: "../modulos/registroindividual/funciones.php",
                data: Parametros,
                success: function (response) {
                     if(response.trim() =="CLIENTEENCONTRADO"){
                        swal("Ojo con el Cliente","El Cliente ya se encuentra Registrado !!","warning");
                     }
                     
                }
        });
}

function ConsultarClienteActualizar(){

        var ClienteNumeroDocumento = $("#ClienteNumeroDocumentoActualizar").val();
        var Parametros = {
                "NumeroDocumento":ClienteNumeroDocumento,
                "NombreProceso": "ConsultaDatosCliente"
        };
        $.ajax({
                type: "POST",
                url: "../modulos/registroindividual/funciones.php",
                data: Parametros,
                success: function (response) {
                        var DtCliente =  JSON.parse(response);
                        console.log(DtCliente);
                        /* var tipoClient = parseInt(DtCliente[0].IdClienteTipo); */
                        var tipoClient = DtCliente[0].IdClienteTipo;
                        
                        switch (tipoClient) {
                                case "1":
                                        localStorage.TipoClienteActualizar = 1;
                                        document.getElementById("ParticularActualizar").checked = true;
                                        LimpiarCajas();
                                        $("#ClienteValorCreditoActualizar1").hide();
                                        $("#ClienteConvenioSINOActualizar1").hide();
                                        $("#ClienteListadodeConveniosActualizar1").hide();
                                        $("#ClienteComisionConvenioActualizar1").hide();
                                        break;
                                case "2":
                                        localStorage.TipoClienteActualizar = 2;
                                        document.getElementById("AgenciaActualizar").checked = true;
                                        $("#ClienteValorCreditoActualizar1").show();
                                        $("#ClienteConvenioSINOActualizar1").show();
                                        $("#ClienteListadodeConveniosActualizar1").show();
                                        $("#ClienteComisionConvenioActualizar1").show();
                                        LimpiarCajas();
                                        break;
                                case "3":
                                        localStorage.TipoClienteActualizar = 3; 
                                        document.getElementById("CorporativoActualizar").checked = true;
                                        $("#ClienteValorCreditoActualizar1").hide();
                                        $("#ClienteConvenioSINOActualizar1").hide();
                                        $("#ClienteListadodeConveniosActualizar1").hide();
                                        $("#ClienteComisionConvenioActualizar1").show();
                                        LimpiarCajas();
                                        break;
                                default:
                                        localStorage.TipoClienteActualizar = 1;
                                        document.getElementById("ParticularActualizar").checked = true;
                                        LimpiarCajas();
                                        break;
                        }


                        $("#ClienteCodigo").val(DtCliente[0].IdCliente);
                        $("#ClienteTipoDocumentoActualizar").val(DtCliente[0].TipoDocumentoCliente);
                        $("#ClienteNombreActualizar").val(DtCliente[0].NombreCliente);
                        $("#ClienteApellidoActualizar").val(DtCliente[0].ApellidoCliente);
                        $("#ClienteTelefono1Actualizar").val(DtCliente[0].Telefono1Cliente);
                        $("#ClienteTelefono2Actualizar").val(DtCliente[0].Telefono2Cliente);
                        $("#ClienteDireccionActualizar").val(DtCliente[0].DireccionCliente);
                        $("#ClienteCorreoActualizar").val(DtCliente[0].CorreoCliente);
                        $("#ClienteActividadEconomicaActualizar").val(DtCliente[0].ActividadEconomicaCliente);
                        $("#ClienteNumeroCuentaActualizar").val(DtCliente[0].NumeroCuentaCliente);
                        $("#NacionalidadClienteParticularActualizar").val(DtCliente[0].NacionalidadCliente);
                        $("#ClienteCiudadListaActualizar").val(DtCliente[0].IdCiudad);
                        $("#ClienteTipoPersonaActualizar").val(DtCliente[0].IdPersonaTipo);
                        $("#ClienteTipoContribuyenteActualizar").val(DtCliente[0].IdContribuyenteTipo);
                        $("#ClienteCodigoMagicoActualizar").val(DtCliente[0].CodigoMagicoCliente);
                        $("#ClientePreferenciasActualizar").val(DtCliente[0].PreferenciasCliente);
                        $("#ClienteObservacionesActualizar").val(DtCliente[0].ObservacionesCliente);
                        $("#ClienteValorCreditoActualizar").val(DtCliente[0].ValorCreditoCliente);
                        $("#ClienteComisionConvenioActualizar").val(DtCliente[0].ComisionCliente);
                        
                        var Conve = DtCliente[0].IdConvenio;
                       /*  console.log("valor del convenio"+Conve); */
                        if(DtCliente[0].IdConvenio == "" ||  DtCliente[0].IdConvenio == null){

                                document.getElementById("ClienteConvenioSINOActualizar").checked = false;
                                $("#ClienteListadodeConveniosActualizar").val(DtCliente[0].IdConvenio);

                        }else{
                                document.getElementById("ClienteConvenioSINOActualizar").checked = true;
                                $("#ClienteListadodeConveniosActualizar").val(DtCliente[0].IdConvenio);  
                        }
                        
                        

                        var Ciudad = DtCliente[0].IdCiudad;
                        var Parametros = {
                                "Ciudad":Ciudad,
                                "NombreProceso": "ConsultaDepartamento"
                        };

                        $.ajax({
                                type: "POST",
                                url: "../modulos/registroindividual/funciones.php",
                                data: Parametros,
                                success: function (response) {
                                        $("#ClienteDepartamentoActualizar").val(response);
                                        CargarSelectDepartamentoConCiudadActualizar(response); 
                                        $("#ClienteCiudadListaActualizar").val(DtCliente[0].IdCiudad);  
                                }
                        });
                        
                        $("#ClienteNumeroDocumentoActualizar").val(ClienteNumeroDocumento);

                        
                        
                        /* console.log(DtCliente); */
                     
                }
        });

}

function ClienteActualizar(){
        var ClienteCodigo = $("#ClienteCodigo").val();
        var ClienteNumeroDocumentoActualizar = $("#ClienteNumeroDocumentoActualizar").val();
        var ClienteTipoDocumentoActualizar = $("#ClienteTipoDocumentoActualizar").val();
        var ClienteNombreActualizar = $("#ClienteNombreActualizar").val();
        var ClienteApellidoActualizar = $("#ClienteApellidoActualizar").val();
        var ClienteTelefono1Actualizar = $("#ClienteTelefono1Actualizar").val();
        var ClienteTelefono2Actualizar = $("#ClienteTelefono2Actualizar").val();
        var ClienteDireccionActualizar = $("#ClienteDireccionActualizar").val();
        var ClienteCorreoActualizar = $("#ClienteCorreoActualizar").val();
        var ClienteActividadEconomicaActualizar = $("#ClienteActividadEconomicaActualizar").val();
        var ClienteNumeroCuentaActualizar = $("#ClienteNumeroCuentaActualizar").val();
        var NacionalidadClienteParticularActualizar = $("#NacionalidadClienteParticularActualizar").val();
        var ClienteCiudadListaActualizar = $("#ClienteCiudadListaActualizar").val();
        var ClienteTipoPersonaActualizar = $("#ClienteTipoPersonaActualizar").val();
        var ClienteTipoContribuyenteActualizar = $("#ClienteTipoContribuyenteActualizar").val();
        var ClienteCodigoMagicoActualizar = $("#ClienteCodigoMagicoActualizar").val();
        var ClientePreferenciasActualizar = $("#ClientePreferenciasActualizar").val();
        var ClienteObservacionesActualizar = $("#ClienteObservacionesActualizar").val();
        var ClienteValorCreditoActualizar = $("#ClienteValorCreditoActualizar").val();
        var ClienteListadodeConveniosActualizar = $("#ClienteListadodeConveniosActualizar").val();
        var ClienteComisionConvenioActualizar = $("#ClienteComisionConvenioActualizar").val();
        var RadioTipoClienteActualiza = localStorage.TipoClienteActualizar;

        Parametros = {
                "ClienteCodigo": ClienteCodigo,
                "ClienteNumeroDocumentoActualizar": ClienteNumeroDocumentoActualizar,
                "ClienteTipoDocumentoActualizar": ClienteTipoDocumentoActualizar,
                "ClienteNombreActualizar": ClienteNombreActualizar,
                "ClienteApellidoActualizar": ClienteApellidoActualizar,
                "ClienteTelefono1Actualizar": ClienteTelefono1Actualizar,
                "ClienteTelefono2Actualizar": ClienteTelefono2Actualizar,
                "ClienteDireccionActualizar": ClienteDireccionActualizar,
                "ClienteCorreoActualizar": ClienteCorreoActualizar,
                "ClienteActividadEconomicaActualizar": ClienteActividadEconomicaActualizar,
                "ClienteNumeroCuentaActualizar": ClienteNumeroCuentaActualizar,
                "NacionalidadClienteParticularActualizar": NacionalidadClienteParticularActualizar,
                "ClienteCiudadListaActualizar": ClienteCiudadListaActualizar,
                "ClienteTipoPersonaActualizar": ClienteTipoPersonaActualizar,
                "ClienteTipoContribuyenteActualizar": ClienteTipoContribuyenteActualizar,
                "ClienteCodigoMagicoActualizar": ClienteCodigoMagicoActualizar,
                "ClientePreferenciasActualizar": ClientePreferenciasActualizar,
                "ClienteObservacionesActualizar": ClienteObservacionesActualizar,
                "ClienteValorCreditoActualizar": ClienteValorCreditoActualizar,
                "ClienteListadodeConveniosActualizar": ClienteListadodeConveniosActualizar,
                "ClienteComisionConvenioActualizar": ClienteComisionConvenioActualizar,
                "RadioTipoClienteActualiza": RadioTipoClienteActualiza,
                "NombreProceso": "ClienteActualizar"
        };

        
         if(ClienteCodigo.trim() == ""){
                swal("Campos Vacios","Verificar Campo Codigo  !!","warning");
        }
        else if(ClienteCodigo.trim() == ""){
                swal("Campos Vacios","Verificar Campo ClienteCodigo  !!","warning");
        }
        else if(ClienteNumeroDocumentoActualizar.trim() == ""){
                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
        }
        /* else if(ClienteTipoDocumentoActualizar.trim() == ""){
                swal("Campos Vacios","Verificar Campo Tipo Documento  !!","warning");
        } */
        else if(ClienteNombreActualizar.trim() == ""){
                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");
        }       
        else if(ClienteTelefono1Actualizar.trim() == ""){
                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
        }
        else if(ClienteDireccionActualizar.trim() == ""){
                swal("Campos Vacios","Verificar Campo Direccion  !!","warning");
        }
        else if(ClienteCorreoActualizar.trim() == ""){
                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
        }else{
                $.ajax({
                        type: "POST",
                        url: "../modulos/registroindividual/funciones.php",
                        data: Parametros,
                        success: function (response) {
                              if(response == "ACTUALIZO" ){
                                swal("Actualizo","Datos del Cliente Actualizados con Exito !!","success");
                                LimpiarCajas();
                                TraerFormularioMenuLateral(1);
                                }else{
                                swal("ERROR","No se pudo Actualizar los Datos del Cliente  !!","error");
                              }  
                        }
                });
        } 

}

function ClienteRegistrar(){

        var ClienteNombre = $("#ClienteNombre").val();
        var ClienteApellido = $("#ClienteApellido").val();
        var ClienteTipoDocumento = $("#ClienteTipoDocumento").val();
        var ClienteNumeroDocumento = $("#ClienteNumeroDocumento").val();
        var ClienteTelefono1 = $("#ClienteTelefono1").val();
        var ClienteCorreo = $("#ClienteCorreo").val();
        var ClienteTelefono2 = $("#ClienteTelefono2").val();
        var ClienteDireccion = $("#ClienteDireccion").val();
        var ClienteActividadEconomica = $("#ClienteActividadEconomica").val();
        var ClienteNumeroCuenta = $("#ClienteNumeroCuenta").val();
        var NacionalidadClienteParticularRegistro = $("#NacionalidadClienteParticularRegistro").val();
        var ClienteCiudadLista = $("#ClienteCiudadLista").val();
        var ClienteTipoPersona = $("#ClienteTipoPersona").val();
        var ClienteTipoContribuyente = $("#ClienteTipoContribuyente").val();
        var ClienteCodigoMagico = $("#ClienteCodigoMagico").val();
        var ClientePreferencias = $("#ClientePreferencias").val();
        var ClienteObservaciones = $("#ClienteObservaciones").val();
        var ClienteValorCredito = $("#ClienteValorCredito").val();
        var ClienteListadodeConvenios = $("#ClienteListadodeConvenios").val();
        var ClienteComisionConvenio = $("#ClienteComisionConvenio").val();
        var IdClienteTipo = localStorage.TipoCliente;
        
        var Parametros = {
                "ClienteNombre" : ClienteNombre,
                "ClienteApellido" : ClienteApellido,
                "ClienteTipoDocumento" : ClienteTipoDocumento,
                "ClienteNumeroDocumento" : ClienteNumeroDocumento,
                "ClienteTelefono1" : ClienteTelefono1,
                "ClienteTelefono2" : ClienteTelefono2,
                "ClienteDireccion" : ClienteDireccion,
                "ClienteCorreo" : ClienteCorreo,
                "ClienteActividadEconomica" : ClienteActividadEconomica,
                "ClienteNumeroCuenta" : ClienteNumeroCuenta,
                "NacionalidadClienteParticularRegistro" : NacionalidadClienteParticularRegistro,
                "ClienteCiudadLista" : ClienteCiudadLista,
                "ClienteTipoPersona" : ClienteTipoPersona,
                "ClienteTipoContribuyente" : ClienteTipoContribuyente,
                "ClienteCodigoMagico" : ClienteCodigoMagico,
                "ClientePreferencias" : ClientePreferencias,
                "ClienteObservaciones" : ClienteObservaciones,
                "ClienteValorCredito" : ClienteValorCredito,
                "ClienteListadodeConvenios" : ClienteListadodeConvenios,
                "ClienteComisionConvenio" : ClienteComisionConvenio,
                "IdClienteTipo": IdClienteTipo,
                "NombreProceso": "RegistroCliente"
        };

        switch (IdClienteTipo) {
                case 1:
                        if(ClienteNombre.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");         
                        }
                        else if(ClienteApellido.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Apellido  !!","warning");
                        }
                        else if(ClienteTipoDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo TipoDocumento  !!","warning");
                        }
                        else if(ClienteNumeroDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
                        }
                        else if(ClienteTelefono1.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
                        }
                        else if(ClienteCorreo.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
                        }else{
                                console.log(Parametros); 
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/registroindividual/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                             if(response =="REGISTRO"){
                                                swal("Correcto","El Cliente Registrado con exito !!","success");
                                                LimpiarCajas();
                                                RadioTipoCliente('Particular');
                                             }else{
                                                swal("Error","El Cliente No se Registro Datos","error");
                                             }  
                                        }
                                });
                        }

                        break;
                case 2:

                        if(ClienteNombre.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");         
                        }
                        else if(ClienteNumeroDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
                        }
                        else if(ClienteTelefono1.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
                        }
                        else if(ClienteCorreo.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
                        }else{
                                console.log(Parametros); 
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/registroindividual/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                        if(response =="REGISTRO"){
                                                swal("Correcto","El Cliente Registrado con exito !!","success");
                                                LimpiarCajas();
                                                RadioTipoCliente('Agencia');
                                        }else{
                                                swal("Error","El Cliente No se Registro Datos","error");
                                        }  
                                        }
                                });
                        }
                        
                        break;
                case 3:

                        if(ClienteNombre.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");         
                        }
                        else if(ClienteNumeroDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
                        }
                        else if(ClienteTelefono1.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
                        }
                        else if(ClienteCorreo.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
                        }else{
                                console.log(Parametros); 
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/registroindividual/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                        if(response =="REGISTRO"){
                                                swal("Correcto","El Cliente Registrado con exito !!","success");
                                                LimpiarCajas();
                                                RadioTipoCliente('Corporativo');
                                        }else{
                                                swal("Error","El Cliente No se Registro Datos","error");
                                        }  
                                        }
                                });
                        }
                        break;
        
                default:
                swal("Error","Verificar Campos !!","warning");
                        break;
        }
        
}


function RadioTipoCliente(TipoCliente){
        
        switch (TipoCliente) {
                case 'Particular':
                        $('#ClienteListadodeConvenios').attr("disabled",true);
                        $('#ClienteListadodeConvenios').val(-1);  
                        $('#ClienteValorCredito1').hide();
                        $('#ClienteConvenioSINO1').hide();
                        $('#ClienteListadodeConvenios1').hide();
                        $('#ClienteComisionConvenio1').hide();
                        document.getElementById("ClienteConvenioSINO").checked = false;
                        document.getElementById("ClienteObservaciones").value = "";
                        document.getElementById("ClienteComisionConvenio").value = "";
                        document.getElementById("ClienteValorCredito").value = "";
                        $('#ClienteApellido').attr("disabled",false);
                        $('#ClienteTipoDocumento').attr("disabled",false);
                        localStorage.TipoCliente = 1;
                break;
                
                case 'Agencia':
                        $('#ClienteListadodeConvenios').attr("disabled",true);
                        $('#ClienteListadodeConvenios').val(-1);  
                        $('#ClienteValorCredito1').show();
                        $('#ClienteConvenioSINO1').show();
                        $('#ClienteListadodeConvenios1').show();
                        $('#ClienteComisionConvenio1').show();
                        document.getElementById("ClienteConvenioSINO").checked = false;
                        document.getElementById("ClienteObservaciones").value = "";
                        document.getElementById("ClienteComisionConvenio").value = "";
                        document.getElementById("ClienteValorCredito").value = "";
                        document.getElementById("ClienteApellido").value = "";
                        document.getElementById("ClienteTipoDocumento").value = "";
                        $('#ClienteApellido').attr("disabled",true);
                        $('#ClienteTipoDocumento').attr("disabled",true);
                        localStorage.TipoCliente = 3;
                break;
                
                case 'Corporativo':
                        $('#ClienteListadodeConvenios').attr("disabled",true);
                        $('#ClienteListadodeConvenios').val(-1);  
                        $('#ClienteValorCredito1').show();
                        $('#ClienteConvenioSINO1').show();
                        $('#ClienteListadodeConvenios1').show();
                        $('#ClienteComisionConvenio1').hide();
                        document.getElementById("ClienteConvenioSINO").checked = false;
                        document.getElementById("ClienteObservaciones").value = "";
                        document.getElementById("ClienteComisionConvenio").value = "";
                        document.getElementById("ClienteValorCredito").value = "";
                        document.getElementById("ClienteApellido").value = "";
                        document.getElementById("ClienteTipoDocumento").value = "";
                        $('#ClienteApellido').attr("disabled",true);
                        $('#ClienteTipoDocumento').attr("disabled",true);
                        localStorage.TipoCliente = 2;
                break;
        
                default:
                        RadioTipoCliente('Particular');
                        break;
        }

}     
// aqui inicia brahyan 

function ConsultarClienteComprobanteNit(){


        /** era el ontenedor de la tabla, yo lo mande asi pero tambien sirve con hide mire cual es mejor */
        $('#CargaTablaMovimientosHabitacion').html("");
       
        var dt = $('#ComprobanteIngresoNitCliente').val();
        document.getElementById('ComporobanteIngresoReserva').value = "";
        document.getElementById('ComporobanteIngresoValorTotal').value = "";
        document.getElementById('ComporobanteIngresoAbono').value = "";
        document.getElementById('ComporobanteIngresoFaltaPagar').value = "";
        document.getElementById('ComporobanteIngresoNombreCliente').value = "";
        document.getElementById('ComporobanteIngresoTipoCliente').value = "";
       
        $('#CheckConvenio').bootstrapToggle('off') ;
        var Parametros = {
                "nit" : dt
        };
        
        var Parametros1 = {
                "NombreProceso" : "ConsultaClienteComprobante",
                "nit" : dt
        };


        $.ajax({
                data: Parametros1,
                url: "../modulos/facturacion/funciones.php",
                type: 'POST',
                success: function (response) {
                      if(response!=""){

                     
                        var conversion = JSON.parse(response);
                        document.getElementById("ComporobanteIngresoNombreCliente").value =  conversion[0].NombreCliente;
                        document.getElementById("ComporobanteIngresoTipoCliente").value = conversion[0].NombreClienteTipo  ;   
                        if(conversion[0].NombreClienteTipo == "CORPORATIVO" || conversion[0].NombreClienteTipo =="AGENCIA" && conversion[0].IdConvenio != null){
                                
                                var Parametros2 = {
                                        "NombreProceso" : "ConsultaConvenioComprobante",
                                        "nit" : dt
                                };

                                $.ajax({
                                        data: Parametros2,
                                        url: "../modulos/facturacion/funciones.php",
                                        type: 'POST',
                                        success: function (response) {
                                                if(response != ""){
                                                        var conversion = JSON.parse(response);
                                                                if(conversion[0].EstadoConvenio == "ACTIVO"){
                                                                        document.getElementById("CheckConvenio").disabled = false;
                                                                        $('#CheckConvenio').bootstrapToggle('on');
                                                                        document.getElementById("CheckConvenio").disabled = true;
                                                                        $("#MostrarConvenios").show();
                                                                        document.getElementById("ComporobanteNombreConvenio").value = conversion[0].CodigoConvenio + "  |  " +  conversion[0].NombreConvenio;
                                                                        
                                                                }
                                                }
                                        }
                                });
                        }
                       
                        else
                        {
                                document.getElementById("CheckConvenio").disabled = false; 
                                $('#CheckConvenio').bootstrapToggle('off');
                                document.getElementById("CheckConvenio").disabled = true;
                                document.getElementById("ComporobanteNombreConvenio").value = "";     
                                $("#MostrarConvenios").hide();
                        }
                   }
                }
        });

        $.ajax({
                data: Parametros,
                url: "../modulos/facturacion/ComprobanteIngresoListarDatos.php",
                type: 'POST',
                success: function (response) {
                      
                        $("#CargaTablaMovimientos").html(response);
                }
        });      
}

///////////////////////////
function ConsultarClienteEgresoNit(){


        /** era el ontenedor de la tabla, yo lo mande asi pero tambien sirve con hide mire cual es mejor */
        $('#CargaTablaMovimientosHabitacion').html("");
       
        var dt = $('#ComprobanteEgresoNitCliente').val();
        document.getElementById('ComporobanteEgresoReserva').value = "";
        document.getElementById('ComporobanteEgresoValorTotal').value = "";
        document.getElementById('ComporobanteEgresoAbono').value = "";
        document.getElementById('ComporobanteEgresoDebeEstadia').value = "";
        document.getElementById('ComporobanteEgresoNombreCliente').value = "";
        document.getElementById('ComporobanteEgresoTipoCliente').value = "";
       
       
        var Parametros = {
                "nit" : dt
        };
        
        var Parametros1 = {
                "NombreProceso" : "ConsultaClienteComprobante",
                "nit" : dt
        };


        $.ajax({
                data: Parametros1,
                url: "../modulos/facturacion/funciones.php",
                type: 'POST',
                success: function (response) {
                        var conversion = JSON.parse(response);
                        document.getElementById("ComporobanteEgresoNombreCliente").value =  conversion[0].NombreCliente;
                        document.getElementById("ComporobanteEgresoTipoCliente").value = conversion[0].NombreClienteTipo;   
                }
        });

        $.ajax({
                data: Parametros,
                url: "../modulos/facturacion/ComprobanteEgresoListarDatos.php",
                type: 'POST',
                success: function (response) {
                      
                        $("#CargaTablaMovimientos").html(response);
                }
        });      
}


/////////////////////////////////////////7


function CargarImprimirComprobante(){       
//ImprimirRecibo de Comprobante Ingreso 
                var concepto = $("#ComporobanteIngresoConcepto").val();
                var valorPagado = $("#ComporobanteIngresoValor").val();
                $("div#ReciboConcepto").text(concepto);
                $("div#ReciboValorPagado").text(valorPagado);
}

function ConsultarMovimientoHabitacion(dato,valorestadia,AbonoMovimiento){

        document.getElementById("ComporobanteIngresoReserva").value = dato; 
        document.getElementById("ComporobanteIngresoValorTotal").value = valorestadia; 
        $('#CheckTipoAbono').bootstrapToggle('off');

        var SaberValorAbonado = {
                "NombreProceso" : "ValorTotalAbonos",
                'CodigoReservaMovimiento': dato

        };
        $.ajax({
                data: SaberValorAbonado,
                url: "../modulos/facturacion/funciones.php",
                type: 'POST',
                success: function (response) {
                        var Abonos = JSON.parse(response);
                        // console.log(Abonos);
                        document.getElementById("ComporobanteIngresoAbono").value = AbonoMovimiento; 
                        /* document.getElementById("ComporobanteIngresoAbono").value = Abonos.AbonoTotal; */ 
                        document.getElementById("ComporobanteIngresoAbonoHabitaciones").value = Abonos.AbonoTotalHabitaciones; 
                        document.getElementById("ComporobanteIngresoFaltaPagar").value = valorestadia - Abonos.AbonoTotal; 
                        document.getElementById("ComporobanteIngresoAbonoGeneral").value = Abonos.AbonoTotal - Abonos.AbonoTotalHabitaciones;                    
                }
        });


        var Parametros = {'CodHabitacion':dato};        
        $.ajax({
                data: Parametros,
                url: "../modulos/facturacion/ComprobanteIngresoMovimientosHabitaciones.php",
                type: 'POST',
                success: function (response) {
                       $("#CargaTablaMovimientosHabitacion").html(response);
                       $(".ControlDataToggle").attr("disabled", true);
                }
        });
        $("#ListadoDatosHabitacion").show();
}

function LlamadoTablaEgreso(){
        $.ajax({
                data: "",
                url: "../modulos/facturacion/ComprobanteIngresoListarDatosImprimir.php",
                type: 'POST',
                success: function (response) {
                       $("#ListadoLlamadoEgresos").html(response);
                }
        });
}

function CalcularEdadFecha(){
        var CapturaFecha = document.getElementById("FechaNacimiento").value;
        /* var fechaNacimiento = CapturaFecha.substr(0,9); */
        var fechaNacimiento = CapturaFecha.substr(CapturaFecha);

        var FechaHoy = new Date();
        var cumpleanos = new Date(fechaNacimiento);
        var edad = FechaHoy.getFullYear() - cumpleanos.getFullYear();
        var m = FechaHoy.getMonth() - cumpleanos.getMonth();
    
        if (m < 0 || (m === 0 && FechaHoy.getDate() < cumpleanos.getDate())) {
            edad--;
        }
        // return edad;
        // console.log("ESTA ES LA FECHA "+fechaNacimiento);
        // console.log("LA EDAD ES "+edad);
        document.getElementById('CantidadAnos').value=edad;
       

}

function CargaDatosEgreso(Egreso){

        $("#CodigoEgreso").text(Egreso.IdIngresoComprobante);
        $("#FechaEgreso").text(Egreso.FechaIngresoComprobante.substr(0,10));
        $("#ValorPagadoEgreso").text(Egreso.ValorIngresoComprobante);
        $("#ValorLetrasEgreso").text(Egreso.ValorLetrasIngresoComprobante);
        /* $("#PagadoAEgreso").text(Egreso.NombreClienteIngresoComprobante); */
        $("#ConceptoEgreso").text(Egreso.ConceptoIngresoComprobante);
}



function ConsultarMovimientoHabitacionEgreso(dato,valorestadia,abono){

        document.getElementById("ComporobanteEgresoReserva").value = dato; 
        document.getElementById("ComporobanteEgresoValorTotal").value = valorestadia; 
        document.getElementById("ComporobanteEgresoAbono").value = abono; 

         var Parametros = {
                "NombreProceso" : "ConsultaClienteComprobanteEgreso",
                "NumeroReserva" : dato
         };

        $.ajax({
                data: Parametros,
                url: "../modulos/facturacion/funciones.php",
                type: 'POST',
                success: function (response) {
                        /* importante */
                        document.getElementById("ComporobanteEgresoDebeEstadia").value = valorestadia  - abono; 

                        var TotalDebeEstadia = valorestadia - abono;
                        if(TotalDebeEstadia == 0){
                                $('input#ComporobanteEgresoDebeEstadia').css({"background": "#5fd217", "color": "#FFF"});
                        }else if(TotalDebeEstadia > 0){
                                $('input#ComporobanteEgresoDebeEstadia').css({"background": "#d21717", "color": "#FFF"});
                        }
                        else{
                                $('input#ComporobanteEgresoDebeEstadia').css({"background": "#f0ad4e", "color": "#000"});
                        }
                }
        });



}


function CargaDatosAbono(NombreHabitacion){
       var NumeroReserva =  $("#ComporobanteIngresoReserva").val();
       var NumeroHabitacion = NombreHabitacion;
       var DocumentoCliente =  $("#ComprobanteIngresoNitCliente").val();
        document.getElementById("ComporobanteIngresoNumeroHabitacion").value  = NombreHabitacion;
        
        var Parametros = {
                "NumeroReserva":NumeroReserva,
                "NumeroHabitacion": NumeroHabitacion,
                "DocumentoCliente": DocumentoCliente,
                "NombreProceso" : "ConsultaValorHabitacion"
        };        
        $.ajax({
                data: Parametros,
                url: "../modulos/facturacion/funciones.php",
                type: 'POST',
                success: function (response) {
                        var Datos = JSON.parse(response);
                         var ValorHabitacion =  Datos[1].ValorHabitacion;
                         var bt =  Datos[1].ValorAbono;
                        
                                document.getElementById("ComporobanteIngresoValorHabitacion").value  = Datos[1].ValorHabitacion;
                                document.getElementById("ComporobanteIngresoAbonosHabitacion").value  = Datos[1].ValorAbono;
                               
                                if(bt == ""){
                                        document.getElementById("ComporobanteIngresoDebeHabitacion").value  = ValorHabitacion;
                                }else{
                                       
                                        document.getElementById("ComporobanteIngresoDebeHabitacion").value  = ValorHabitacion -  Datos[1].ValorAbono;
                                }
                        
                }
        });

        
        
}

function ComporobanteIngresoRegistrar(){

        var TipoAbono = document.getElementById('CheckTipoAbono').checked;
        var Reserva = document.getElementById('ComporobanteIngresoReserva').value;
        var DocumentoCliente =  $("#ComprobanteIngresoNitCliente").val();
        var ComporobanteIngresoValor =  $("#ComporobanteIngresoValor").val();
        var Concepto =  $("#ComporobanteIngresoConcepto").val();

        if(DocumentoCliente.trim() == ""){
                swal("Error","El campo Cedula no puede estar Vacio","warning");
        }else if(Reserva.trim() == ""){
                swal("Error","El campo numero de reserva no puede estar Vacio","warning");
        }else if(ComporobanteIngresoValor.trim() == ""){
                swal("Error","El campo valor Comprobante no puede estar Vacio","warning");
        }else if(Concepto.trim() == ""){
                swal("Error","El campo concepto no puede estar Vacio","warning");
        }else{
                if(TipoAbono == false){
                        /* alert("Entro por el lado de general"); */ /* FALSO */
                        var NumeroReserva =  $("#ComporobanteIngresoReserva").val();
                        var NumeroHabitacion = "";
                        var DocumentoCliente =  $("#ComprobanteIngresoNitCliente").val();
                        var NombreCliente =  $("#ComporobanteIngresoNombreCliente").val();
                        
                        var FormaPago =  $("#ComporobanteIngresoFormaPago").val();
                        var Abono =  $("#ComporobanteIngresoAbono").val();

                        Parametros = {
                                "NumeroReserva": NumeroReserva,
                                "NumeroHabitacion": NumeroHabitacion,
                                "DocumentoCliente": DocumentoCliente,
                                "NombreCliente": NombreCliente,
                                "ComporobanteIngresoValor": ComporobanteIngresoValor,
                                "FormaPago": FormaPago,
                                "Concepto": Concepto,
                                "Abono": Abono,
                                "TipoComprobante": "GENERAL",
                                "NombreProceso" : "IsertarComprobante"
                                };

                        $.ajax({
                                type: "POST",
                                url: "../modulos/facturacion/funciones.php",
                                data: Parametros,
                                success: function (response) {
                                        /* console.log(response); */
                                        $("#ReciboValorLetras").text(response);
                                }
                        });

                        /* cargar datos a el formato */
                        $('.LlamadoModal').modal({backdrop: 'static', keyboard: false});
                        $('.LlamadoModal').modal('show');
                        CargarImprimirComprobante();
                        

                }else{
                        var NumeroHabitacion = $("#ComporobanteIngresoNumeroHabitacion").val();
                       if(NumeroHabitacion.trim() == ""){

                       }else{
                            /* alert("Entro por el lado de Especifico"); */ /* VERDADERO */
                        var NumeroReserva =  $("#ComporobanteIngresoReserva").val();
                        var DocumentoCliente =  $("#ComprobanteIngresoNitCliente").val();
                        var NombreCliente =  $("#ComporobanteIngresoNombreCliente").val();
                        var ComporobanteIngresoValor =  $("#ComporobanteIngresoValor").val();
                        var FormaPago =  $("#ComporobanteIngresoFormaPago").val();
                        var Concepto =  $("#ComporobanteIngresoConcepto").val();
                        var Abono =  $("#ComporobanteIngresoAbono").val();
                        Parametros = {
                                "NumeroReserva": NumeroReserva,
                                "NumeroHabitacion": NumeroHabitacion,
                                "DocumentoCliente": DocumentoCliente,
                                "NombreCliente": NombreCliente,
                                "ComporobanteIngresoValor": ComporobanteIngresoValor,
                                "FormaPago": FormaPago,
                                "Concepto": Concepto,
                                "Abono": Abono,
                                "TipoComprobante": "HABITACION",
                                "NombreProceso" : "IsertarComprobante"
                                };

                        $.ajax({
                                type: "POST",
                                url: "../modulos/facturacion/funciones.php",
                                data: Parametros,
                                success: function (response) {
                                        $("#ReciboValorLetras").text(response);
                                }
                        });   
                       }

                       /* cargar datos a el formato */
                       $('.LlamadoModal').modal({backdrop: 'static', keyboard: false});
                       $('.LlamadoModal').modal('show');
                       CargarImprimirComprobante();
                        
                }

        }
}

/* registrar Convenios */
function ConvenioRegistrar(){
        var ConvenioCodigo =  $("#ConvenioCodigo").val();
        var ConvenioEstado =  $("#ConvenioEstado").val();
        var ConvenioNombre =  $("#ConvenioNombre").val();
        var ConvenioFechaInicio =  $("#ConvenioFechaInicio").val();
        var ConvenioFechaFinal =  $("#ConvenioFechaFinal").val();
       
        var ConvenioFormaPago = "";
        var FormaPago =  document.getElementById("ConvenioFormaPago").checked;
        if(FormaPago == true){
                ConvenioFormaPago = "CREDITO";
        }else{
                ConvenioFormaPago = "";
        }

        var Parametros = {
                "NombreProceso" : "IsertarConvenio",
                "ConvenioCodigo" : ConvenioCodigo,
                "ConvenioEstado" : ConvenioEstado,
                "ConvenioNombre" : ConvenioNombre,
                "ConvenioFechaInicio" : ConvenioFechaInicio,
                "ConvenioFechaFinal" : ConvenioFechaFinal,
                "ConvenioFormaPago" : ConvenioFormaPago
        };

        var fechaValida = FechaSalidaNoPuedeSerMenorAFechaEntrada(ConvenioFechaInicio,ConvenioFechaFinal);
        if(fechaValida == 1){
                swal("Error","No se Puede Guardar Verifique las Fechas","warning");
        }else{
                if(ConvenioCodigo == ""){
                        swal("Error","El campo Codigo no puede estar Vacio","warning");
                }else if(ConvenioEstado == ""){
                        swal("Error","El campo Estado no puede estar Vacio","warning");
                }else if(ConvenioNombre == ""){
                        swal("Error","El campo Nombre no puede estar Vacio","warning");
                }else if(ConvenioFechaInicio == ""){
                        swal("Error","El campo Fecha Inicio no puede estar Vacio","warning");
                
                }else if(ConvenioFechaFinal == ""){
                        swal("Error","El campo Fecha Final no puede estar Vacio","warning");
                        
                }
                else{
                        $.ajax({
                                type: "POST",
                                url: "../modulos/cliente/funciones.php",
                                data: Parametros,
                                success: function (response) {
                                        // console.log(response);
                                        if(response.trim() == "REGISTRO"){
                                                LimpiarCajas();    
                                                document.getElementById("ConvenioFormaPago").checked = false;
                                                var url = "../modulos/cliente/ConvenioListarDatos.php";
                                                                cargar(url,"ListadoDatosConvenio");
                                                swal("Bien!","Registrar convenio con Exito!!","success");            
                                        }else{
                                        swal("Error","No se pudo Registrar convenio","error");  
                                        }
                                }
                        });
                }


        }
}

function CargarConvenios(Arreglo){

        // console.log(Arreglo);
        
        $("#ActualizarConvenioIdentificador").val(Arreglo.IdConvenio);
        $("#ActualizarConvenioCodigo").val(Arreglo.CodigoConvenio);
        $("#ActualizarConvenioEstado").val(Arreglo.EstadoConvenio);
        $("#ActualizarConvenioNombre").val(Arreglo.NombreConvenio);
        if(Arreglo.FormaPagoConvenio == "CREDITO"){
                document.getElementById("ActualizarConvenioFormaPago").checked = true;
        }else{
                document.getElementById("ActualizarConvenioFormaPago").checked = false;
        }
        $("#ActualizarConvenioFechaInicio").val(Arreglo.InicioFechaConvenio);
        $("#ActualizarConvenioFechaFinal").val(Arreglo.FinFechaConvenio);
        
}

function ConvenioActualizar(){
        
        var Identificador =  $("#ActualizarConvenioIdentificador").val();
        var ConvenioCodigo =  $("#ActualizarConvenioCodigo").val();
        var ConvenioEstado =  $("#ActualizarConvenioEstado").val();
        var ConvenioNombre =  $("#ActualizarConvenioNombre").val();
        var ConvenioFechaInicio =  $("#ActualizarConvenioFechaInicio").val();
        var ConvenioFechaFinal =  $("#ActualizarConvenioFechaFinal").val();
       
        var ConvenioFormaPago = "";
        var FormaPago =  document.getElementById("ActualizarConvenioFormaPago").checked;
        if(FormaPago == true){
                ConvenioFormaPago = "CREDITO";
        }else{
                ConvenioFormaPago = "";
        }

        var Parametros = {
                "NombreProceso" : "ActualizarConvenio",
                "Identificador" : Identificador,
                "ConvenioCodigo" : ConvenioCodigo,
                "ConvenioEstado" : ConvenioEstado,
                "ConvenioNombre" : ConvenioNombre,
                "ConvenioFechaInicio" : ConvenioFechaInicio,
                "ConvenioFechaFinal" : ConvenioFechaFinal,
                "ConvenioFormaPago" : ConvenioFormaPago
        };

        /* console.log(Parametros); */
        if(Identificador == ""){
                swal("Error","El campo Identificador no puede estar Vacio","warning");
        }else if(ConvenioCodigo == ""){
                swal("Error","El campo Codigo no puede estar Vacio","warning");
        }else if(ConvenioEstado == ""){
                swal("Error","El campo Estado no puede estar Vacio","warning");
        }else if(ConvenioNombre == ""){
                swal("Error","El campo Nombre no puede estar Vacio","warning");
        }else if(ConvenioFechaInicio == ""){
                swal("Error","El campo Fecha Inicio no puede estar Vacio","warning");
        }else if(ConvenioFechaFinal == ""){
                swal("Error","El campo Fecha Final no puede estar Vacio","warning");
        }else{
                $.ajax({
                        type: "POST",
                        url: "../modulos/cliente/funciones.php",
                        data: Parametros,
                        success: function (response) {
                                // console.log(response);
                                if(response.trim() == "ACTUALIZO"){
                                        LimpiarCajas();    
                                        document.getElementById("ActualizarConvenioFormaPago").checked = false;
                                        var url = "../modulos/cliente/ConvenioListarDatos.php";
                                                        cargar(url,"ListadoDatosConvenio");
                                        swal("Bien!","Actualizado convenio con Exito!!","success");            
                                }else{
                                swal("Error","No se pudo actualizar convenio","error");  
                                }
                        }
                });
        }
}

function ListadoConvenios(){

        var CheckConvenio = document.getElementById("ClienteConvenioSINO").checked;
        if(CheckConvenio == true){
                $('#ClienteListadodeConvenios').attr("disabled",false);
                $('#ClienteListadodeConvenios').val(-1);
        }else{
                $('#ClienteListadodeConvenios').val(-1);
                $('#ClienteListadodeConvenios').attr("disabled",true);
        }
        

}

function ListadoConveniosActualizar(){

        var CheckConvenio = document.getElementById("ClienteConvenioSINOActualizar").checked;
        if(CheckConvenio == true){
                $('#ClienteListadodeConveniosActualizar').attr("disabled",false);
                $('#ClienteListadodeConveniosActualizar').val(-1);
        }else{
                $('#ClienteListadodeConveniosActualizar').val(-1);
                $('#ClienteListadodeConveniosActualizar').attr("disabled",true);
        }
        

}


function TraerFolios() {
        
         var Parametros = {
                                        "NombreProceso" : "TraerFolios",
                                        };
                                
                                $.ajax({
                                data : Parametros,
                                url : "../modulos/folio/funciones.php",
                                type : "post",

                                success : function(response)
                                        {
                                                                                                                                            
                                                $("#ConsultarFolioSelectFolios").append(response);                                                
                                        }

                                });
}
var FolioEscogido;
function TraerCompendioFolio()
{
    if($('#ConsultarFolioSelectFolios').val()=="")
    {

    }else{
        FolioEscogido=$('#ConsultarFolioSelectFolios').val();
        var Parametros = {
                "NombreProceso" : "TraerCompendioFolio",
                "IdFolio" : FolioEscogido,
                };
        
        $.ajax({
        data : Parametros,
        url : "../modulos/folio/funciones.php",
        type : "post",

        success : function(response)
                {                 
                        $('#ListaConsumos').html(response);
                        DatosDeFolio($('#ConsultarFolioSelectFolios').val());                                                                                         
                }

        });
        }
}
function DatosDeFolio(IdFolio)
{
        var Parametros = {
                                        "NombreProceso" : "DatosFolio",
                                        "IdFolio" : IdFolio,
                                        };
                                
                                $.ajax({
                                data : Parametros,
                                url : "../modulos/folio/funciones.php",
                                type : "post",

                                success : function(response)
                                        {
                                                var Datos=JSON.parse(response);
                                                if(response.trim()=="")
                                                {
                                                  swal("Advertencia","No hay registros disponbles...","warning");                                           
                                                }     
                                                                                                                        
                                                $("#FolioNombreHabitacion").html(Datos[0].NombreHabitacion);                                                
                                                $("#FolioFechaCreacion").html(Datos[0].FechaFolio);   
                                                $("#FolioResponsable").html(Datos[0].NombreResponsableMovimientoHabitacion);                                                    
                                        }

                                });
}

/*** juan sebastian torrees 20-06-2018 */

function EstadoActualCaja(){
        var Parametros = {  
                                                   "NombreProceso" : "ConsultarEstadoActualCaja",                                                                                                  
                                               };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {
                                
                                if(response.trim()=="")
                                {
                                  swal("Advertencia","Por favor realize la aberture de la caja","warning");                                           
                                }     
                               else{
                                var Datos=JSON.parse(response);
                                $("#AbrirCajaValorBase").html(Datos[0].ValorBaseCaja);                                                
                                $("#AbrirCajaValorActual").html(Datos[0].ValorActualCaja);   
                                $("#AbrirCajaObservacionesBase").html(Datos[0].ObservacionesCaja);                                                    
                                $("#AbrirCajaFecha").html(Datos[0].FechaCaja);                                                    
                                $("#AbrirCajaHoraApertura").html(Datos[0].HoraAperturaCaja);                                                    
                                $("#AbrirCajaHoraCierre").html(Datos[0].HoraCierreCaja);   

                                var f = new Date();
                                $("#FechaActualMostrar").html(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());                                                 
                                }
                        }
                });
}


function RegistarAberturaCaja()
{
        var AbrirIngresarCajaValorBase=$('#IngresarAbrirCajaValorBase').val();
        var AbrirIngresarCajaObservacionesBase=$('#IngresarAbrirCajaObservaciones').val();
        if(AbrirIngresarCajaValorBase!="" && AbrirIngresarCajaObservacionesBase!="")
        {
                var Parametros = {  
                        "NombreProceso" : "RegistarAberturaCaja",      
                        "CajaValorBase": AbrirIngresarCajaValorBase,
                        "CajaObservaciones":AbrirIngresarCajaObservacionesBase                                                                                            
                                };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {                                
                                if(response.trim()=="")
                                {
                                  swal("Advertencia","No hay registros disponbles...","warning");                                           
                                }    
                                if(response.trim()=="REGISTRO")
                                {
                                  swal("Información","Se ha abierto la caja correctamente...","success");                                           
                                }     
                                 if(response.trim()=="NOREGISTRO")
                             
                                 EstadoActualCaja();
                        }
                });
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
}

function RegistarCerradoCaja()
{
           var Parametros = {  
                        "NombreProceso" : "RegistarCerradoCaja",                                                                                                       
                                };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {                                
                                
                                 if(response.trim()=="")
                                {
                                  swal("Advertencia","Error 401","warning");                                           
                                } 
                                 if(response.trim()=="ACTUALIZO")
                                {
                                  swal("Información","Se ha cerrado la caja correctamente...","success");                                           
                                }     
                                 if(response.trim()=="NOACTUALIZO")
                                {
                                  swal("Advertencia","!No se no cerrado la caja","warning");                                           
                                }   
                                 EstadoActualCaja(); 
                        }
                });


}


/** ultimo cambio juan sebastian torres parra 11/0/2018 */


function RegristrarConsumosConsultarFolios()
{
        var IdHabitacionTraida=$('#RegistrarConsumosHabitacion').val();
        //alert(IdHabitacionTraida);
    
        var Parametros = {  
                "IdHabitacion": IdHabitacionTraida,
                "NombreProceso" : "RegristrarConsumosConsultarFolios",                                                                                                       
                        };
$.ajax({        
        data : Parametros,
        url : "../modulos/facturacion/funciones.php",
        type : "post",
        success : function(response)
                {      
                     $('#RegistrarConsumosFolio').html(response);
                     $('#AplicaraFolio').prop('disabled', false);
                     $('#AplicaraConsumos').prop('disabled', false);
                     
                                                
                }
        });
        
        
     
}
function RegistrarConsumosAgendarDatos()
{
        var IdFolio=$('#ConsultarFolioSelectFolios').val();
        var Parametros = {  
                "IdFolio": IdFolio,
                "NombreProceso" : "DatosFolio",                                                                                                       
                        };
$.ajax({        
        data : Parametros,
        url : "../modulos/folio/funciones.php",
        type : "post",
        success : function(response)
                {      
                        var Datos=JSON.parse(response);
                        if(response.trim()=="")
                        {
                          swal("Advertencia","No hay registros disponbles...","warning");                                           
                        }
                        swal({
                                title: "¿Aplicar consumos al folio:"+IdFolio,
                                text: "Los consumos seran aplicados al filio si acepta!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonClass: "btn-danger",
                                confirmButtonText: "Si, aplicar!",
                                closeOnConfirm: true
                                
                        }, 
                        function () {                                
                                $('#AplicaraProductos').prop('disabled', false);
                                $('#AplicaraServicios').prop('disabled', false);
                                $('#RegistrarConsumosHabitacion').prop('disabled', true);
                                $('#RegistrarConsumosFolio').prop('disabled', true);
                                $("#RegistrarConsumosInfoHabitacion").html(Datos[0].NombreHabitacion);                                                
                                $("#RegistrarConsumosNombre").html(Datos[0].NombreResponsableMovimientoHabitacion);
                                $('#RegistrarConsumosFolioMostrar').html(IdFolio);
                        });
                              
                                              
                }

               
        });
}

function CargarSelectProducto()
{        
        var TProducto=$('#RegistrarConsumosTipoProducto').val();
        var Parametros = {  
                "IdTipoProducto":TProducto,
                "NombreProceso" : "CargarSelectProductos",                                                                                                       
                        };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {             
                                console.log(response);
                                $('#RegistrarConsumosNombreProducto').html('<option value="">Seleccione el producto</option>');
                                $('#RegistrarConsumosNombreProducto').append(response);             
                                $('#RegistrarConsumosNombreProducto').prop("disabled",false); 
                                $('#RegistrarConsumosCantidadProducto').prop("disabled",false);  
                        }
                });
}
function CargarSelectServicios()
{        
        var TServicio= $('#RegistrarConsumosTipoServicio').val();
        var Parametros = {  
                "IdTipoServicio": TServicio,
                "NombreProceso" : "CargarSelectServicios",                                                                                                       
                        };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {                                             
                                $('#RegistrarConsumosNombreServicio').html('<option value="">Seleccione el servicio</option>');                         
                                $('#RegistrarConsumosNombreServicio').append(response);     
                                $('#RegistrarConsumosNombreServicio').prop("disabled",false);                
                                $('#RegistrarConsumosCantidadServicio').prop("disabled",false); 
                        }
                });
}

var RegistarConsumosContador=0;
var row;
var cortesia="NO APLICA";
var ValorProd;
var ValorSer;
function AggConsumoTabla()
{
        if(VaciosProductoAggTabla(0)==0)
        {
        RegistarConsumosContador++;
        var CodigoProducto=$('#RegistrarConsumosNombreProducto').val();
        var select = document.getElementById("RegistrarConsumosNombreProducto"), //El <select>
        text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
        var NombreProducto=text;
        var CantidadProducto=$('#RegistrarConsumosCantidadProducto').val();
        
        
        if($('#RegistrarProductoCortesia').prop('checked')==true)
        {
                cortesia="APLICA";
        }

                var Parametros = {  
                        "IdProducto": CodigoProducto,
                        "NombreProceso" : "TraerValorProducto",                                                                                                       
                                };
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {      
                                        ValorProd=response; 
                                        var ValorProducto=ValorProd*CantidadProducto;
                                        row='<tr><td>'+RegistarConsumosContador+'</td><td class="CodigoProducto">'+CodigoProducto+'</td><td>'+NombreProducto+'</td><td class="CantidadProducto">'+CantidadProducto+'</td><td class="ValorProducto">'+ValorProducto+'</td><td class="CortesiaProducto">'+cortesia+'</td>';
                                        $('#TablaConsumos').append(row);
                                        cortesia="NO APLICA";
                                                        
                                }
                        });
        
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
}

function AggConsumoTablaServicio()
{
        if(VaciosServiciosAggTabla(0)==0){
        RegistarConsumosContador++;
        var CodigoServicio=$('#RegistrarConsumosNombreServicio').val();
        var select = document.getElementById("RegistrarConsumosNombreServicio"), //El <select>
        text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
        var NombreServicio=text;
        var CantidadServicio=$('#RegistrarConsumosCantidadServicio').val();

        if($('#RegistrarServicioCortesia').prop('checked')==true)
        {
                cortesia="APLICA";
        }

        var Parametros = {  
                "IdServicio": CodigoServicio,
                "NombreProceso" : "TraerValorServicio",                                                                                                       
                        };
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {      
                                        
                                        ValorSer=response;
                                        var ValorServicio=ValorSer*CantidadServicio;
                                        row='<tr><td>'+RegistarConsumosContador+'</td><td class="CodigoServicio">'+CodigoServicio+'</td><td>'+NombreServicio+'</td><td class="CantidadServicio">'+CantidadServicio+'</td><td class="ValorServicio">'+ValorServicio+'</td><td class="CortesiaServicio">'+cortesia+'</td>';
                                        $('#TablaConsumos').append(row);
                                        //alert();
                                        cortesia="NO APLICA";
                                                        
                                }
                        });
        }else
        {
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
}

function VaciosProductoAggTabla(parametro)
{
        if(($('#RegistrarConsumosNombreProducto').val()=="") || ($('#RegistrarConsumosCantidadProducto').val()=="") || ($('#RegistrarConsumosCantidadProducto').val()<1))
        {
              return 1;  
        }else{
                return 0;
        }
}
function VaciosServiciosAggTabla(parametro)
{
        if($('#RegistrarConsumosNombreServicio').val()=="" || $('#RegistrarConsumosCantidadServicio').val()=="" || $('#RegistrarConsumosCantidadServicio').val()<1)
        {
              return 1;  
        }else{
                return 0;
        }
}



function RegistrarCS()
{
      
        var error=0;
        var ArrayCodigoProducto= new Array(); 
        $('.CodigoProducto').each(function(){
               ArrayCodigoProducto.push($(this).text());               
            });
            var ArrayCantidadProducto= new Array(); 
        $('.CantidadProducto').each(function(){
                ArrayCantidadProducto.push($(this).text());               
            });
        var ArrayValorProducto= new Array();    
        $('.ValorProducto').each(function(){
                ArrayValorProducto.push($(this).text());               
            });
            var ArrayCortesiaProducto= new Array();    
        $('.CortesiaProducto').each(function(){
                ArrayCortesiaProducto.push($(this).text());               
            });
            if(ArrayCodigoProducto.length<1)
            {                    
                    error=1;
            }else{
                var RegistrarConsumosFolio=$('#RegistrarConsumosFolioMostrar').text(); 
        
                var parametros = {
                                "CodigoProducto":ArrayCodigoProducto,
                                "CantidadProducto":ArrayCantidadProducto,
                                "ValorProducto":ArrayValorProducto,
                                "CortesiaProducto":ArrayCortesiaProducto,
                                "IdFolio":RegistrarConsumosFolio,   
                                "NombreProceso":"RegistrarConsumosProductos",
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/facturacion/funciones.php',
                        type:  'post',
                        beforeSend: function () 
                        {
                        },
                        success:  function (response) {   
                                if(response.trim()=="NOHAY")
                                {
                                       swal("Advertencia", "No hay productos suficientes en el inventario verifique las existencias", "warning"); 
                                }
                                swal("Bien", "Se han registrado los consumos", "success"); 
                                                                  
                        }
                });
            }                           
       
        /** servicios */
        var ServiciosRegistrados=0;
        //var Id = $('input.HuespedesId').val();
        var ArrayCodigoServicio= new Array(); 
        $('.CodigoServicio').each(function(){
               ArrayCodigoServicio.push($(this).text());               
            });
            var ArrayCantidadServicio= new Array(); 
        $('.CantidadServicio').each(function(){
                ArrayCantidadServicio.push($(this).text());               
            });
        var ArrayValorServicio= new Array();    
        $('.ValorServicio').each(function(){
                ArrayValorServicio.push($(this).text());               
            });
            var ArrayCortesiaServicio= new Array();    
        $('.CortesiaServicio').each(function(){
                ArrayCortesiaServicio.push($(this).text());               
            });
            if(ArrayCodigoServicio.length<1)
            {                    
                    error++;
            }else{
                
                var RegistrarConsumosFolio=$('#RegistrarConsumosFolioMostrar').text();         
       
                var parametros = {
                                "CodigoServicio":ArrayCodigoServicio,
                                "CantidadServicio":ArrayCantidadServicio,
                                "ValorServicio":ArrayValorServicio,
                                "CortesiaServicio":ArrayCortesiaServicio,
                                "IdFolio":RegistrarConsumosFolio,   
                                "NombreProceso":"RegistrarConsumosServicios",
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/facturacion/funciones.php',
                        type:  'post',
                        beforeSend: function () 
                        {
                        },
                        success:  function (response) {  
                                                        
                                swal("Bien", "Se han registrado los consumos", "success");                           
                        }
                       
                });
            }
            $('#TablaConsumos').html("");
          if(error>=2)
          {
                swal("Advertencia", "Debe ingresar almenos un servio o producto", "warning");  
          }         
          
}

var ValTotal=0;
function CotizacionAgregarProductoList()
{

        if(ValidarVaciosCotizacionAgregarProductoList(0)==0)
        {
        var CodigoProducto=$('#RegiatrarCotizacionIdProducto').val();
        var NombreProducto=$('#RegiatrarCotizacionIdProducto option:selected').text();
        var CantidadProducto=$('#RegiatrarCotizacionCantidadProducto').val();
        var Parametros = {  
                "IdProducto": CodigoProducto,
                "NombreProceso" : "TraerValorProductos",                                                                                                       
                        };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {      
                                var Datos=JSON.parse(response);
                                var ValorProducto=Datos[0].ValorProductos;
                                var Iva=Datos[0].ImpuestoProductoTipo;
                                var Impuesto=((ValorProducto * Iva) /100) * CantidadProducto;
                                var ValorTotal=(ValorProducto * CantidadProducto) + Impuesto;
                                row='<tr><td class="CotizacionTdIdProducto">'+CodigoProducto+'</td><td>'+NombreProducto+'</td><td  class="CotizacionTdCantidadProducto">'+CantidadProducto+'</td><td>'+Impuesto+'</td><td class="CotizacionTdValorProducto">'+ValorTotal+'</td>';
                                $('#Registroproductos').append(row);
                                $('.table-responsive').removeClass('hidden');
                                ValTotal+=ValorTotal;
                                $('#TotalCotizado').val(ValTotal);
                                                
                        }
                });
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
       
}
/** */

function CotizacionAgregarServiciosList()
{
          if(ValidarVaciosCotizacionAgregarServicioList(0)==0)
        {
        var CodigoServicio=$('#RegiatrarCotizacionIdServicio').val();
        var NombreServicio=$('#RegiatrarCotizacionIdServicio option:selected').text();
        var CantidadServicio=$('#RegiatrarCotizacionCantidadServicio').val();
        var Parametros = {  
                "IdServicio": CodigoServicio,
                "NombreProceso" : "TraerValorServicios",                                                                                                       
                        };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {      
                                var Datos=JSON.parse(response);
                                var ValorServicio=Datos[0].ValorServicios;
                                var Iva=Datos[0].ImpuestoServicios;                                
                                var Impuesto=((ValorServicio * Iva) /100) * CantidadServicio;
                                
                                var ValorTotal=(ValorServicio * CantidadServicio) + Impuesto;
                                
                                row='<tr><td class="CotizacionTdIdServicio">'+CodigoServicio+'</td><td>'+NombreServicio+'</td><td  class="CotizacionTdCantidadServicio">'+CantidadServicio+'</td><td>'+Impuesto+'</td><td class="CotizacionTdValorServicio">'+ValorTotal+'</td>';
                                $('#Registroproductos').append(row);
                                $('.table-responsive').removeClass('hidden');
                                ValTotal+=ValorTotal;
                                
                                $('#TotalCotizado').val(ValTotal);
                                                
                        }
                });
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos!", "warning");
        }
}



/** */
function AgregarEstadiaList()
{
        var IdProducto=0;
        if(ValidarVaciosListarEstadia(0)==0)
        {
                if($("#RegiatrarCotizacionDesayuno").is(':checked')) 
                {  
                        IdProducto=$('#RegiatrarCotizacionIdProducto1').val();
                }else
                {
                        IdProducto=0;
                }
        
        var TipoHabitacion=$('#RegiatrarCotizacionTipoHabitacion').val();
        var CantidadPax=$('#RegiatrarCotizacionPax').val();
        var FechaEntrada=$('#RegiatrarCotizacionFechasEntrada').val();
        var FechaSalida=$('#RegiatrarCotizacionFechasSalida').val();
        var Tarifa=$('#RegiatrarCotizacionTarifa').val();
        var CantidadDias;
        var Parametros = {  
                "IdTipoHabitacion": TipoHabitacion,
                "FechaEntrada":FechaEntrada,
                "FechaSalida":FechaSalida,
                "IdProducto":IdProducto,
                "NombreProceso" : "CotizarEstadia",                                                                                                       
                        };
        $.ajax({        
                data : Parametros,
                url : "../modulos/facturacion/funciones.php",
                type : "post",
                success : function(response)
                        {      
                                var Datos=JSON.parse(response);
                                //console.log(response);
                                var ValorPaxHabitacionTipo=Datos[0].ValorPaxHabitacionTipo;
                                var Iva=Datos[1].PorcentajeIva;
                                var CantidadDias=Datos[2];
                              
                                var Impuesto=((ValorPaxHabitacionTipo * Iva) /100) * CantidadDias;
                                var ValorTotal=(ValorPaxHabitacionTipo * CantidadDias) + Impuesto;
                                var SubTotal=(ValorTotal * Tarifa) / 100 ;
                               // alert(SubTotal);
                              
                                
                                ValorTotal=ValorTotal - SubTotal;
                                if(IdProducto==0){

                                }else{
                                 var ValorDesayunos=Datos[3].ValorProductos;
                                 var ValorDesayunos=ValorDesayunos * CantidadPax;
                                 ValorTotal=ValorTotal+ValorDesayunos;
                                }
                                row='<tr><td class="ObservacionesEstadia">0000</td><td class="ObservacionesEstadia">ESTADIA</td><td class="ObservacionesEstadia">'+CantidadDias+'</td><td class="ObservacionesEstadia">'+Impuesto+'</td><td class="ObservacionesEstadia">'+ValorTotal+'</td';
                                $('#Registroproductos').append(row);
                                $('.table-responsive').removeClass('hidden'); 
                                ValTotal+=ValorTotal;
                                $('#TotalCotizado').val(ValTotal);                                
                                                
                        }
                });
        }else{
                swal("¡Error!", "¡Diligencie correctamente los campos (fechas,números,datos)", "warning");  
        }

}


function ValidarVaciosListarEstadia(id)
{
        if($('#RegiatrarCotizacionFechasEntrada').val()>=$('#RegiatrarCotizacionFechasSalida').val()||$('#RegiatrarCotizacionTipoHabitacion').val()=="" || $('#RegiatrarCotizacionPax').val()=="" || $('#RegiatrarCotizacionFechasEntrada').val()=="" || $('#RegiatrarCotizacionFechasSalida').val()=="" || $('#RegiatrarCotizacionTarifa').val()=="")
        {        
               return 1;
        }else{
                return 0;
        }
}
function ValidarVaciosCotizacionAgregarProductoList(id)
{
        if($('#RegiatrarCotizacionIdProducto').val()==""||$('#RegiatrarCotizacionCantidadProducto').val()=="")
        {
                return 1;
        }else
        {
                return 0;
        }
}
function ValidarVaciosCotizacionAgregarServicioList(id)
{
        if($('#RegiatrarCotizacionIdServicio').val()==""||$('#RegiatrarCotizacionCantidadServicio').val()=="")
        {
                return 1;
        }else
        {
                return 0;
        }
}
function ValidarDatosCliente(id)
{
        if($('#RegiatrarCotizacionNombre').val()=="" || $('#RegiatrarCotizacionNit').val()=="" || $('#RegiatrarCotizacionTelefono').val()=="" || $('#RegiatrarCotizacionCorreo').val()=="" || $('#RegistroCotizacionPlazo').val()=="")
        {
                return 1;                
        }else{
                return 0;
        }
}

function GuardarCotizacion()
{      
        if(ValidarVaciosListarEstadia(0)==0)
        {
                if(ValidarDatosCliente(0)==0){
                var ArrayObservacionesEstadia= new Array(); 
                $('.ObservacionesEstadia').each(function(){
                        ArrayObservacionesEstadia.push($(this).text());               
                    });      
                if(ArrayObservacionesEstadia.length<=0)
                {
                        swal("Adventencia", "Diligencia los datos de la estadia", "warning");  
                }else{ 

                var NombreCliente=$('#RegiatrarCotizacionNombre').val();
                var DocumentoCliente=$('#RegiatrarCotizacionNit').val();
                var TelefonoCliente=$('#RegiatrarCotizacionTelefono').val();
                var CorreoCliente=$('#RegiatrarCotizacionCorreo').val();    
                var DatosCliente=NombreCliente+"-"+DocumentoCliente+"-"+TelefonoCliente+"-"+CorreoCliente;
                var TipoHabitacion=$('#RegiatrarCotizacionTipoHabitacion').val();
                var FechaEntrada=$('#RegiatrarCotizacionFechasEntrada').val();
                var FechaSalida=$('#RegiatrarCotizacionFechasSalida').val();
                var PlazoCotizacion=$('#RegistroCotizacionPlazo').val();
                var ValorCotizizacion=$('#TotalCotizado').val();            
                var Parametros = {  
                        "DatosCliente": DatosCliente,
                        "FechaEntrada":FechaEntrada,
                        "FechaSalida":FechaSalida,        
                        "TipoHabitacion":TipoHabitacion,
                        "PlazoCotizacion":PlazoCotizacion,                        
                        "ValorCotizizacion":ValorCotizizacion,
                        "Obervacionescotizacion":ArrayObservacionesEstadia,
                        "NombreProceso" : "GuardarCotizacion",                                                                                                       
                                };
                
                
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {      
                                        if(response.trim()=="REGISTRO")
                                        {
                                                var IdProductos= new Array();
                                                $('.CotizacionTdIdProducto').each(function(){
                                                        IdProductos.push($(this).text());               
                                                    });  
                                                var CantidadProductos=new Array();
                                                $('.CotizacionTdCantidadProducto').each(function(){
                                                        CantidadProductos.push($(this).text());               
                                                    });  
                                                var ValorProductos=new Array();
                                                $('.CotizacionTdValorProducto').each(function(){
                                                        ValorProductos.push($(this).text());               
                                                    }); 

                                                    if(IdProductos.length>0)
                                                    {  
                                                        Parametros={
                                                                "IdProductos":IdProductos,
                                                                "CotizacionTdCantidadProducto":CantidadProductos,
                                                                "CotizacionTdValorProducto":ValorProductos,
                                                                "NombreProceso":"RegistrarProductosCotizacion"
                                                        }
                                                    $.ajax({        
                                                        data : Parametros,
                                                        url : "../modulos/facturacion/funciones.php",
                                                        type : "post",
                                                        success : function(response)
                                                                { 
                                                                }
                                                        });                                                                  
                                                        }else{
                                                               
                                                                swal("Bien", "Se ha registrado la cotizacion correctamente", "success");    
                                                                $('#BotonImprimir').prop('disabled',false);
                                                        }

                                 
                                                                                        var IdServicios= new Array();
                                                                                        $('.CotizacionTdIdServicio').each(function(){
                                                                                                IdServicios.push($(this).text());               
                                                                                            });  
                                                                                        var CantidadServicios=new Array();
                                                                                        $('.CotizacionTdCantidadServicio').each(function(){
                                                                                                CantidadServicios.push($(this).text());               
                                                                                            });  
                                                                                        var ValorServicios=new Array();
                                                                                        $('.CotizacionTdValorServicio').each(function(){
                                                                                                ValorServicios.push($(this).text());               
                                                                                            }); 
                                        
                                                                                        if(IdServicios.length>0)
                                                                                        {  
                                                                                                Parametros={
                                                                                                        "IdServicios":IdServicios,
                                                                                                        "CantidadServicios":CantidadServicios,
                                                                                                        "ValorServicios":ValorServicios,
                                                                                                        "NombreProceso":"RegistrarServiciosCotizacion"
                                                                                                }
                                                                                            $.ajax({        
                                                                                                data : Parametros,
                                                                                                url : "../modulos/facturacion/funciones.php",
                                                                                                type : "post",
                                                                                                success : function(response)
                                                                                                        { 
                                                                                                                                                                                                                        
                                                                                                          }  });
                                                                                        }
                                                swal("Bien", "Se ha registrado la cotizaciòn","success");
                                                $('#BotonImprimir').prop('disabled',false);

                                        }
                                        if(response.trim()=="NOREGISTRO")
                                        {
                                                swal("Advertencia", "No se ha registrado la cotizaciòn","warning");  
                                        }
                                                        
                                }
                        });
                }
        }else{
                swal("Adventencia", "¡Diligencie correctamente los del cotizante", "warning");
        }
        }
        else{
                swal("Adventencia", "¡Diligencie correctamente los campos", "warning");  
        }
}
   


/** ultimo cambio juan sebastian torres parra 11/0/2018 */


/*++*
**/
function RegistrarTipoServicios()
{

        var NombreTipoServicio=$('#TipoServiciosNombre').val();
        var ImpuestoTipiServicio=$('#TipoServiciosImpuesto').val();
        var CentroContableTipoServicios=$('#TipoServiciosCentroContable').val();
        var CuentaContableTipoServicios=$('#TipoServiciosCuentaContable').val();
        var ConceptoContableTipoServicios=$('#TipoServiciosConceptoContable').val();
        var ObservacionesTipoServicios=$('#TipoServiciosObservaciones').val();
        if(NombreTipoServicio=="" || ImpuestoTipiServicio=="" ||CentroContableTipoServicios=="" || CuentaContableTipoServicios=="" || ConceptoContableTipoServicios=="" || ObservacionesTipoServicios=="")
        {
                swal("Advertencia", "Debe diligenciar todos los campos correctamente", "warning"); 
        }
        var parametros = {
                "TipoServiciosNombre":NombreTipoServicio,
                "TipoServiciosImpuesto":ImpuestoTipiServicio,
                "TipoServiciosCentroContable":CentroContableTipoServicios,
                "TipoServiciosCuentaContable":CuentaContableTipoServicios,
                "TipoServiciosConceptoContable":ConceptoContableTipoServicios,  
                "TipoServiciosObservaciones":ObservacionesTipoServicios,
                "NombreProceso":"RegistrarTipoServcios",
                };
$.ajax({
        data:  parametros,
        url:   '../modulos/inventario/Funciones.php',
        type:  'post',
        beforeSend: function () 
        {
        },
        success:  function (response) {           
                if(response.trim()=="REGISTRO")
                {
                       swal("Bien", "Se han registrado la clasificación correctamente", "success"); 
                }else{
                        swal("Advertencia","No se ha registrado la clasificacòn","success")
                }                                     
        }
});  
}

/***
 * 
 * 
 * 
 * 
 * 
 * 
 */
var IndiceFila;
function TraladarConsumosForm(IdConsumo,ConsumoNombre,ConsumoValor,index)        
{
        $('#CodigoConsumo').html(IdConsumo);
        $('#NombreConsumo').html(ConsumoNombre);
        $('#ValorConsumo').html(ConsumoValor);
        IndiceFila=index;
}
function TraladarConsumos()
{
      
        var FolioTraladado=$('#SelectIdFolioTraslado').val();
        var IdConsumo=$('#CodigoConsumo').text();
        
        var Parametros={
                "NombreProceso":"TraladarConsumos",
                "IdConsumo":IdConsumo,
                "FolioAntiguo":FolioEscogido,
                "FolioNuevo":FolioTraladado,
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/folio/funciones.php',
                type:  'post',
                beforeSend: function () 
                {
                },
                success:  function (response) { 
                        if(response.trim()=="TRASLADO")
                        {
                                swal("Bien","Trasladado", "success"); 
                        }                                                                     
                }
        }); 
        $("#fila" + IndiceFila).remove();

}


var Oferta=1;

 function AgregarOferta()       
 {
        Oferta++;
         $('#Registroproductos').append('<tr><td>Codigo</td><td>Nombre</td><td>Cantidad</td><td>Impuesto / Iva</td><td>Valor</td> ');        
 }
 var i=0;
 function TraerFolioFacturacion(IdFolio)
 {
        TraerValorSeguroFacturacion(IdFolio);
        TraerValorEstadiaFacturacion(IdFolio);
        TraerAbonosFolioFacturacion(IdFolio);        
        var Parametros={
                "NombreProceso":"TraerFolioFacturacion",
                "IdFolio":IdFolio,
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/facturacion/funciones.php',
                type:  'post',
                success:  function (response) { 
                        var Datos=JSON.parse(response);
                        var Filas=0;
                        Filas=Datos.length;
                        var indice=0;
                        if(response.trim()=="[]")
                        {
                                swal("Mal","El la habitacion seleccionada no tiene consumos..","warning");
                        }else{
                                while(indice<Filas)
                                {                                
                                        var Impuesto=CalcularImpuesto(Datos[indice].ValorConsumos,Datos[indice].ImpuestoConsumo);
                                        var ValorFinal=0;

                                        ValorFinal=CalcularValor(Datos[indice].ValorConsumos,Impuesto,Datos[indice].CantidadConsumos);
                                        ValoresFactSumatoria(Impuesto,ValorFinal,0,0,0);


                                        ValorFinal=ValorFinal;
                                        Impuesto=Impuesto;
                                        var Row="<tr id='fila"+i+"'><td class='FacturacionIdFolio'>"+IdFolio+"</td><td class='FacturaIdConsumo'>"+Datos[indice].IdConsumos+"</td><td class='FacturaNombreConsumo'>"+Datos[indice].NombreConsumo+"</td><td class='FacturaCantidadConsumo'>"+Datos[indice].CantidadConsumos+"</td><td class='FacturaImpuestoConsumo'>"+Impuesto+"</td><td class='FacturaValorConsumo'>"+ValorFinal+"</td><td><div class='checkbox'><label><input class='AplicarFact' type='checkbox' value=''>Facturar</label></div></td><tr>";
                                        $('#TablaResumen').append(Row);
                                        indice++;
                                        i++;
                                        
                                }
                                
                        }
                        
                        //  $('#TablaResumen').append(response);
                }
        }); 
        
        var NombreBoton="#IdFolioBtn"+IdFolio;                        
        $(NombreBoton).addClass("disabled");
        
 }


 function TraerValorSeguroFacturacion(IdFolio)
 {
        var Parametros={
                "NombreProceso":"TraerValorSeguroFacturacion",
                "IdFolio":IdFolio
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/facturacion/funciones.php',
                type:  'post',
                beforeSend: function () {
                        console.log("esperando...");
                  },
                success:  function (response) {
                        
                        if(response.trim()=="" ||response.trim()=="[]")
                        {
                                console.log("response: "+response);
                        }else{          
                                var Datos=JSON.parse(response);                      
                                ValoresFactSumatoria(0,Datos[0].ValorSeguros,0,0,0);
                                var ValorFinal=Datos[0].ValorSeguros;
                                var Row="<tr id='fila"+i+"'><td class='FacturacionIdFolioSg'>"+IdFolio+"</td><td class='FacturacionCodigoSg'>44444</td><td class='FacturacionNombreSg'>SEGURO HOTELERO</td><td class='FacturacionCantidadSg'>"+Datos[0].CantidadSeguros+"</td><td class='FacturacionImpuestoSg'>0</td><td class='FacturacionValorSg'>"+ValorFinal+"</td><td><div class='checkbox'><label><input class='AplicarFactSg' type='checkbox' value=''>Facturar</label></div></td><tr>";
                                $('#TablaResumen').append(Row);
                                i++;
                        }
                        
                }});
 }
 function TraerAbonosFolioFacturacion(IdFolio)
 {
        var Parametros={
                "NombreProceso":"TraerAbonosFolioFacturacion",
                "IdFolio":IdFolio,
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/facturacion/funciones.php',
                type:  'post',
                success:  function (response) {
                        if(response.trim()=="")
                        {

                        }else{
                                ValoresFactSumatoria(0,0,0,response,0);
                        }
                        
                }});
 }

 function TraerValorEstadiaFacturacion(IdFolio)
 {
        var Parametros={
                "NombreProceso":"TraerValorEstadiaFacturacion",
                "IdFolio":IdFolio,
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/facturacion/funciones.php',
                type:  'post',
                success:  function (response) {

                        var Datos=JSON.parse(response);
                        var ValorEstadia=Datos[0].ValorEstadiaFolio;
                        var Iva=Datos[1].PorcentajeIva;
                        var Impuesto=CalcularImpuesto(ValorEstadia,Iva);
                        var ValorFinal=0; 

                        ValorFinal=CalcularValor(Datos[0].ValorEstadiaFolio,Impuesto,1);

                        ValoresFactSumatoria(Impuesto,ValorFinal,0,0,0); 

                        ValorFinal=ValorFinal;
                        Impuesto=Impuesto

                        var Row="<tr id='fila"+i+"'><td class='FacturacionIdFolioEs'>"+IdFolio+"</td><td class='FacturacionCodigoEs'>5555</td><td class='FacturacionNombreEs'>SERVICIO DE HOSPEDAJE Y ESTADIA</td><td class='FacturacionCantidadEs'>"+Datos[0].NOCHES+"/NOCHES </td><td class='FacturacionImpuestoEs'>"+Impuesto+"</td><td class='FacturacionValorEs'>"+ValorFinal+"</td><td><div class='checkbox'><label><input class='AplicarFactEs' type='checkbox' value=''>Facturar</label></div></td><tr>";
                        $('#TablaResumen').append(Row);
                        i++;
                 }});
 }



 function CalcularImpuesto(ValorProducto,ImpuesProducto)
 {
        var Subtotal,Total;
        Subtotal=(parseFloat(ValorProducto) * parseFloat(ImpuesProducto))/100;
        return Subtotal;
 }
 function CalcularValor(ValorProducto,ImpuesProducto,Cantidad)
 {
        var Subtotal=0;
        var Total=0;
        Subtotal=parseFloat(ValorProducto)+parseFloat(ImpuesProducto);
        Total=(Subtotal*Cantidad);
        return Total;
 }
        
 function MASK(form, n, mask, format) {
        if (format == "undefined") format = false;
        if (format || NUM(n)) {
          dec = 0, point = 0;
          x = mask.indexOf(".")+1;
          if (x) { dec = mask.length - x; }
      
          if (dec) {
            n = NUM(n, dec)+"";
            x = n.indexOf(".")+1;
            if (x) { point = n.length - x; } else { n += "."; }
          } else {
            n = NUM(n, 0)+"";
          } 
          for (var x = point; x < dec ; x++) {
            n += "0";
          }
          x = n.length, y = mask.length, XMASK = "";
          while ( x || y ) {
            if ( x ) {
              while ( y && "#0.".indexOf(mask.charAt(y-1)) == -1 ) {
                if ( n.charAt(x-1) != "-")
                  XMASK = mask.charAt(y-1) + XMASK;
                y--;
              }
              XMASK = n.charAt(x-1) + XMASK, x--;
            } else if ( y && "$0".indexOf(mask.charAt(y-1))+1 ) {
              XMASK = mask.charAt(y-1) + XMASK;
            }
            if ( y ) { y-- }
          }
        }
        return XMASK;
      }
      
      // Convierte una cadena alfanumérica a numérica (incluyendo formulas aritméticas)
      //
      // s   = cadena a ser convertida a numérica
      // dec = numero de decimales a redondear
      //
      // La función devuelve el numero redondeado
      
      function NUM(s, dec) {
        for (var s = s+"", num = "", x = 0 ; x < s.length ; x++) {
          c = s.charAt(x);
          if (".-+/*".indexOf(c)+1 || c != " " && !isNaN(c)) { num+=c; }
        }
        if (isNaN(num)) { num = eval(num); }
        if (num == "")  { num=0; } else { num = parseFloat(num); }
        if (dec != undefined) {
          r=.5; if (num<0) r=-r;
          e=Math.pow(10, (dec>0) ? dec : 0 );
          return parseInt(num*e+r) / e;
        } else {
          return num;
        }
      }

      function EliminarFilas(index)
      {
        $("#fila" + index).remove();
      }

      var ValoresFactIva=0,ValoresFactSubTotal=0,ValoresFactFacturado=0,ValoresFactAbonado=0;

      function ValoresFactSumatoria(FactIva,FactSubTotal,FactFacturado,FactAbonado,FactApagar)
      {
                ValoresFactAbonado+=parseFloat(FactAbonado);
                ValoresFactIva+=parseFloat(FactIva);
                ValoresFactSubTotal+=parseFloat(FactSubTotal);
                ValoresFactFacturado+=parseFloat(FactFacturado);

                $('#SumAbonado').html(ValoresFactAbonado);
                $('#SumIva').html(ValoresFactIva);
                $('#SumSubTotal').html(ValoresFactSubTotal-ValoresFactIva);
                $('#SumTotalFact').html(ValoresFactFacturado);
                $('#SunTotalPagar').html(ValoresFactSubTotal+ValoresFactIva);
      }

      var ArrayFacturacionIdFolio= new Array();
      var ArrayFacturaIdConsumo=new Array(); 
      var ArrayFacturacionNombreConsumo= new Array();
      var ArrayFacturaCantidadConsumo=new Array();
      var ArrayFacturaImpuestoConsumo=new Array();
      var ArrayFacturaValorConsumo=new Array();
      var ArrayAplicarFact= new Array();

      var ArrayFacturacionIdFolioEs = new Array();
      var ArrayFacturacionCodigoEs= new Array();
      var ArrayFacturacionNombreEs= new Array();
      var ArrayFacturaCantidadEs=new Array();
      var ArrayFacturaValorEs=new Array(); 
      var ArrayFacturaImpuestoEs=new Array();
      var ArrayAplicarFactEs= new Array(); 

      var ArrayFacturacionIdFolioSg= new Array();
      var ArrayFacturacionCodigoSg= new Array();
      var ArrayFacturacionNombreSg= new Array();
      var ArrayFacturaCantidadSg=new Array();
      var ArrayFacturaImpuestoSg=new Array();
      var ArrayFacturaValorSg=new Array();
      var ArrayAplicarFactSg= new Array();
      var FacturacionRowsEnviar= new Array();

var RegistrarFacturaNombre;
var RegistrarFacturaNit;
var RegistrarFacturaTelefono;
var RegistraFacturaDireccion;

function ReiniciarFacturacion()
{
        var RegistrarFacturaNombre = 0;
        var RegistrarFacturaNit = 0;
        var RegistrarFacturaTelefono = 0;
        var RegistraFacturaDireccion = 0;
        var ArrayFacturacionIdFolio= "";
        var ArrayFacturaIdConsumo=""; 
        var ArrayFacturacionNombreConsumo= "";
        var ArrayFacturaCantidadConsumo="";
        var ArrayFacturaImpuestoConsumo="";
        var ArrayFacturaValorConsumo="";
        var ArrayAplicarFact= "";
        
        var ArrayFacturacionIdFolioEs = "";
        var ArrayFacturacionCodigoEs= "";
        var ArrayFacturacionNombreEs= "";
        var ArrayFacturaCantidadEs="";
        var ArrayFacturaValorEs=""; 
        var ArrayFacturaImpuestoEs="";
        var ArrayAplicarFactEs= ""; 
        
        var ArrayFacturacionIdFolioSg= "";
        var ArrayFacturacionCodigoSg= "";
        var ArrayFacturacionNombreSg= "";
        var ArrayFacturaCantidadSg="";
        var ArrayFacturaImpuestoSg="";
        var ArrayFacturaValorSg="";
        var ArrayAplicarFactSg= "";
        var FacturacionRowsEnviar = "";
}


function FacturarSeleccionados()
{
       
        
        if(FacturarDatosCliente()==1)
        {
                swal("Advertencia","Debe completar los campos del cliente","warning");
        }else{
                
         
        $('.FacturaNombreConsumo').each(function(){
                ArrayFacturacionNombreConsumo.push($(this).text());             
            });    
        $('.FacturaCantidadConsumo').each(function(){
                ArrayFacturaCantidadConsumo.push($(this).text());             
            });      
        $('.FacturacionIdFolio').each(function(){
                ArrayFacturacionIdFolio.push($(this).text());             
            });         
        $('.FacturaIdConsumo').each(function(){
                ArrayFacturaIdConsumo.push($(this).text());               
            });        
        $('.FacturaImpuestoConsumo').each(function(){                
                ArrayFacturaImpuestoConsumo.push($(this).text());               
            });            
        $('.FacturaValorConsumo').each(function(){               
                ArrayFacturaValorConsumo.push($(this).text());     
            });                
        $('.AplicarFact').each(function(){
                if ($(this).is(":checked")){
                        ArrayAplicarFact.push("si");  
                        FacturacionRowsEnviar+=$(this).parents("tr");
                        $(this).parents("tr").remove();                       
                    }else{
                        ArrayAplicarFact.push("no");
                    }                              
            });
/*-----------------------------------Estadia-----------------------*/ 
        $('.FacturacionCodigoEs').each(function(){               
                ArrayFacturacionCodigoEs.push($(this).text());     
            });  
        $('.FacturacionNombreEs').each(function(){               
                ArrayFacturacionNombreEs.push($(this).text());     
            }); 
        $('.FacturacionCantidadEs').each(function(){               
                ArrayFacturaCantidadEs.push($(this).text());     
            });    
        $('.FacturacionIdFolioEs').each(function(){               
                ArrayFacturacionIdFolioEs.push($(this).text());     
            });
        $('.FacturacionValorEs').each(function(){               
                ArrayFacturaValorEs.push($(this).text());     
            });            
        $('.FacturacionImpuestoEs').each(function(){                
                ArrayFacturaImpuestoEs.push($(this).text());               
            });                         
        $('.AplicarFactEs').each(function(){
                if ($(this).is(":checked")){
                        ArrayAplicarFactEs.push("si");
                        FacturacionRowsEnviar+=$(this).parents("tr");
                        $(this).parents("tr").remove();
                    }else{
                        ArrayAplicarFactEs.push("no");
                    }                              
            });
/*-----------------------------------Estadia-----------------------*/
        $('.FacturacionCodigoSg').each(function(){               
                ArrayFacturacionCodigoSg.push($(this).text());     
        });  
        $('.FacturacionNombreSg').each(function(){               
                ArrayFacturacionNombreSg.push($(this).text());     
        }); 
        $('.FacturacionCantidadSg').each(function(){               
                ArrayFacturaCantidadSg.push($(this).text());     
        });                     
        $('.FacturacionIdFolioSg').each(function(){
                ArrayFacturacionIdFolioSg.push($(this).text());               
            });                        
        $('.FacturacionImpuestoSg').each(function(){
                
                ArrayFacturaImpuestoSg.push($(this).text());               
            });            
        $('.FacturacionValorSg').each(function(){
               
                ArrayFacturaValorSg.push($(this).text());     
            });             
        $('.AplicarFactSg').each(function(){
                if ($(this).is(":checked")){
                        ArrayAplicarFactSg.push("si");
                        FacturacionRowsEnviar+=$(this).parents("tr");
                        $(this).parents("tr").remove();
                    }else{
                        ArrayAplicarFactSg.push("no");
                    }                              
            });
/**** ------------------   Registro Factura          ------------------------ */

        var ValorSub=0;
        var ValorIva=0;
        var ValorSum=0;
        var Indicador=0;
        var CantidadValores=ArrayFacturacionIdFolio.length;
        if(CantidadValores==0)
        {
                CantidadValores=ArrayFacturacionIdFolioEs.length;
                while(Indicador<CantidadValores)
                {
                        if(ArrayAplicarFactSg[Indicador]=="si")
                        {
                                FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionIdFolioSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionCodigoSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayFacturacionNombreSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">'+ArrayFacturaCantidadSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaImpuestoSg[Indicador],'##,###,##0',1);+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaValorSg[Indicador],'##,###,##0',1);+'</td><tr>';                                
                                
                                ValorIva+=parseInt(ArrayFacturaImpuestoSg[Indicador]);
                                ValorSum+=parseInt(ArrayFacturaValorSg[Indicador]);
                        }  
                        if(ArrayAplicarFactEs[Indicador]=="si")
                        {
                                FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionIdFolioEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionCodigoEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayFacturacionNombreEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">NOCHES/'+ArrayFacturaCantidadEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaImpuestoEs[Indicador],'##,###,##0',1);+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaValorEs[Indicador],'##,###,##0',1);+'</td><tr>';                                

                                ValorIva+=parseInt(ArrayFacturaImpuestoEs[Indicador]);
                                ValorSum+=parseInt(ArrayFacturaValorEs[Indicador]);
                        }                                
                        Indicador++;
                }
        }
        
        var IdFactura1=0;
        while(Indicador<=CantidadValores)
        {
                if(ArrayAplicarFact[Indicador]=="si")
                {
                        FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionIdFolio[Indicador]+'</td>';
                        FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturaIdConsumo[Indicador]+'</td>'; 
                        FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayFacturacionNombreConsumo[Indicador]+'</td>';
                        FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">'+ArrayFacturaCantidadConsumo[Indicador]+'</td>';
                        FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaImpuestoConsumo[Indicador],'##,###,##0',1);+'</td>';
                        FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaValorConsumo[Indicador],'##,###,##0',1);+'</td><tr>';                        

                        ValorIva+=parseInt(ArrayFacturaImpuestoConsumo[Indicador]);
                        ValorSum+=parseInt(ArrayFacturaValorConsumo[Indicador]);
                }
                if(ArrayAplicarFactSg[Indicador]=="si")
                {
                        FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionIdFolioSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionCodigoSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayFacturacionNombreSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">'+ArrayFacturaCantidadSg[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaImpuestoSg[Indicador],'##,###,##0',1);+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaValorSg[Indicador],'##,###,##0',1);+'</td><tr>';

                                ValorIva+=parseInt(ArrayFacturaImpuestoSg[Indicador]);
                                ValorSum+=parseInt(ArrayFacturaValorSg[Indicador]);
                        
                }  
                if(ArrayAplicarFactEs[Indicador]=="si")
                {
                                ValorIva+=parseInt(ArrayFacturaImpuestoEs[Indicador]);
                                ValorSum+=parseInt(ArrayFacturaValorEs[Indicador]);
                                
                                FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionIdFolioEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayFacturacionCodigoEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayFacturacionNombreEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">'+ArrayFacturaCantidadEs[Indicador]+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaImpuestoEs[Indicador],'##,###,##0',1);+'</td>';
                                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayFacturaValorEs[Indicador],'##,###,##0',1);+'</td><tr>';
                }                                
                Indicador++;
        }
        ValorSub=ValorSum-ValorIva;
        
        var RegistrarFacturaValorCredito=0;

        if( $('#RegistrarFacturaPagoT').prop('checked')) 
        {
                RegistrarFacturaValorCredito=$('#RegistrarFacturaPagoValor').val();
                if(RegistrarFacturaValorCredito>ValorSum)
                {
                        $('#RegistrarFacturaPagoValor').addClass("has-error");
                }else
                {
                        CrearFactura(ValorSum,ValorIva,ValorSub,ArrayFacturacionIdFolioEs,RegistrarFacturaValorCredito);    
                        if(FacturacionRowsEnviar!="")
                        {
                                imprFactura(RegistrarFacturaNombre,RegistrarFacturaNit,RegistrarFacturaTelefono,RegistraFacturaDireccion,FacturacionRowsEnviar,ValorSum,ValorIva,ValorSub); 
                        }                            
                        FacturacionRowsEnviar="";                        
                        ReiniciarFacturacion();
                        swal("Bien","Se han registrado la factura, recuerdan que guardar la factura","success");
                        $('#RegistrarFacturaPagoValor').prop("disabled",true);
                        $('#RegistrarFacturaPagoValor').val("");
                }
        }else{
                $('#RegistrarFacturaPagoValor').prop("disabled",true);
                $('#RegistrarFacturaPagoValor').val(0);
        }	

        
        /*
        var AbonosR=parseInt($('#SumAbonado')[0].innerText);
        var TotalR=parseInt($('#SunTotalPagar')[0].innerText);
        if(AbonosR>TotalR)
        {
                $('#Egreso').modal('show');
                var RegistrarFacturaNombre = $('#RegistrarFacturaNombre')[0].value;
                var RegistrarFacturaNit = $('#RegistrarFacturaNit')[0].value;
                document.getElementById('ComprobanteEgresoNitCliente').value = RegistrarFacturaNit;
                document.getElementById('ComporobanteEgresoNombreCliente').value = RegistrarFacturaNombre;
                var restar = AbonosR - TotalR;
                document.getElementById('ComporobanteEgresoValor').value = restar;
        }
*/
        }

}

function IsertarComprobanteEgreso(){
        
        var ComporobanteEgresoConcepto = document.getElementById('ComporobanteEgresoConcepto').value;
        var restar = document.getElementById('ComporobanteEgresoValor').value;
        var Paramentros = {
                "ValorComprobanteEgreso": restar,
                "ConceptoComprobanteEgreso": ComporobanteEgresoConcepto,
                "NombreProceso": "RegistroComprobanteEgreso"
        };
        
        $.ajax({
                type: "POST",
                url: "../modulos/facturacion/funciones.php",
                data: Paramentros,
                success: function (response) {
                        $('#Egreso').modal('hide');
                        $('#ReciboEgreso').modal('show');
                        var p = JSON.parse(response);
                        console.log(p);
                        $('#CodigoEgreso').text(p.CodigoComprobante);
                        $('#ValorPagadoEgreso').text(p.ValorComprobante);
                        $('#ValorLetrasEgreso').text(p.ValorLetras);
                        $('#ConceptoEgreso').text(p.Concepto);
                        var RegistrarFacturaNombre = $('#RegistrarFacturaNombre')[0].value;
                        $('#PagadoA').text(RegistrarFacturaNombre);
                        

                }
        });
}



function FacturarConsumos(IdFactura)
{
       if(IdFactura!="")
       {
               var CantidadValores1=ArrayAplicarFact.length;
               if(CantidadValores1=="" || CantidadValores1==0)
               {
                FacturarSoloEstadia(ArrayFacturacionIdFolioEs,ArrayAplicarFactEs);
               }else{
                var Indicador1=0;
                while(Indicador1<CantidadValores1)
                {
                        if(ArrayAplicarFact[Indicador1]=="si")
                        {
                                IdConsumo=ArrayFacturaIdConsumo[Indicador1];
                                IdFolio=ArrayFacturacionIdFolio[Indicador1];
                                var Parametros={
                                        "NombreProceso":"FacturarConsumos",
                                        "IdFactura":IdFactura,                                        
                                        "IdConsumo":IdConsumo,
                                        "IdFolio":IdFolio                                        
                                };
                                $.ajax({
                                        data:  Parametros,
                                        url:   '../modulos/facturacion/funciones.php',
                                        type:  'post',
                                        success:  function (response1) {                                                
                                        }});
                        }                             
                        Indicador1++;
                } 
               }
                      

       }
}
function CrearFactura(ValorSum,ValorIva,ValorSub,ArrayFacturacionIdFolioEs,ValorCredito)
{
        var Parametros={
                "NombreProceso":"CreacionFactura",
                "ValorTotal":ValorSum,
                "Iva":ValorIva,
                "SubTotal":ValorSub,
                "IdFolios":ArrayFacturacionIdFolioEs,
                "ValorCredito":ValorCredito
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/facturacion/funciones.php',
                type:  'post',
                beforeSend: function () {
                       
                 },
                success:  function (response) {
                        console.log(IdFactura1);
                        IdFactura1=response;    
                        FacturarConsumos(IdFactura1);                                   
                }}); 
}
function FacturarSoloEstadia(ArrayFacturacionIdFolioEs,ArrayAplicarFactEs)
{
        var CantidadValores1=ArrayFacturacionIdFolioEs.length;
        var Indicador1=0;
        while(Indicador1<CantidadValores1)
        {
                if(ArrayAplicarFactEs[Indicador1]=="si")
                {                       
                        IdFolio=ArrayFacturacionIdFolioEs[Indicador1];
                        var Parametros={
                                "NombreProceso":"FacturarSoloEstadia",
                                "IdFolio":IdFolio                                        
                        };
                        $.ajax({
                                data:  Parametros,
                                url:   '../modulos/facturacion/funciones.php',
                                type:  'post',
                                success:  function (response1) {                                                                                
                                }});
                }                             
                Indicador1++;
        } 
}
function FacturarDatosCliente()
{
        if($('#RegistrarFacturaNombre').val()=="" || $('#RegistrarFacturaNit').val()=="" || $('#RegistrarFacturaTelefono').val()=="" || $('#RegistraFacturaDireccion').val()=="")
        {
                return 1;
        }else{

                RegistrarFacturaNombre=$('#RegistrarFacturaNombre').val();
                RegistrarFacturaNit=$('#RegistrarFacturaNit').val();
                RegistrarFacturaTelefono=$('#RegistrarFacturaTelefono').val();
                RegistraFacturaDireccion=$('#RegistraFacturaDireccion').val();
                return 0;
        }
}

/****************************Jose***********************************************/

/* -------------- Incio Funcion Ingresar Tarifa ------------------------- */

function TarifaIngresar()
{
        var NombreProceso = "TarifaIngresar";
        var TarifaNombre = $('#TarifaNombre').val();
        var TarifaPorcentaje = $('#TarifaPorcentaje').val();

        if(TarifaNombre == "")
        {
                swal("Información","Faltan Datos Por Llenar","info");
        }
        else
        {
                var Parametros = {
                                "NombreProceso" : NombreProceso ,
                                "TarifaNombre" : TarifaNombre ,
                                "TarifaProcentaje" : TarifaPorcentaje 
                                };
                //console.log(Parametros);
                $.ajax({
                                data: Parametros,
                                url: '../modulos/parametrizacion/funciones.php',
                                type: 'post',
                                success: function(response)
                                {
                                        if(response.trim() == 'OK')
                                        {
                                           swal("Listo","Los Datos se Guardaron Correctamente","success");
                                           LimpiarCajas();
                                           var url = "../modulos/parametrizacion/TarifaMostrar.php";
                                           cargar(url,"TablaRecarga");
                                        }
                                        else
                                        {
                                           swal("Información","Revise Los Datos","warning");    
                                        }
                                        
                                }
                                
                });
        }
}
 
/* -------------- Fin Funcion Ingresar Tarifa --------------------------- */

/*--------------- Inicio Funcion Cargar Datos Tarifa Actualizar -----------------*/

function TarifaCargarDatosActualizar(Id)
{
   var NombreProceso = "TarifaCargarDatosActualizar";
   var TarifaId = Id;

   var Parametros = {
                        "NombreProceso" : NombreProceso ,
                        "IdTarifa" : TarifaId
                    }

          $.ajax({
                    data : Parametros,
                    url : '../modulos/parametrizacion/funciones.php',
                    type : 'post',

                    success : function(response)
                    {
                        var TarifaDatos = JSON.parse(response);
                        //console.log(TarifaDatos);
                        document.getElementById('TarifaIdActualizar').value = TarifaDatos[0].IdTarifa;
                        document.getElementById('TarifaNombreActualizar').value = TarifaDatos[0].NombreTarifa;
                        document.getElementById('TarifaPorcentajeActualizar').value = TarifaDatos[0].PorcentajeTarifa;
                    }

                });
}

/*--------------- Fin Funcion Cargar Datos Tarifa Actualizar --------------------*/

/*--------------- Incion Funcion Actualizar Tarifa ------------------------------*/

function TarifaActualizar()
{
   var NombreProceso = "TarifaActualizar";
   var TarifaId = $('#TarifaIdActualizar').val();
   var TarifaNombre = $('#TarifaNombreActualizar').val();
   var TarifaPorcentaje = $('#TarifaPorcentajeActualizar').val();

        if(TarifaNombre == "" || TarifaPorcentaje == "")
        {
             swal("Información","Faltan Datos Por Llenar","info");     
        }
        var Parametros = {
                                "NombreProceso" : NombreProceso ,
                                "TarifaId" : TarifaId ,
                                "TarifaNombre" : TarifaNombre ,
                                "TarifaPorcentaje" : TarifaPorcentaje 
                        }
        //console.log(Parametros);
                        $.ajax({

                                data : Parametros,
                                url : '../modulos/parametrizacion/funciones.php',
                                type : 'post',

                                success : function(response)
                                {
                                        if(response.trim() == 'OK')
                                        {
                                           swal("Listo","Los Datos se Guardaron Correctamente","success");
                                           LimpiarCajas();
                                           var url = "../modulos/parametrizacion/TarifaMostrar.php";
                                           cargar(url,"TablaRecarga");
                                        }
                                        else
                                        {
                                           swal("Información","Revise Los Datos","warning");    
                                        }
                                } 
                                
                        });
}
/*--------------- Fin Funcion Actualizar Tarida ---------------------------------*/

/* Paso1 */
//**--------------------------------- RegistrarHuespedes ---------------------------------------------------- */
function RegistrarHuespedes()
{
        
        var TineneReserva = $("#ReservaSiNo").prop('checked');
        if(TineneReserva == true)
        {
                var IdMovimientoHabitacion = $("#GuardarRegistro").val();

                var ArrayHuespedTipo= new Array();
                $('.TipoHuespedConReserva').each(function(){
                        ArrayHuespedTipo.push($(this).text());
                    });
                var ArrayHuespedTipoDocumento= new Array();
                $('.TipoDocumentoConReserva').each(function(){
                        ArrayHuespedTipoDocumento.push($(this).text());
                    });
                    var ArrayHuespedId= new Array();
                $('.NumeroDocumentoConReserva').each(function(){
                        ArrayHuespedId.push($(this).text());
                    });
                var ArrayHuespedNombre= new Array();
                $('.NombreConReserva').each(function(){
                        ArrayHuespedNombre.push($(this).text());
                    });
        
                var ArrayHuespedApellido= new Array();
                $('.ApellidosConReserva').each(function(){
                        ArrayHuespedApellido.push($(this).text());
                    });
        
                var ArrayHuespedNacionalidad= new Array();
                $('.NacionalidadConReserva').each(function(){
                        ArrayHuespedNacionalidad.push($(this).text());
                    });
        
                var ArrayHuespedFechaNaciento= new Array();
                $('.FechaNacimientoConReserva').each(function(){
                        ArrayHuespedFechaNaciento.push($(this).text());
                    });
                var ArrayHuespedSeguro= new Array();
                $('.SeguroConReserva').each(function(){
                        ArrayHuespedSeguro.push($(this).text());
                    });
                var ArrayHuespedObservaciones= new Array();
                $('.ObservacionesConReserva').each(function(){
                        ArrayHuespedObservaciones.push($(this).text());
                    });
                    
                var NombreProceso="RegistrarHuespedes";
                var parametros = {
                    "Reserva" : TineneReserva,
                    "HuespedTipo" : ArrayHuespedTipo,
                    "HuespedTipoDocumento":ArrayHuespedTipoDocumento,
                    "HuespedId":ArrayHuespedId,
                    "HuespedNombre":ArrayHuespedNombre,
                    "HuespedApellido":ArrayHuespedApellido,
                    "HuespedNacionalidad":ArrayHuespedNacionalidad,
                    "HuespedFechaNaciento":ArrayHuespedFechaNaciento,
                    "HuespedSeguro":ArrayHuespedSeguro,
                    "NombreProceso":NombreProceso,
                    "Observaciones" :ArrayHuespedObservaciones,
                    "IdMovimientoHabitacion":IdMovimientoHabitacion
                    };
        }
        else
        {
                var IdMovimientoHabitacion=0;
                var NumeroHabitacion = $("#NombreHabitacionRegistro").val();

                //var Id = $('input.HuespedesId').val();
                var ArrayHuespedTipo= new Array();
                $('.TipoHuesped').each(function(){
                        ArrayHuespedTipo.push($(this).text());
                    });
                var ArrayHuespedTipoDocumento= new Array();
                $('.TipoDocumento').each(function(){
                        ArrayHuespedTipoDocumento.push($(this).text());
                    });
                    var ArrayHuespedId= new Array();
                $('.NumeroDocumento').each(function(){
                        ArrayHuespedId.push($(this).text());
                    });
                var ArrayHuespedNombre= new Array();
                $('.Nombre').each(function(){
                        ArrayHuespedNombre.push($(this).text());
                    });
        
                var ArrayHuespedApellido= new Array();
                $('.Apellidos').each(function(){
                        ArrayHuespedApellido.push($(this).text());
                    });
        
                var ArrayHuespedNacionalidad= new Array();
                $('.Nacionalidad').each(function(){
                        ArrayHuespedNacionalidad.push($(this).text());
                    });
        
                var ArrayHuespedFechaNaciento= new Array();
                $('.FechaNacimiento').each(function(){
                        ArrayHuespedFechaNaciento.push($(this).text());
                    });
                var ArrayHuespedSeguro= new Array();
                $('.Seguro').each(function(){
                        ArrayHuespedSeguro.push($(this).text());
                    });
                var ArrayHuespedObservaciones= new Array();
                $('.Observaciones').each(function(){
                        ArrayHuespedObservaciones.push($(this).text());
                    });

                var NombreProceso="RegistrarHuespedes";
                var parametros = {
                                "Reserva" : TineneReserva,
                                "HuespedTipo" : ArrayHuespedTipo,
                                "HuespedTipoDocumento":ArrayHuespedTipoDocumento,
                                "HuespedId":ArrayHuespedId,
                                "HuespedNombre":ArrayHuespedNombre,
                                "HuespedApellido":ArrayHuespedApellido,
                                "HuespedNacionalidad":ArrayHuespedNacionalidad,
                                "HuespedFechaNaciento":ArrayHuespedFechaNaciento,
                                "HuespedSeguro":ArrayHuespedSeguro,
                                "NombreProceso":NombreProceso,
                                "Observaciones" :ArrayHuespedObservaciones,
                                "IdMovimientoHabitacion":IdMovimientoHabitacion,
                                "NombreHabitacion" :NumeroHabitacion 
                                    };
        }
        $.ajax({
                data:  parametros,
                url:   '../modulos/movimiento/funciones.php',
                type:  'post',
                beforeSend: function ()
                {
                        $("#GuardarRegistro").attr("disabled",true);
                },
                success:  function (response) {
                        if(response.trim()=="REGISTRO")
                        {       
                                swal("¡Bien!", "Los huespedes se han  registrado correctamente", "success");
                                if(TineneReserva == true){
                                        
                                        /*Variable para saber cuantos rows tiene la tabla donde se muestran lashabitaciones */
                                        var rows = $("#ResultadoTablaMovimientoHabitaciones tr").length;
                                        console.log("rows "+rows)
                                        var url = "../modulos/movimiento/Registro/TablaMovHabitaciones.php";
                                        cargar(url,'ListadoMovimientoHabitacion');
                                        IdMovimiento=localStorage.IdMovimientoRegistro;
                                        CargarHabitaciones(IdMovimiento);
                                        $("#BtnAgregarHuespedesConReserva").attr("disabled",false);
                                        $("#TablaHuespedConReserva tr").remove();
                                        $('#SegundoContenedorHuespedesRegistroConReserva').hide();
                                        $("#GuardarRegistro").attr("disabled",true);
                                        

                                        /* Variable para actualizar la tabla movimeitos registros despues de haber terminado de registrar los huespedes
                                        segun la canitdad de habitaciones que reservo */
                                        var Contador = 1;
                                        /*Hacemos comparacion  */
                                         if(rows == Contador)
                                         {
                                                // $('#ReservaSiNo').prop('checked', false).change();
                                                // SoloCambiarFormularioTablaMovmientoEnRegistro();
                                                // $('#ContenedorHab').show();
                                                // // $('#ContenedorTablaHab').html();
                                                // //$('#ContenedorTablaHab').hide();
                                                // $('#ListadoMovimientoHabitacion').html();
                                                // // $('#ListadoMovimientoHabitacion').hide()
                                        
                                                // $('#ContenedorRegistroHuespedes').hide();
                                                // LimpiarCajas();
                                                // $("#GuardarRegistro").attr("disabled",true);
                                                //LimpiarCajas();
                                                
                                                // variables utilizadas para agregregar a las tablas en movimientos (reserva y registro)
                                                        Cont = 0;
                                                        ContRegistro = 0;
                                                        ContRegistroConReserva = 0;
                                                /*------------------------------------ */
                                                       var ruta = "../modulos/movimiento/MovimientoTab.php";
                                                        $.ajax({
                                                                data: "",
                                                                url: ruta,
                                                                type: 'post',
                                                                beforeSend: function () {
                                                                        $("#Forms").html("Procesando, espere por favor...");
                                                                },
                                                                success: function (response) {
                                                                        $("#Forms").html(response);
                                                                }
                                                        });
                                         } 
                                                                      
                                }
                                else{
                                        LimpiarCajas();
                                        $('#TablaHuesped tr').remove();
                                        $("#GuardarRegistro").attr("disabled",true);
                                        $('#DesayunoRegistro').prop('checked', false).change();
                                }
                        }
                        if(response.trim()=="FALTAN")
                        {
                                swal("Error!", "Revise los campos de huesped", "warning");
                                $("#BtnAgregarHuespedesConReserva").attr("disabled",false);
                        }
                }
        });
}

/*Paso2 */
function SoloCambiarFormularioTablaMovmientoEnRegistro()
{
        Parametros="";
        ruta = "../modulos/movimiento/Registro/DatosRegistroWalking.php";
        $.ajax({
                data: Parametros,
                url: ruta,
                type: 'post',
                beforeSend: function () {
                        $("#Contenedor1Registros").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#Contenedor1Registros").html(response);
                }
        });
}

/*Paso3 */
/*--------------------- Inicio Funcion Cargar Select Departamento -------------------------------*/
function HabilitarDepartamento()
{
   var Nacionalidad = $('#NacionalidadClienteParticularRegistro').val();
   if(Nacionalidad != "colombiano" ){}
   else{
        $('#DepartamentoClienteParticularRegistro').attr("disabled",false);
        $('#CiudadClienteParticularRegistro').attr("disabled",false);
        CargarDepartamentos();
   }
}


/*Paso4 */
function CargarDepartamentos()
{
        parametros = {"NombreProceso":"CargarSelectDepartamento"};
        $.ajax({
                data:  parametros,
                url:   '../modulos/movimiento/funciones.php',
                type:  'post',
                success:  function (response) {
                        var Dato = JSON.parse(response.trim());
                        // console.log('Cantidad Departamentos '+Dato.length);
                        for(var i = 0 ; i < Dato.length ; i++)
                        {
                        $("#DepartamentoClienteParticularRegistro").append('<option value='+Dato[i].IdDepartamento+'>'+Dato[i].NombreDepartamento+'</option>');           
                        }
                }
        });
}


/*Paso5 */
function CargarCiudadesConSelectDepartamento(id)
{

        IdDepartamento=id;
        console.log("Id Departamento : "+IdDepartamento);
        var parametros = {
                "NombreProceso" : "CargarSeleccCiudadesConIdDepartamento",
                "IdDepartamento" :IdDepartamento
                };
        $.ajax({
                data:  parametros,
                url:   '../modulos/movimiento/funciones.php',
                type:  'post',
                success:  function(response){
                        var Dato = JSON.parse(response);
                        if(response != "")
                        {
                                console.log(Dato);
                                for(var i = 0 ; i < Dato.length ; i++)
                                {
                                //$("#CiudadClienteParticularRegistro").append('<option value='+Dato[i].IdCiudad+'>'+Dato[i].NombreCiudad+'</option>');           
                                $("#CiudadClienteParticularRegistro").val(Dato[i].IdCiudad);
                                }
                        }
                        else{

                        }
                }
        });
}


/*Paso6 */
function CargarDepartamentosConIdCiudad(IdCiudad)
{
        var Parametros = {
                "NombreProceso":"CargarSelectDepartamentoConIdCiuadad",
                "IdCiudad" : IdCiudad
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/movimiento/funciones.php',
                type:  'post',
                success:  function(response){
                        var Dato = response.trim();
                        $('#DepartamentoClienteParticularRegistro').val(Dato);
                        $('#DepartamentoClienteParticularRegistro').prop('disabled',true);
                }
        });
}


/*Paso7  es la validacion FechaSalidaNoPuedeSerMenorAFechaEntrada */

/*Paso8 */
/*----------------- Inicio Funcion Ingresar Movimiento Reserva --------------------*/
function CargarDatosReserva(DatosClienteYReserva)
{
        console.log(DatosClienteYReserva);


        var ArrayNombreHabitacion = new Array();
        $('.NombreHabitacion').each(function(){
                ArrayNombreHabitacion.push($(this).text());
                console.log(ArrayNombreHabitacion);
            });

        var ArrayCantidadAdultos = new Array();
        $('.CantidadAdultos').each(function(){
                ArrayCantidadAdultos.push($(this).text());
                console.log("Cantidada Adultos  "+ArrayCantidadAdultos);
            });

        var ArrayCantidadNinos = new Array();
        $('.CantidadNinos').each(function(){
                ArrayCantidadNinos.push($(this).text());
                console.log("Cantidad Ninos  "+ArrayCantidadNinos);
            });

        var ArrayDesayuno = new Array();
        $('.Desayuno').each(function(){
                ArrayDesayuno.push($(this).text());
                console.log(ArrayDesayuno);
            });

        var ArrayNitResponsable = new Array();
        $('.NitResponsable').each(function(){
                ArrayNitResponsable.push($(this).text());
                console.log(ArrayNitResponsable);
            });

        var ArrayNombreResponsable = new Array();
        $('.NombreResponsable').each(function(){
                ArrayNombreResponsable.push($(this).text());
                console.log(ArrayNombreResponsable);
            });
        var ArrayApellidoResponsable = new Array();
        $('.ApellidoResponsable').each(function(){
                ArrayApellidoResponsable.push($(this).text());
                console.log(ArrayApellidoResponsable);
            });
        var ArrayObservacionesrHabitacion = new Array();
        $('.ObservacionesHabitacion').each(function(){
                ArrayObservacionesrHabitacion.push($(this).text());
                console.log("Observaciones "+ArrayObservacionesrHabitacion);
        });
        var ArrayValorHabitacion = new Array();
        $('.ValorHabitacion').each(function(){
                ArrayValorHabitacion.push($(this).text());
                console.log("Habitacion valor"+ArrayValorHabitacion);
            });

        // vaoms a utilizar un switch para indicar de que formulario se tomaran los datos
        // segun su tipo de cliente
         var TipoCliente = $('#ClienteTipoReserva').val();
         var Grupo = $('#GrupoSiNoMovimiento').prop('checked');
        switch(TipoCliente)
        {
               case '1':


                // Los datos de la tabla esta arriba

                var ValorTotal = $('#ValorTotalReserva').val();
                     var Parametros = {
                        // datos el Cliente
                         "NombreProceso" : "ReservaIngresar",
                         "TipoCliente" : TipoCliente,
                         "DatosClienteYReserva" : DatosClienteYReserva,
                         "Grupo" : Grupo,
                         //datos Tabla
                         "NombreHabitacion" : ArrayNombreHabitacion,
                         "CantidadAdultos" :  ArrayCantidadAdultos,
                         "CantidadNinos" :  ArrayCantidadNinos,
                         "Desayuno" : ArrayDesayuno ,
                         "NitResponsable" : ArrayNitResponsable ,
                         "NombreResponsable" : ArrayNombreResponsable,
                         "ApellidosResponsable" : ArrayApellidoResponsable,
                         "ObservacionesHabitacion" : ArrayObservacionesrHabitacion,
                         "ValorHabitacion" : ArrayValorHabitacion,
                         //
                         "ValorTotal" : ValorTotal

                     };
                     IngresarReserva(Parametros);
               break;

               case '2':
               var Convenio = $('#Convenio').prop('checked');
               var ValorTotal = $('#ValorTotalReserva').val();
                var Parametros = {
                        // datos el Cliente
                        "NombreProceso" : "ReservaIngresar",
                        "TipoCliente" : TipoCliente,
                        "Convenio" : Convenio,
                        "DatosClienteYReserva" : DatosClienteYReserva,
                        "Grupo" : Grupo,
                        //datos Tabla
                        "NombreHabitacion" : ArrayNombreHabitacion,
                        "CantidadAdultos" :  ArrayCantidadAdultos,
                        "CantidadNinos" :  ArrayCantidadNinos,
                        "Desayuno" : ArrayDesayuno ,
                        "NitResponsable" : ArrayNitResponsable ,
                        "NombreResponsable" : ArrayNombreResponsable,
                        "ApellidosResponsable" : ArrayApellidoResponsable,
                        "ObservacionesHabitacion" : ArrayObservacionesrHabitacion,
                        "ValorHabitacion" : ArrayValorHabitacion,
                        //
                        "ValorTotal" : ValorTotal
                   };
                IngresarReserva(Parametros);
               break;

               case '3':
                var Convenio = $('#Convenio').prop('checked');
                console.log(Convenio);
                var ValorTotal = $('#ValorTotalReserva').val();
                var Comision = $('#ComisionAgencia').prop('checked');
                var Parametros = {
                        // datos el Cliente
                        "NombreProceso" : "ReservaIngresar",
                        "TipoCliente" : TipoCliente,
                        "Convenio" : Convenio,
                        "DatosClienteYReserva" : DatosClienteYReserva,
                        "Comision" : Comision,
                        "Grupo" : Grupo,
                        //datos Tabla
                        "NombreHabitacion" : ArrayNombreHabitacion,
                        "CantidadAdultos" :  ArrayCantidadAdultos,
                        "CantidadNinos" :  ArrayCantidadNinos,
                        "Desayuno" : ArrayDesayuno ,
                        "NitResponsable" : ArrayNitResponsable ,
                        "NombreResponsable" : ArrayNombreResponsable,
                        "ApellidosResponsable" : ArrayApellidoResponsable,
                        "ObservacionesHabitacion" : ArrayObservacionesrHabitacion,
                        "ValorHabitacion" : ArrayValorHabitacion,
                        //
                        "ValorTotal" : ValorTotal
                   };
                IngresarReserva(Parametros);
               break;
        }
}
/*----------------- Fin Funcion Ingresar Movimiento Reserva -----------------------*/


/*Paso9 */
// Contar La cajas de Texto y asignar valor, funcion para formulario de reserva
function ContaryAsignarValor()
{
        var ArrayDatosCliente = new Array();
        var TipoCliente = $("#ClienteTipoReserva").val();
        var FechaEntrada = $("#MovimientoReservaFechaEntrada").val();
        var FechaSalida = $("#MovimientoReservaFechaSalida").val();
        var Valor1TablaHuespedes = $("#TablaHabitacion").find("td:first").html();
        switch(TipoCliente)
        {
                case '1':
                                var Numero = $("#NitClienteParticularReserva").val();
                                var Nombres =  $("#ClienteParticularNombresReserva").val();
                                var Apellidos =  $("#ClienteParticularApellidosReserva").val();
                                var Telefono =  $("#ClienteParticularTelefono1Reserva").val();
                                var Correo =  $("#ClienteParticularCorreoReserva").val();

                                if(Numero == "" || Nombres == "" || Apellidos == "" || Telefono == "" || Correo == "")
                                {
                                        /*Particular */
                                        $('#ContenedorNumDocumentoReserva').addClass("has-error");
                                        $('#ContenedorNombrePartiReserva').addClass("has-error");
                                        $('#ConetenedorApellidParticuReserva').addClass("has-error");
                                        $('#ContenedorTelefoReserParticu').addClass("has-error");
                                        $('#ContenedorCorreoParticuReserva').addClass("has-error");
                                        swal("Error","Revise los datos del cliente correctamente","warning");
                                }
                                else if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaEntrada,FechaSalida) == 1){
                                        $('#ContenedorFechaEntradaReserva').addClass("has-error");
                                        $('#ContenedorFechaSalidaReserva').addClass("has-error");
                                        swal("Error","Revise las fechas","warning");
                                }
                                else
                                {
                                                if(Valor1TablaHuespedes == "" || Valor1TablaHuespedes == null)
                                                {
                                                        swal("Error","No a ingresado ninguna habitación","warning");
                                                }else
                                                {
                                                        $('.Dato').each(function(){
                                                                ArrayDatosCliente.push($(this).val());
                                                        }),CargarDatosReserva(ArrayDatosCliente)
                                                }
                                }       

                        break;
                case '2':
                                var Convenio = $('#Convenio').prop('checked');
                                if(Convenio == true)
                                {
                                        var Nombres =  $("#ConveniosSelect").val();
                                        if(Nombres == "")
                                        {
                                                $('#ContenedorConvenios').addClass("has-error");
                                                swal("Error","Revise los datos del cliente correctamente","warning");
                                        }
                                }
                                else
                                {
                                        var Nit = $("#NitClienteCorporativoReserva").val();
                                        var Nombre = $("#NombreClienteCorporativoReserva").val();
                                        var Telefono = $("#Telefono1ClienteCorporativoReserva").val();
                                        var Correo = $("#CorreoClienteCorporativoReserva").val();

                                        if(Nit == "" || Nombre == "" || Telefono == "" || Correo == "")
                                        {
                                                /* Corporativo */
                                                $('#ContenedorNitCorporatiReserva').addClass("has-error");
                                                $('#ContenedorNombrCorporatiReserva').addClass("has-error");
                                                $('#ContenedorTelfCorpoReserva').addClass("has-error");
                                                $('#ContenedorCorreoCorporatiReserva').addClass("has-error");
                                                swal("Error","Revise los datos del cliente correctamente","warning");
                                        }
                                }

                                
                                if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaEntrada,FechaSalida) == 1){
                                        $('#ContenedorFechaEntradaReserva').addClass("has-error");
                                        $('#ContenedorFechaSalidaReserva').addClass("has-error");
                                        swal("Error","Revise las fechas","warning");
                                }
                                else
                                {
                                                if(Valor1TablaHuespedes == "" || Valor1TablaHuespedes == null)
                                                {
                                                        swal("Error","No a ingresado ninguna habitación","warning");
                                                }else
                                                {
                                                        $('.Dato').each(function(){
                                                                ArrayDatosCliente.push($(this).val());
                                                                console.log(ArrayDatosCliente);
                                                        }),CargarDatosReserva(ArrayDatosCliente)
                                                }
                                }       
                        break;
                case '3':
                                var Convenio = $('#Convenio').prop('checked');
                                if(Convenio == true)
                                {
                                        var Nombres =  $("#ConveniosSelect").val();
                                        if(Nombres == "")
                                        {
                                                $('#ContenedorConvenios').addClass("has-error");
                                                swal("Error","Revise los datos del cliente correctamente","warning");
                                        }
                                }
                                else
                                {
                                        var Nit = $("#NitClienteAgenciaReserva").val();
                                        var Nombre = $("#NombresClienteAgenciaReserva").val();
                                        var Telefono = $("#Telefono1ClienteAgenciaReserva").val();
                                        var Correo = $("#CorreoClienteAagenciaReserva").val();
                                        
                                        if(Nit == "" || Nombre == "" || Telefono == "" || Correo == "")
                                        {
                                                /* Corporativo */
                                                $('#NitClienteAgenciaReserva').addClass("has-error");
                                                $('#NombresClienteAgenciaReserva').addClass("has-error");                        
                                                $('#Telefono1ClienteAgenciaReserva').addClass("has-error");
                                                $('#CorreoClienteAagenciaReserva').addClass("has-error");                        
                                                swal("Error","Revise los datos del cliente correctamente","warning");
                                        }
                                }
                                if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaEntrada,FechaSalida) == 1){
                                        $('#ContenedorFechaEntradaReserva').addClass("has-error");
                                        $('#ContenedorFechaSalidaReserva').addClass("has-error");
                                        swal("Error","Revise las fechas","warning");
                                }
                                else
                                {
                                                if(Valor1TablaHuespedes == "" || Valor1TablaHuespedes == null)
                                                {
                                                        swal("Error","No a ingresado ninguna habitación","warning");
                                                }else
                                                {
                                                        $('.Dato').each(function(){
                                                                ArrayDatosCliente.push($(this).val());
                                                        }),CargarDatosReserva(ArrayDatosCliente)
                                                }
                                }       
                        break;
        }
}


/*Paso10 */
function IngresarReserva(Parametros){
        $.ajax({
                data : Parametros,
                url : "../modulos/movimiento/funciones.php",
                type : "POST",
                success : function(response)
                {
                        if(response == "GUARDO")
                        {
                                swal("Información","Se guardo la reserva","success");
                                LimpiarCajas();

                                       var ruta = "../modulos/movimiento/MovimientoTab.php";
                                        $.ajax({
                                                data: "",
                                                url: ruta,
                                                type: 'post',
                                                beforeSend: function () {
                                                        $("#Forms").html("Procesando, espere por favor...");
                                                },
                                                success: function (response) {
                                                        $("#Forms").html(response);
                                                }
                                        });
                        
                        }
                        else{
                                swal("Error","Revise los datos","warning");
                        }
                        
                        // var url="../modulos/movimiento/Reserva/ReservaIngresar.php";
                        //cargar(url,"ReservaIngresar");
                }
        });
}


/*Paso11 Son Funciones que se repiten en mi archivo, no las agrego. No se usan*/
/*Paso12 Son Funciones que se repiten en mi archivo, no las agrego. No se usan*/


/*Paso13 */
function CargarHabitaciones(IdMovimiento)
{       localStorage.IdMovimientoRegistro = IdMovimiento;
        
        var Parametros = {
                "IdMovimiento": IdMovimiento,
        }
        $.ajax({
                data: Parametros,
                url:"../modulos/movimiento/Registro/TablaMovHabitaciones.php",
                type: 'post',
                beforeSend: function () {
                        $("#ContenedorTablaHab").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        //$("#ContenedorTablaHab").show();
                        $("#ContenedorTablaHab").html(response);
                }
        });
}


/*Paso14 */
function UpDateMovimiento(IdMovimiento)
{
        var Parametros = {
                "NombreProceso" : "UpdateMovimiento",
                "IdMovimiento"  : IdMovimiento
        };
        $.ajax({
                data: Parametros,
                url:"../modulos/movimiento/funciones.php",
                type: 'post',
                success: function (response) {
                        
                }
        });
}


/*Paso15 */
function CargarDatosRegistros()
{
        
        var TipoCliente = $('#ClienteTipoRegistro').val();

        switch(TipoCliente)
        {
                case '1':
                        // var CodigoMagico = $('#CodigoMagico').val();
                        var TipoDocumento = $('#TipoDocumentoClienteParticularRegistro').val();
                        var NumeroDocumento = $('#NitClienteParticularRegistro').val();
                        var Nombre = $('#NombreClienteParticularRegistro').val();
                        var Apellidos = $('#ApellidosClienteParticularRegistro').val();
                        var Telefono1 = $('#Telefono1ClienteParticularRegistro').val();
                        var Telefono2 = $('#Telefono2ClienteParticularRegistro').val();
                        var Correo = $('#CorreoClienteParticularRegistro').val();
                        var Direccion = $('#DireccionClienteParticularRegistro').val();
                        var Nacionalidad = $('#NacionalidadClienteParticularRegistro').val();
                        var Departamentos = $('#DepartamentoClienteParticularRegistro').val();
                        var Ciudad = $('#CiudadClienteParticularRegistro').val();
                        var ActividadEconomica = $('#ActividadEconomicaClieenteParticularRegistro').val();
                        // var NumeroCuenta = $('#NumeroCuentaClienteParticularRegistro').val();
                        var TipoPersona = $('#TipoPersonaClientePartiuclarRegistro').val();
                        var TipoContribuyente = $('#TipoContribuyenteClienteParticularRegistro').val();
                        var Preferencias = $('#PreferenciasClienteParticularRegistro').val();

                        if( NumeroDocumento == "" || NumeroDocumento == null )
                        {$('#ContNitClientParti').addClass("has-error");}
                        // if( CodigoMagico == "" || CodigoMagico == null)
                        // {$('#ConteCodigoMagic').addClass("has-error");}
                        if( Nombre == "" || Nombre == null )
                        {$('#ContNombClientParti').addClass("has-error");}
                        if( Apellidos == "" || Apellidos == null )
                        {$('#ContApelliClientParti').addClass("has-error");}
                        if( Telefono1 == "" || Telefono1 == null )
                        {$('#ContTel1ClientParti').addClass("has-error");}
                        if( Telefono2 == "" || Telefono2 == null )
                        {$('#ContTel2ClientParti').addClass("has-error");}
                        if( Correo == "" || Correo == null )
                        {$('#ContCorreoClientParti').addClass("has-error");}
                        if( Direccion == "" || Direccion == null )
                        {$('#ContDireccClientParti').addClass("has-error");} 
                        if( Nacionalidad == "" || NumeroDocumento == null )
                        {$('#ContNacionClientParti').addClass("has-error");}
                        if( ActividadEconomica == "" || NumeroDocumento == null )
                        {$('#ContActiEconoClientParti').addClass("has-error");}
                        // if( NumeroCuenta == "" || NumeroDocumento == null )
                        // {$('#ContNumCuentClientParti').addClass("has-error");}
                        if( NumeroDocumento == "" || Nombre == "" || Apellidos == "" || Telefono1 == "" || Telefono2 == "" || Correo == "" || Direccion == "" || Nacionalidad == "" || ActividadEconomica == "" || TipoPersona == "" )
                        {
                                swal("Error","Complete los campos correctamente","warning");
                        }
                        else
                        {
                                var Parametros = {
                                        // "CodigoMagico" : CodigoMagico,
                                        "TipoCliente" : TipoCliente,
                                        "TipoDocumento" : TipoDocumento,
                                        "NumeroDocumento" : NumeroDocumento,
                                        "Nombre" : Nombre,
                                        "Apellidos" : Apellidos,
                                        "Telefono1" : Telefono1,
                                        "Telefono2" : Telefono2,
                                        "Correo" : Correo,
                                        "Direccion" : Direccion,
                                        "Nacionalidad" : Nacionalidad,
                                        "Departamentos" : Departamentos,
                                        "Ciudad" : Ciudad,
                                        "ActividadEconomica" : ActividadEconomica,
                                        // "NumeroCuenta" : NumeroCuenta,
                                        "TipoPersona" : TipoPersona,
                                        "TipoContribuyente" : TipoContribuyente,
                                        "Preferencias" : Preferencias,
                                };
                                InsertHuespedesYUpDateClienteHabitaciones(Parametros);
                        }
                        break;
                
                case '2':
                        var Convenio = $('#ConvenioRegistro').prop('checked');
                         if($('#ConvenioRegistro').prop('checked') == true)
                         {
                                var IdCliente = $('#ConveniosSelectRegistro').val();
                                
                                 if(IdCliente == "")
                                        {$('#ContenedorConvenioRegistro').addClass("has-error");
                                         swal("Error","Complete los campos correctamente","warning");
                                        }
                                else{
                                        var Parametros = {
                                                      "NombreProceso" : "RegistrarYActualizarCliente",
                                                      "TipoCliente" : TipoCliente,
                                                      "Convenio" : Convenio,
                                                      "IdCliente" : IdCliente
                                        };
                                        InsertHuespedesYUpDateClienteHabitaciones(Parametros);
                                }
                         }
                         else{
                               var NitCorportaivo =  $('#NitClienteCorporativoRegistro').val();
                               var NombreCorporativo = $('#NombreClienteCorporativoRegistro').val();

                               if(NitCorportaivo == "")
                               {$('#ContNitCorporaRegistr').addClass("has-error");}
                               if(NombreCorporativo == "")
                               {$('#ContNombreCorporativo').addClass("has-error");}

                               if( NitCorportaivo == "" || NombreCorporativo == "" )
                               {swal("Error","Complete los campos correctamente","warning");}
                               else
                               {
                                        var Parametros = 
                                              {
                                                "NombreProceso" : "RegistrarYActualizarCliente",
                                                "TipoCliente" : TipoCliente,
                                                "NitCorportaivo" : NitCorportaivo,
                                                "Convenio" : Convenio,
                                                "NombreCorporativo" : NombreCorporativo
                                              };
                                InsertHuespedesYUpDateClienteHabitaciones(Parametros);
                               }
                         }
                        break;
                
                case '3':
                        var Convenio = $('#ConvenioRegistro').prop('checked');
                                if($('#ConvenioRegistro').prop('checked') == true)
                                {
                                       var IdCliente = $('#ConveniosSelectRegistro').val();
                                        if(IdCliente == "")
                                               {$('#ContenedorConvenioRegistro').addClass("has-error");
                                                swal("Error","Complete los campos correctamente","warning");
                                               }
                                       else{
                                               var Parametros = {
                                                             "NombreProceso" : "RegistrarYActualizarCliente",
                                                             "TipoCliente" : TipoCliente,
                                                             "Convenio" : Convenio,
                                                             "IdCliente" : IdCliente
                                               };
                                        InsertHuespedesYUpDateClienteHabitaciones(Parametros);
                                       }
                                }
                                else{
                                      var NitAgencia =  $('#NitClienteAgenciaRegistro').val();
                                      var NombreAgencia = $('#NombreClienteAgenciaRegisgtro').val();
                                
                                      if(NitCorportaivo == "")
                                      {$('#ContNitCorporaRegistr').addClass("has-error");}
                                      if(NombreCorporativo == "")
                                      {$('#ContNitCorporaRegistr').addClass("has-error");}
                                
                                      if( NitCorportaivo == "" || NombreCorporativo == "" )
                                      {swal("Error","Complete los campos correctamente","warning");}
                                      else
                                      {
                                              var Parametros = 
                                              {
                                                "NombreProceso" : "RegistrarYActualizarCliente",
                                                "TipoCliente" : TipoCliente,
                                                "Convenio" : Convenio,
                                                "NitCorportaivo" : NitAgencia,
                                                "NombreCorporativo" : NombreAgencia
                                              }
                                        InsertHuespedesYUpDateClienteHabitaciones(Parametros);    
                                      }
                                }
                        break;
                
                default:
                                swal("Información","Complete los campos correctamente","info");
                        break;

        }
}



/*Paso16 */
function InsertHuespedesYUpDateClienteHabitaciones(DatosClienteRegistro)
{       var IdMovimiento = localStorage.IdMovimientoRegistro;
        UpDateMovimiento(IdMovimiento);
        var ReservaSi = $('#ReservaSiNo').prop('checked');
        if(ReservaSi == true)
        {
                switch(DatosClienteRegistro.TipoCliente)
                {
                        case '1':
                                var IdMovimientoHabitacion = $('#GuardarRegistro').val();
                                // console.log('Este es el Movimiento: '+IdMovimientoHabitacion);
                                          var Parametros = {
                                                  "NombreProceso" : "RegistroMovimiento",
                                                  "DatosClienteRegistro" : DatosClienteRegistro,
                                                  "Reserva" : ReservaSi,
                                                  "IdMovimientoHabitacion" : IdMovimientoHabitacion,
                                          };
                                break;
                        case '2':
                                var IdMovimientoHabitacion = $('#GuardarRegistro').val();
                                // console.log('Este es el Movimiento: '+IdMovimientoHabitacion);
                                          var Parametros = {
                                                  "NombreProceso" : "RegistroMovimiento",
                                                  "DatosClienteRegistro" : DatosClienteRegistro,
                                                  "Reserva" : ReservaSi,
                                                  "IdMovimientoHabitacion" : IdMovimientoHabitacion,
                                          };    
                                break;
                        case '3':
                                var IdMovimientoHabitacion = $('#GuardarRegistro').val();
                                // console.log('Este es el Movimiento: '+IdMovimientoHabitacion);
                                          var Parametros = {
                                                  "NombreProceso" : "RegistroMovimiento",
                                                  "DatosClienteRegistro" : DatosClienteRegistro,
                                                  "Reserva" : ReservaSi,
                                                  "IdMovimientoHabitacion" : IdMovimientoHabitacion,
                                          };    
                                break;
                }
        }
        else
        {
                // datos de registro
                var IdMovimientoHabitacion = 0;
                var EstadoRegistro =  $("#MovimientoRegistroEstado").val();
                var FechaEntradaRegistro =  $("#MovimientoRegistroFechaEntrada").val();
                var FechaSalidaRegistro =  $("#MovimientoRegistroFechaSalida").val();

                /*Validación Fechas */
                if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaEntradaRegistro,FechaSalidaRegistro) == 1){
                        $('#MovimientoRegistroFechaEntrada').addClass("has-error");
                        $('#MovimientoRegistroFechaSalida').addClass("has-error");
                        swal("Error","Revise las fechas","warning");
                }

                var TarifaRegistro = $("#MovimientoRegistroTipoTarifa").val();
                var MotivoViajeRegistro =  $("#MovimientoRegistroMotivoViaje").val();
                var TipoTransporteRegistro =  $("#MovimientoRegistroTipoTransporte").val();
                var ObservacionesRegistro = $("#MovimientoRegistroObservaciones").val();

                // datos de la habitacion
                var NombreHabitacion = $("#NombreHabitacionRegistro").val();
                var CantidadAultos = $("#CantidadAdultosRegistro").val();
                var CantidadNinos = $("#CantidadNinosRegistro").val();
                var Desayuno = "";
                      var CadenaDesayuno = $('#SelectDesayunoRegistro').val();
                      var FinValorDesayuno = CadenaDesayuno.indexOf('-');
                      Desayuno = (CadenaDesayuno).substr(0,FinValorDesayuno);
                var ValorEstadia = $("#ValorEstadiaHabitacionRegistro").val();
                var NitResponsableMovimientoHab = $("#NitResponsableRegistro").val();
                var NombresResponsableMovimeintoHab = $("#NombreResponsableRegistro").val();
                var ApellidosResponsableMovimientoHab = $("#ApelldisoResponsableRegistro").val();
                var ObservacionesMovimientoHab = $("#ObservacionesHabitacionRegistro").val();
                
                /*validación Datos de habitacion antes de cargar parametros */
                if(NombreHabitacion == "" || CantidadAultos == 0 || NitResponsableMovimientoHab == "" || NombresResponsableMovimeintoHab == "" || ApellidosResponsableMovimientoHab == "")
                {
                        $('#NombreHabitacionRegistro').addClass("has-error");
                        $('#CantidadAdultosRegistro').addClass("has-error");
                        $('#CantidadNinosRegistro').addClass("has-error");
                        $('#NitResponsableRegistro').addClass("has-error");
                        $('#NombreResponsableRegistro').addClass("has-error");
                        $('#ApelldisoResponsableRegistro').addClass("has-error");
                        swal("Error","Verifique los datos de la habitación","warning");
                }
                else{
                        var Parametros = {
                                "NombreProceso" : "RegistroMovimiento",
                                "DatosClienteRegistro" : DatosClienteRegistro,
                                "Reserva" : ReservaSi,
                                "IdMovimientoHabitacion" : IdMovimientoHabitacion,
                                "EstadoRegistro": EstadoRegistro,
                                "FechaEntradaRegistro" : FechaEntradaRegistro,
                                "FechaSalidaRegistro" : FechaSalidaRegistro,
                                "TarifaRegistro" : TarifaRegistro,
                                "MotivoViajeRegistro" : MotivoViajeRegistro,
                                "TipoTransporteRegistro" : TipoTransporteRegistro,
                                "ObservacionesRegistro" : ObservacionesRegistro,
                                "NombreHabitacion" : NombreHabitacion,
                                "CantidadAdultos" : CantidadAultos,
                                "CantidadNinos" : CantidadNinos, 
                                "DesayunoNombre" : Desayuno,
                                "ValorEstadiaMovimiento" : ValorEstadia,
                                "NitResponsableMovimientoHabitacion" : NitResponsableMovimientoHab,
                                "NombreResponsableMovimientoHab" : NombresResponsableMovimeintoHab,
                                "ApellidoResponsableMovimientoHab" : ApellidosResponsableMovimientoHab,
                                "ObservacionesMovimientoHab" : ObservacionesMovimientoHab
                        };
                }
        }
        $.ajax({
                data: Parametros,
                url:"../modulos/movimiento/funciones.php",
                type: 'post',
                success: function (response) {
                        var Respuesta = response.trim();
                        if(Respuesta == "ACTUALIZOMOVIMIENTOHABITACION")
                        {
                                RegistrarHuespedes();
                        }
                        else{
                                swal("Error","Revise los datos","warning");
                        }
                }
        });
}


/*Paso17 */
function ExisteHuesped(TipoHuesped,Cedula,TipoDocument,IdCajaNombre,IdCajaApellido,IdCajaNacionalidad,IdCajaFechaNacimiento)
{      
        var TipHuesped = TipoHuesped; 
        var documento1 = Cedula;
        var TipoDocumento = TipoDocument;
        var IdCajaNombr = IdCajaNombre;
        var IdCajaApellid = IdCajaApellido;
        var IdCajaNacionalida = IdCajaNacionalidad;
        var IdCajaFechaNacimi = IdCajaFechaNacimiento;

        var numeroCEDULA = $("#"+documento1).val();
        var tipoDOCUMENTO = $("#"+TipoDocumento).val();

        var Parametros = {
                        "NumeroDocumento" : numeroCEDULA,
                        "TipoDocumento" : tipoDOCUMENTO,
                        "NombreProceso" : "TraerDatosHuesped"
                };
        $.ajax({
                data: Parametros,
                url:"../modulos/movimiento/funciones.php",
                type: 'post',
                success: function (response) {
                        var Datos =  JSON.parse(response);
                        if(Datos == ""){}
                        else{
                        $("#"+IdCajaNombr).val(Datos[0].NombreHuesped);
                        $("#"+IdCajaApellid).val(Datos[0].ApellidoHuesped);
                        $("#"+IdCajaNacionalida).val(Datos[0].NacionalidadHuesped);
                        $("#"+IdCajaFechaNacimi).val(Datos[0].FechaNacimientoHuesped);
                        }
                }
        });
}




/*Paso18 */
// variable Movmiento para insertar huespedes y actualizar
function CargarFormularioHuespedes(IdMovimientoHab,NombreHabitacion,CantAdultos,CantNinos,TipoMovimiento,NitResponsable,Responsable)
{
        var Parametros = {
                "IdMovimiento": IdMovimientoHab,
                "NombreHabitacion":NombreHabitacion,
                "CantAdultos": CantAdultos,
                "CantNinos": CantNinos,
                "TipoMovimiento" : TipoMovimiento,
                "NitResponsable":NitResponsable,
                "NombreResponsable":Responsable,
        }
        console.log(Parametros);
        $.ajax({
                data: Parametros,
                url:"../modulos/movimiento/Registro/RegistrarHuespedes.php",
                type: 'post',
                beforeSend: function () {
                        $("#ContenedorRegistroHuespedes").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#ContenedorRegistroHuespedes").show();
                        $("#ContenedorRegistroHuespedes").html(response);
                        $("#SegundoContenedorHuespedesRegistroConReserva").show();
                        $('#GuardarRegistro').val(IdMovimientoHab);
                }
        });
}


/*Paso19 */
// Funciones para traer los formularios de los datos del cliente en el formulario
//reserva despues de seleccionar el tipo de cliente
function TraerFormularioDatosClienteReserva()
{       var NumeroForm = $('#ClienteTipoReserva').val();
        var ruta = "";
        switch (NumeroForm)
                {
                case '1':

                      ruta ="../modulos/movimiento/Reserva/TipoCliente/Particular.php";
                      MostrarFormularioDatosClienteReserva(ruta);
                      break;

                case '2':
                      ruta ="../modulos/movimiento/Reserva/TipoCliente/Corporativo.php";
                      MostrarFormularioDatosClienteReserva(ruta);
                      break;

                case '3':

                      ruta="../modulos/movimiento/Reserva/TipoCliente/Agencia.php";
                      MostrarFormularioDatosClienteReserva(ruta);
                      break;
                }
}



/*Paso20 */
function MostrarFormularioDatosClienteReserva(ruta)
{
        var parametros = "";
        $.ajax({
                data: parametros,
                url: ruta,
                type: 'post',
                beforeSend: function () {
                        $("#ContenedorDatosClienteReserva").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#ContenedorDatosClienteReserva").html(response);
                }
        });
}



// aqui terminan las funciones para traer formularios datos cliente en reserva
// Funciones para traer los formularios de los datos del cliente en el formulario
//Registro despues de seleccionar el tipo de cliente
/*Paso21 */
function TraerFormularioDatosClienteRegistro()
{       var NumeroForm = $('#ClienteTipoRegistro').val();
        var ruta = "";
        switch (NumeroForm)
                {
                case '1':
                      $("#CodigoMagico").val("");
                      ruta ="../modulos/movimiento/Registro/TipoCliente/Particular.php";
                      MostrarFormularioDatosClienteRegistro(ruta);
                      break;

                case '2':
                      $("#CodigoMagico").val("");
                      ruta ="../modulos/movimiento/Registro/TipoCliente/Corporativo.php";
                      MostrarFormularioDatosClienteRegistro(ruta);
                      break;

                case '3':
                      $("#CodigoMagico").val("");
                      ruta="../modulos/movimiento/Registro/TipoCliente/Agencia.php";
                      MostrarFormularioDatosClienteRegistro(ruta);
                      break;
                }
}



/*Paso22 */
function MostrarFormularioDatosClienteRegistro(ruta)
{
        var parametros = "";
        $.ajax({
                data: parametros,
                url: ruta,
                type: 'post',
                beforeSend: function () {
                        $("#ContenedorDatosClienteRegistro").html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $("#ContenedorDatosClienteRegistro").html(response);
                        $("#DepartamentoClienteParticularRegistro").attr("disabled",true);
                        $("#CiudadClienteParticularRegistro").attr("disabled",true);
                        // $("#CodigoMagico").attr("disabled",false);
                }
        });
}
// aqui terminan las funciones para traer formularios datos cliente en reserva



/*Paso23 */
// validar cantidad adultos y niños segun la habitacion
var TipoHab = "";
 // variables para sacar el valor por habitacion Formulario Reserva traidas de una consulta
 var ValorPax = 0;
 var ValorAdicional = 0;

function CantMaxAdultos(NombreHabitacion,NombreMovimiento)
{
        /* Proceso pra saber si la habitacion ingresada esta disponible */
                var FechaEntrada = '';
                var FechaSalida = '';
                if(NombreMovimiento == "RESERVA")
                {
                        FechaEntrada = $("#MovimientoReservaFechaEntrada").val();
                        FechaSalida = $("#MovimientoReservaFechaSalida").val();
                }
                else
                {
                        FechaEntrada = $("#MovimientoRegistroFechaEntrada").val();
                        FechaSalida = $("#MovimientoRegistroFechaSalida").val();
                }
                
        if( FechaEntrada != "" || FechaSalida !="" )
        {  
                if(NombreHabitacion  == "")
                {
                        swal("Información","Ingrese Habitacion","info");
                }
                {
                        var Parametros = {
                                "NombreProceso":"VerficarOcupacionHabitacion",
                                "Habitacion" : NombreHabitacion,
                                "FechaEntrada" : FechaEntrada,
                                "FechaSalida" :FechaSalida
                              };
                              $.ajax({
                                      data: Parametros,
                                      url: "../modulos/movimiento/funciones.php",
                                      type: 'POST',
                                      success: function (response) {
                                              if(response == "NADA")
                                              {
                                                      if(NombreMovimiento == "RESERVA")
                                                      {
                                                        $('#IngresarReserva').attr('disabled',false);
                                                        $('#Desayuno').prop('checked', false).change()
                                                      }
                                                      else{
                                                        $('#GuardarRegistro').attr('disabled',false);
                                                        $('#Desayuno').prop('checked', false).change()
                                                      }
                                                var Parametros = {
                                                        "NombreProceso" : "CantMaximaAdultos",
                                                        "NombreHabitacion" : NombreHabitacion
                                                    };
                                                           //console.log("Este es el Nombre de la Habitacion : "+ Parametros.NombreHabitacion)
                                                           $.ajax({
                                                           data : Parametros,
                                                           url : "../modulos/movimiento/funciones.php",
                                                           type : 'post',
                                                              success : function(response){
                                                                      if(response.trim() != "")
                                                                      {
                                                                              var Datos = JSON.parse(response);
                                                                              TipoHab = Datos[0].NombreHabitacionTipo;
                                                                                   if(NombreMovimiento == "RESERVA")
                                                                                   {
                                                                                           $('#CantidadAdultos').attr('max',Datos[0].CantidadPaxHabitacionTipo);
                                                                                           $('#CantidadAdultos').attr('value',1);
                                                                                   }
                                                                                   else
                                                                                   {
                                                                                           $("#CantidadAdultosRegistro").attr('max',Datos[0].CantidadPaxHabitacionTipo);
                                                                                           $("#CantidadAdultosRegistro").attr('value',1); 
                                                                                   }
                                                                                   ValorPax = parseInt(Datos[0].ValorPaxHabitacionTipo);
                                                                                   ValorAdicional = parseInt(Datos[0].ValorAdicionalHabitacionTipo);
                                                                                   localStorage.NombreMovimiento = NombreMovimiento;
                                                                                   TraerIva();
                                                                                      //console.log('caja de texto cantidad adultos ' +$('#CantidadAdultos').attr('max',Datos.CantidadPaxHabitacionTipo));
                                                                             
                                                                      }
                                                                   }
                                                           });
                                                     
                                              }
                                              else
                                              {
                                                      var Datos =  JSON.parse(response);
                                                      console.log(Datos);
                                                      if( (Datos[0].TipoMovimiento == "RESERVA GARANTIZADA" &&  Datos[0].EstadoMovimiento == "ACTIVO" &&  Datos[0].EstadoMovimientoHabitacion == "ACTIVO" ) || ( Datos[0].TipoMovimiento == "CHECK IN" && Datos[0].EstadoMovimiento == "ACTIVO" && Datos[0].EstadoMovimientoHabitacion == "ACTIVO") )
                                                      {
                                                        swal("Información","La Habitacion esta apartada","info");
                                                        if(NombreMovimiento == "RESERVA")
                                                        {
                                                                $('#NombreHabitacion').val('');
                                                                $('#IngresarReserva').attr('disabled',true);
                                                                $('#CantidadAdultos').attr('value',0);
                                                                $('#Desayuno').prop('checked', false).change();
                                                                $('#ValorEstadiaHabitacion').val(0);

                                                        }
                                                        else
                                                        {
                                                                $('#NombreHabitacionRegistro').val('');
                                                                $('#GuardarRegistro').attr('disabled',true);
                                                                $('#CantidadAdultosRegistro').attr('value',0);
                                                                $('#Desayuno').prop('checked', false).change();
                                                                $('#ValorEstadiaHabitacionRegistro').val(0);      
                                                        }
                                                        
                                                      }
                                                      else
                                                      {
                                                        $('#GuardarRegistro').attr('disabled',false);
                                                        $('#IngresarReserva').attr('disabled',false);
                                                                var Parametros = {
                                                                                     "NombreProceso" : "CantMaximaAdultos",
                                                                                     "NombreHabitacion" : NombreHabitacion
                                                                                 };
                                                                //console.log("Este es el Nombre de la Habitacion : "+ Parametros.NombreHabitacion)
                                                                $.ajax({
                                                                data : Parametros,
                                                                url : "../modulos/movimiento/funciones.php",
                                                                type : 'post',
                                                                   success : function(response){
                                                                           if(response.trim() != "")
                                                                           {
                                                                                   var Datos = JSON.parse(response);
                                                                                   TipoHab = Datos[0].NombreHabitacionTipo;
                                                                                        if(NombreMovimiento == "RESERVA")
                                                                                        {
                                                                                                $('#CantidadAdultos').attr('max',Datos[0].CantidadPaxHabitacionTipo);
                                                                                                $('#CantidadAdultos').attr('value',1);
                                                                                        }
                                                                                        else
                                                                                        {
                                                                                                $("#CantidadAdultosRegistro").attr('max',Datos[0].CantidadPaxHabitacionTipo);
                                                                                                $("#CantidadAdultosRegistro").attr('value',1); 
                                                                                        }
                                                                                        ValorPax = parseInt(Datos[0].ValorPaxHabitacionTipo);
                                                                                        ValorAdicional = parseInt(Datos[0].ValorAdicionalHabitacionTipo);
                                                                                        localStorage.NombreMovimiento = NombreMovimiento;
                                                                                        TraerIva();
                                                                                           //console.log('caja de texto cantidad adultos ' +$('#CantidadAdultos').attr('max',Datos.CantidadPaxHabitacionTipo));
                                                                                  
                                                                           }
                                                                        }
                                                                });
                                                      }
                                              }
                                      }
                              });  
                }      
        }
        else
        {
                swal("Información","Ingrese fechas","info");
        }
}




/*Paso24 */
function TraerIva()
{
        Parametros = {
                  "NombreProceso" : "TraerIvaEstadia"
        };
        $.ajax({
                data : Parametros,
                url : "../modulos/movimiento/funciones.php",
                type : 'post',
                success : function(response){
                       var IvaHotel = response.trim();
                        //console.log(IvaHotel);
                       IvaEstadia = parseInt(IvaHotel);

                       localStorage.ivahotelg = IvaHotel;
                     }
             });
}



/*Paso25 */
function CantMaxNinos(CantAdul,MaxCantAdult)
{      var ValorCajaAdult = CantAdul;
       var MaxCantAdultos = "";
       var CantMaxNinos = "";
       if(MaxCantAdult == "")
       {
               MaxCantAdultos = 0;
       }
       else
       {
        MaxCantAdultos = parseInt(MaxCantAdult);
       console.log("Maxima cantidad de adultos :"+MaxCantAdultos);
                if (ValorCajaAdult > MaxCantAdult)
                {
                        swal("Información","La cantidad maxima de adultos es :"+MaxCantAdult,"info");
                }
                else
                {

                   var CantMaxNinos = MaxCantAdult-ValorCajaAdult;
                   if(CantMaxNinos == 0)
                   {    
                        var Movimiento = localStorage.NombreMovimiento;
                        if(Movimiento == "RESERVA")
                        {
                                $('#CantidadNinos').attr('disabled',true);
                                // Calcular el valor de descuento la tarifa
                                var Id = $('#MovimientoReservaTipoTarifa').val();
                        }
                        else
                        {
                                // se coloca esta validacion del boton para cada vez ue haga un cambio en la caja se pase a false
                                $("#BtnAgregarHuespedesRegistro").attr("disabled",false);
                                $("#CantidadNinosRegistro").attr('disabled',true);
                                var Id = $('#MovimientoReservaTipoTarifa').val();
                        }
                         TraerPorfencajeTarifa(Id);
                   }
                   else
                   {
                        var Movimiento = localStorage.NombreMovimiento;
                        if(Movimiento == "RESERVA")
                        {
                                //console.log('Maxima cantidad de niños: ' +CantMaxNinos);
                                $('#CantidadNinos').attr('disabled',false);
                                $('#CantidadNinos').attr('max',CantMaxNinos);
                                  // Calcular el valor de descuento la tarifa
                                var Id = $('#MovimientoRegistroTipoTarifa').val();
                        }
                        else{
                                // se coloca esta validacion del boton para cada vez ue haga un cambio en la caja se pase a false
                                $("#BtnAgregarHuespedesRegistro").attr("disabled",false);
                                $('#CantidadNinosRegistro').attr('disabled',false);
                                $('#CantidadNinosRegistro').attr('max',CantMaxNinos);
                                var Id = $('#MovimientoRegistroTipoTarifa').val();
                        }
                        TraerPorfencajeTarifa(Id);

                   }
                }
        }
}



/*Paso26 */
// variable para hacer fomula del valor de la habitacion
var PorcentajeDescuento = 0;
function ValidarCantNinos(ValorCaja,CapacidadMax)
{
        var ValorCaja = "";
        var CapacidadMax = "";
        if(ValorCaja > CapacidadMax )
        {
                swal("Información","La cantidad maxima de niños es :"+CapacidadMax,"info");
                $('#CantidadNinos').attr('value',0);
                $('#CantidadNinosRegistro').attr('value',0);
        }
        else{
                // se coloca esta validacion del boton para cada vez ue haga un cambio en la caja se pase a false
                $("#BtnAgregarHuespedesRegistro").attr("disabled",false);
               var Parametros = {"NombreProceso" : "ConsultarDescuentoNinos"};
                $.ajax({
                        data : Parametros,
                        url : "../modulos/movimiento/funciones.php",
                        type : 'post',
                        success : function(response){
                                if(response.trim() != "")
                                {
                                        var Datos = JSON.parse(response);
                                        PorcentajeDescuento = parseInt(Datos.PorcentajeDescuentoNinosParametros);
                                        console.log('Porcentaje de descuento niños : '+Datos.PorcentajeDescuentoNinosParametros);
                                         var Id = $('#MovimientoReservaTipoTarifa').val();
                                         TraerPorfencajeTarifa(Id);
                                }
                             }
                     });
        }
}



/*Paso27 */
function TraerPorfencajeTarifa(Id)
{    
        var Parametros = {
                "NombreProceso" : "TraerPorcenjaeTarifa",
                "IdTarifa" : Id
            }
            //console.log(Parametros);
  $.ajax({
            data : Parametros,
            url : "../modulos/movimiento/funciones.php",
            type : "POST",

            success: function(response)
            {
                console.log(response);
                var Porcentaje = JSON.parse(response);
                localStorage.PorcentajeTarifa = Porcentaje;
                //console.log(Porcentaje[0].PorcentajeTarifa);
                FormulaValorHabitacion(Porcentaje);
            }
        });
        
}



/*Paso28 */
// sumatoria para dar valor habitacion
function FormulaValorHabitacion(PorcentajeTarifa)
{       var Movimiento = localStorage.NombreMovimiento;
        var IvaEstadia = localStorage.ivahotelg;
        if(Movimiento == "RESERVA")
        {    
                
                // Dias que se hospedara en el hotel. Utilizado en ambas fechas
                // el moment se agrega para poder hacer lad iferencia de dias
                // el substrig es porque el mosmen solicita parametros yyyy-mm-12 y se usa para cortar la hora
                // val para traer el valor de la caja de fecha
                 var FechaInicial = moment(($('#MovimientoReservaFechaEntrada').val()).substr(0,10));
        
                 var FechaFinal = moment(($('#MovimientoReservaFechaSalida').val()).substr(0,10));
        
                 var DiferenciaDias = FechaFinal.diff(FechaInicial, 'days');
        
                 //---------------------------------
                // Sacar el valos de la caja de cuantos adultos  y niños se van a hospedar
                var CantidadAdultosOperacion = parseInt($('#CantidadAdultos').val());
                
                var CantidadNinos = parseInt($('#CantidadNinos').val());
        

                //validar fecha antes de operacion
                if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaInicial,FechaFinal) == 0)
                {
                        // cuando colocamos el nombre o numero de la habitacion, no traera el valor del pax y el adicional y los almacenarmos en las
                        // siguientes variables ValorPax y ValorAdicional
                        // aplicamos la formula
                        if(CantidadNinos != 0)
                                {
                                        var ValorEstadiaNino = ValorAdicional-((ValorAdicional*PorcentajeDescuento)/100);
                                        // console.log('Valor Niños: '+ValorEstadiaNino);
                                        //console.log('Valor Pax : '+ValorPax);
                                
                                        ValorEstadiaNino = ValorEstadiaNino*CantidadNinos;

                                        var ValorEstadiaAdulto = ValorPax * CantidadAdultosOperacion;
                                        // console.log(ValorEstadiaAdulto);
                                
                                        var ValorEstadiaTotalPax = ValorEstadiaAdulto + ValorEstadiaNino;
                                        // console.log("suma pax y un niño : "+ValorEstadiaTotalPax);
                                        // se saca el valor de la habitacion     
                                        var EstadiaHabitacion = (ValorEstadiaTotalPax*DiferenciaDias);
                                        // se obtiene el valor que se va a restar al valor de la habitacion segun el tipo de tarifa
                                        var ValorDescuentoTarifa =((EstadiaHabitacion*parseInt(PorcentajeTarifa)/100));
                                        // console.log("Tarifa :"+ValorDescuentoTarifa);
                                        var ValorIva = ((EstadiaHabitacion*IvaEstadia/100));
                                        // console.log("Iva : "+ValorIva);
                                
                                        //restamos el valor de descuento tarifa con el valor de la habitacion
                                        EstadiaHabitacion = (EstadiaHabitacion-ValorDescuentoTarifa)+ValorIva;
                                        // console.log('Valor Total Estadia Habitacion: '+EstadiaHabitacion);
                                        $('#ValorEstadiaHabitacion').val(EstadiaHabitacion);
                                }
                        else
                                {  
                                        var ValorEstadiaAdulto = ValorPax * CantidadAdultosOperacion;
                                
                                        var ValorEstadiaTotalPax = ValorEstadiaAdulto;
                                
                                        var EstadiaHabitacion = (ValorEstadiaTotalPax*DiferenciaDias);
                                
                                        var ValorDescuentoTarifa =((EstadiaHabitacion*parseInt(PorcentajeTarifa)/100));

                                        var ValorIva = ((EstadiaHabitacion*IvaEstadia/100));
                                
                                        EstadiaHabitacion = (EstadiaHabitacion-ValorDescuentoTarifa)+ValorIva;
                                        // console.log('Valor Total Estadia Habitacion: '+EstadiaHabitacion);
                                        $('#ValorEstadiaHabitacion').val(EstadiaHabitacion);
                                }
                }
                else
                {
                        swal("Informacion","Revise las fechas de entrada y salida","info");
                }
        }
        else
        {
                 // Dias que se hospedara en el hotel. Utilizado en ambas fechas
                // el moment se agrega para poder hacer lad iferencia de dias
                // el substrig es porque el mosmen solicita parametros yyyy-mm-12 y se usa para cortar la hora
                // val para traer el valor de la caja de fecha
                var FechaInicial = moment(($('#MovimientoRegistroFechaEntrada').val()).substr(0,10));
        
                var FechaFinal = moment(($('#MovimientoRegistroFechaSalida').val()).substr(0,10));
       
                var DiferenciaDias = FechaFinal.diff(FechaInicial, 'days');
       
                //---------------------------------
                // Sacar el valos de la caja de cuantos adultos  y niños se van a hospedar
                var CantidadAdultosOperacion = parseInt($('#CantidadAdultosRegistro').val());
                
                var CantidadNinos = parseInt($('#CantidadNinosRegistro').val());
                
                 //validar fecha antes de operacion
                if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaInicial,FechaFinal) == 0)
                {
                        // cuando colocamos el nombre o numero de la habitacion, no traera el valor del pax y el adicional y los almacenarmos en las
                        // siguientes variables ValorPax y ValorAdicional
                        // aplicamos la formula
                        if(CantidadNinos != 0)
                                {
                                
                                        var ValorEstadiaNino = ValorAdicional-((ValorAdicional*PorcentajeDescuento)/100);
                                        console.log('Valor Niños: '+ValorEstadiaNino);
                                        //console.log('Valor Pax : '+ValorPax);
                                
                                        ValorEstadiaNino = ValorEstadiaNino*CantidadNinos;

                                        var ValorEstadiaAdulto = ValorPax * CantidadAdultosOperacion;
                                        console.log(ValorEstadiaAdulto);
                                
                                        var ValorEstadiaTotalPax = ValorEstadiaAdulto + ValorEstadiaNino;
                                        console.log("suma pax y un niño : "+ValorEstadiaTotalPax);
                                        // se saca el valor de la habitacion     
                                        var EstadiaHabitacion = (ValorEstadiaTotalPax*DiferenciaDias);
                                        // se obtiene el valor que se va a restar al valor de la habitacion segun el tipo de tarifa
                                        var ValorDescuentoTarifa =((EstadiaHabitacion*parseInt(PorcentajeTarifa)/100));
                                        console.log("Tarifa :"+ValorDescuentoTarifa);
                                        var ValorIva = ((EstadiaHabitacion*IvaEstadia/100));
                                        console.log("Iva : "+ValorIva);
                                
                                        //restamos el valor de descuento tarifa con el valor de la habitacion
                                        EstadiaHabitacion = (EstadiaHabitacion-ValorDescuentoTarifa)+ValorIva;
                                        console.log('Valor Total Estadia Habitacion: '+EstadiaHabitacion);
                                        $('#ValorEstadiaHabitacionRegistro').val(EstadiaHabitacion);
                                }
                        else
                                {  
                                        var ValorEstadiaAdulto = ValorPax * CantidadAdultosOperacion;
                                
                                        var ValorEstadiaTotalPax = ValorEstadiaAdulto;
                                
                                        var EstadiaHabitacion = (ValorEstadiaTotalPax*DiferenciaDias);
                                
                                        var ValorDescuentoTarifa =((EstadiaHabitacion*parseInt(PorcentajeTarifa)/100));

                                        var ValorIva = ((EstadiaHabitacion*IvaEstadia/100));
                                
                                        EstadiaHabitacion = (EstadiaHabitacion-ValorDescuentoTarifa)+ValorIva;
                                        console.log('Valor Total Estadia Habitacion: '+EstadiaHabitacion);
                                        $('#ValorEstadiaHabitacionRegistro').val(EstadiaHabitacion);
                                }
                }
                else
                {
                        swal("Informacion","Revise las fechas de entrada y salida","info");
                }
        }
}




/*Paso29 */
function GeneralParametrosDelHotel()
{
        /*traer la fecha de parametros, para sbele limite de edad de los niños */
        var ParametrosNinos = {"NombreProceso":"TraerFechaNinosParametros"}
        $.ajax({
                data : ParametrosNinos,
                url : "../modulos/movimiento/funciones.php",
                type : "post",
                success : function(response)
                {
                        var Datos = JSON.parse(response);
                        console.log(Datos[0].LimiteEdadParametros);

                        localStorage.LimiteedadNinos = Datos[0].LimiteEdadParametros;
                        
                }
        });
}
// funcion para tabla de habitaciones
var Cont = 0;
var ContRegistro = 0;
var ContRegistroConReserva = 0;
function AgregarRow(Movimiento)
{
        var TipoMovimiento = Movimiento;
        switch(TipoMovimiento)
        {
                case 'RESERVA':
                        var Habitacion = $('#NombreHabitacion').val();
                        var CantidadAdultos= $('#CantidadAdultos').val();
                        var CantidadNinos= $('#CantidadNinos').val();
                
                        var Desayuno = "";
                
                        var CadenaDesayuno = $('#SelectDesayuno').val();
                        var FinValorDesayuno = CadenaDesayuno.indexOf('-');
                        Desayuno = (CadenaDesayuno).substr(0,FinValorDesayuno);
                        //console.log('Desayuno: '+Desayuno);
                
                        var ValorHabitacion = $('#ValorEstadiaHabitacion').val();
                        var NitResponsable = $('#NitResponsable').val();
                        var NombreResponsable = $('#NombreResponsable').val();
                        var ApellidoResponsable = $('#ApelldisoResponsable').val();
                        var ObservacionesHabitacion = $('#ObservacionesHabitacion').val();
                        Cont++;

                        var fila = '<tr id="fila'+Cont+'" class="text-center"><td>'+Cont+'</td><td class="NombreHabitacion">'+Habitacion+'</td><td class="CantidadAdultos">'+CantidadAdultos+'</td><td class="CantidadNinos">'+CantidadNinos+'</td><td class="Desayuno">'+Desayuno+'</td><td class="NitResponsable">'+NitResponsable+'</td><td class="NombreResponsable">'+NombreResponsable+'</td><td class="ApellidoResponsable">'+ApellidoResponsable+'</td><td class="ObservacionesHabitacion">'+ObservacionesHabitacion+'</td><td class="ValorHabitacion">'+ValorHabitacion+'</td><td><button type="button" id="BtnEliminar" class="btn btn-danger" value="fila'+Cont+'" onclick="EliminarRowTablaHabitaciones(this.value)">Eliminar</button></td></tr>';
                        if(Habitacion != "" || CantAdultos != ""  || CantAdultos != "0" || CantAdultos != null)
                        { 
                                if( NitResponsable == "" || NombreResponsable == "" || ApellidoResponsable == "" || ValorHabitacion == "0" || ValorHabitacion == "NaN" || ValorHabitacion == null || ValorHabitacion == "")
                                {
                                        swal("Informacion","Revise los Datos de la habitacion a agregar","info");
                                        $("#IngresarReserva").attr("disabled",true);
                                }
                                else
                                {
                                        $('#TablaHabitacion').append(fila);
                                        ReordenarTablaHabitaciones();
                                
                                        $('#NombreHabitacion').val("");
                                        $('#CantidadAdultos').val(0);
                                        $('#CantidadNinos').val(0);
                                        $('#SelectDesayuno').val("");
                                        $('#ValorEstadiaHabitacion').val("");
                                        $("#ContenedorDesayuno").hide();
                                        $('#ObservacionesHabitacion').val("");
                                        $('#Desayuno').prop('checked', false).change();   
                                        $("#IngresarReserva").attr("disabled",false);
                                }
                                
                        }
                        else
                        {
                                swal("Informacion","Revise los Datos de la habitacion a agregar","info");
                                $("#IngresarReserva").attr("disabled",true);
                        }

                break;

                case 'REGISTRO':
                        GeneralParametrosDelHotel();
                        var TipoHuesped = $("#HuespesTipo").val();
                        var TipoDocumentoHuesped = $("#TipoDocumentoHuesped").val();
                        var NumeroDocumentoHuesped = $("#NumeroDocumentoHuesped").val();
                        var NombreHuesped = $("#NombreHuesped").val();
                        var ApellidosHuesped = $("#ApellidoHuesped").val();
                        var NacionalidadHuesped = $("#NacionalidadHuesped").val();
                        var FechaNacimiento = $("#FechaNacimientoHuesped").val();
                        var SeguroHuesped =  "";
                        if($("#SeguroRegistro").prop('checked') == true)
                        {
                                SeguroHuesped =  "SI";
                        }
                        else
                        {
                                SeguroHuesped =  "NO";
                        }
                        var ObservacionesHuesped = $("#ObservacionesHuesped").val();
                        var ValorEstadia = $("#ValorEstadiaHabitacionRegistro").val();

                        /* Validar Limite de edad */
                        var fechaNace = new Date(FechaNacimiento);
                        var fechaActual = new Date()
                                
                        var mes = fechaActual.getMonth();
                        var dia = fechaActual.getDate();
                        var año = fechaActual.getFullYear();
                                
                        fechaActual.setDate(dia);
                        fechaActual.setMonth(mes);
                        fechaActual.setFullYear(año);
                                
                        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
                        //console.log("Edad  de formula   "+edad+"    , Edad LocalStorage  "+parseInt(localStorage.LimiteedadNinos));

                        /*-------------------- */

                        
                        var fila = '<tr id="fila'+ContRegistro+'" class="text-center"><td>'+ContRegistro+'</td><td class="TipoHuesped">'+TipoHuesped+'</td><td class="TipoDocumento">'+TipoDocumentoHuesped+'</td><td class="NumeroDocumento">'+NumeroDocumentoHuesped+'</td><td class="Nombre">'+NombreHuesped+'</td><td class="Apellidos">'+ApellidosHuesped+'</td><td class="Nacionalidad">'+NacionalidadHuesped+'</td><td class="FechaNacimiento">'+FechaNacimiento+'</td><td class="Seguro">'+SeguroHuesped+'</td><td class="Observaciones">'+ObservacionesHuesped+'</td><td><button type="button" id="BtnEliminar" class="btn btn-danger" value="fila'+ContRegistro+'" onclick="EliminarRowTablaHabitaciones(this.value)">Eliminar</button></td></tr>';
                        if(TipoHuesped == ""  || TipoDocumentoHuesped == ""  ||  NumeroDocumentoHuesped == ""  ||   NombreHuesped == ""  ||  ApellidosHuesped == "" ||   NacionalidadHuesped == "" || ValorEstadia =="" || ValorEstadia == "NaN" || ValorEstadia == null)
                        {
                                swal("Informacion","Revise los datos del huesped a agregar","info");
                                // GeneralParametrosDelHotel();
                        }
                        else
                        {
                                if((edad <= parseInt(localStorage.LimiteedadNinos) && TipoHuesped == "NINO") || (edad>=parseInt(localStorage.LimiteedadNinos) && TipoHuesped == "ADULTO"))
                                {     ContRegistro++;
                        
                                        $('#TablaHuesped').append(fila);
                                        /*Limpiar Cajas */
                                        $("#HuespesTipo").val("");
                                        $("#TipoDocumentoHuesped").val("");
                                        $("#NumeroDocumentoHuesped").val("");
                                        $("#NombreHuesped").val("");
                                        $("#ApellidoHuesped").val("");
                                        $("#NacionalidadHuesped").val("");
                                        $("#FechaNacimientoHuesped").val("");
                                        $('#SeguroRegistro').bootstrapToggle('on');

                                        //Sumatoria para saber cuantas veces se debe agregar a la table
                                        //Toca traer la cantidad de adultos y niños en la cajas
                                        var CantAdultos = parseInt($("#CantidadAdultosRegistro").val());
                                        var CantNinos = parseInt($("#CantidadNinosRegistro").val());
                                        var SumaCantidad = CantAdultos + CantNinos;


                                        $("#CantidadAdultosRegistro").val(0);
                                        $("#CantidadNinosRegistro").val(0);

                                        if(SumaCantidad <= ContRegistro)
                                        {       $("#BtnAgregarHuespedesRegistro").attr("disabled",true);
                                                $("#GuardarRegistro").attr("disabled",false);
                                        }
                                        else
                                        {       $("#BtnAgregarHuespedesRegistro").attr("disabled",false)
                                                $("#GuardarRegistro").attr("disabled",true);
                                        }
                                        ReordenarHuespedesRegistro();
                                }
                                else
                                {
                                        swal("Informacion","Revice Tipo de huesped y fecha nacimiento, El limite de edad niño es  "+localStorage.LimiteedadNinos,"info");
                                        ContRegistro=$("#TablaHuesped tr").length;
                                }
                        }
                break;

                case 'REGISTROCONRESERVA':
                        GeneralParametrosDelHotel();
                        var TipoHuesped = $("#HuespesTipoConReserva").val();
                        var TipoDocumentoHuesped = $("#TipoDocumentoHuespedConReserva").val();
                        var NumeroDocumentoHuesped = $("#NumeroDocumentoHuespedConReserva").val();
                        var NombreHuesped = $("#NombreHuespedConReserva").val();
                        var ApellidosHuesped = $("#ApellidoHuespedConReserva").val();
                        var NacionalidadHuesped = $("#NacionalidadHuespedConReserva").val();
                        var FechaNacimiento = $("#FechaNacimientoHuespedConReserva").val();
                        var SeguroHuesped =  "";
                        if($("#SeguroRegistroConReserva").prop('checked') == true)
                        {
                                SeguroHuesped =  "SI";
                        }
                        else
                        {
                                SeguroHuesped =  "NO";
                        }
                        var ObservacionesHuesped = $("#ObservacionesHuespedConReserva").val();


                        /* Validar Limite de edad */
                        var fechaNace = new Date(FechaNacimiento);
                        var fechaActual = new Date()

                        var mes = fechaActual.getMonth();
                        var dia = fechaActual.getDate();
                        var año = fechaActual.getFullYear();

                        fechaActual.setDate(dia);
                        fechaActual.setMonth(mes);
                        fechaActual.setFullYear(año);

                        edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
                        //console.log("Edad  de formula   "+edad+"    , Edad LocalStorage  "+parseInt(localStorage.LimiteedadNinos));
                        /*-------------------- */



                        var fila = '<tr id="fila'+ContRegistroConReserva+'" class="text-center"><td>'+ContRegistroConReserva+'</td><td class="TipoHuespedConReserva">'+TipoHuesped+'</td><td class="TipoDocumentoConReserva">'+TipoDocumentoHuesped+'</td><td class="NumeroDocumentoConReserva">'+NumeroDocumentoHuesped+'</td><td class="NombreConReserva">'+NombreHuesped+'</td><td class="ApellidosConReserva">'+ApellidosHuesped+'</td><td class="NacionalidadConReserva">'+NacionalidadHuesped+'</td><td class="FechaNacimientoConReserva">'+FechaNacimiento+'</td><td class="SeguroConReserva">'+SeguroHuesped+'</td><td class="ObservacionesConReserva">'+ObservacionesHuesped+'</td><td><button type="button" id="BtnEliminar" class="btn btn-danger" value="fila'+ContRegistroConReserva+'" onclick="EliminarRowTablaHabitaciones(this.value)">Eliminar</button></td></tr>';
                        
                        if(TipoHuesped == ""  || TipoDocumentoHuesped == ""  ||  NumeroDocumentoHuesped == ""  ||   NombreHuesped == ""  ||  ApellidosHuesped == "" ||   NacionalidadHuesped == "")
                        {
                                swal("Informacion","Revise los datos del huesped a agregar","info");
                                GeneralParametrosDelHotel();
                        }
                        else
                        {
                                if((edad <= parseInt(localStorage.LimiteedadNinos) && TipoHuesped == "NINO") || (edad=parseInt(localStorage.LimiteedadNinos) && TipoHuesped == "ADULTO"))
                                {     ContRegistroConReserva++;
                                        $('#TablaHuespedConReserva').append(fila);
                                        
                                        /*Limpiar Cajas */
                                        $("#HuespesTipoConReserva").val("");
                                        $("#NumeroDocumentoHuespedConReserva").val("");
                                        $("#NombreHuespedConReserva").val("");
                                        $("#ApellidoHuespedConReserva").val("");
                                        $("#NacionalidadHuespedConReserva").val("");
                                        $("#FechaNacimientoHuespedConReserva").val("");
                                        $('#SeguroRegistroConReserva').bootstrapToggle('on');
                                        
                                        /* variables para hsaber cuantos son*/
                                        var CantAdultos = parseInt($("#CantAdultRHuespe").text());
                                        var CantNinos = parseInt($("#CantNinosRHuespe").text());
                                        var SumaCantidad = CantAdultos + CantNinos;
                                        console.log("ContadorRegistroReserva   "+ContRegistroConReserva);
                                        console.log("Cantidad Registros tabla  "+ $("#TablaHuespedConReserva tr").length);
                                        $("#CantidadAdultosRegistro").val(0);
                                        $("#CantidadNinosRegistro").val(0);
                                        
                                        if(SumaCantidad <= $("#TablaHuespedConReserva tr").length)
                                        {       $("#BtnAgregarHuespedesConReserva").attr("disabled",true);
                                                $("#GuardarRegistro").attr("disabled",false);
                                        }
                                        else
                                        {       $("#BtnAgregarHuespedesConReserva").attr("disabled",false);
                                                $("#GuardarRegistro").attr("disabled",true);
                                        }
                                        ReordenarHuespedesRegistro();
                                }
                                else
                                {
                                        swal("Informacion","Revice Tipo de huesped y fecha nacimiento, El limite de edad niño es  "+localStorage.LimiteedadNinos,"info");
                                        ContRegistroConReserva= $("#TablaHuespedConReserva tr").length;
                                }
                        }
                break;
        } 
}


/*Paso30 */
function EliminarRowTablaHabitaciones(IdFila)
{
        $('#'+IdFila).remove();
        ReordenarTablaHabitaciones();
        // se coloca esta validacion del boton para cada vez que haga elimine uno lo pueda volver a ingresar
        $("#BtnAgregarHuespedesRegistro").attr("disabled",false);
        $("#BtnAgregarHuespedesConReserva").attr("disabled",false);
}
/*Paso31 */
function ReordenarHuespedesRegistro()
{
        var Num2 =1;
        $('#TablaHuesped tr').each(function(){
                $(this).find('td').eq(0).text(Num2);
                Num2++;
        });
}
/*Paso32 */
function ReordenarTablaHabitaciones()
{
        var Num =1;
        $('#TablaHabitacion tr').each(function(){
                $(this).find('td').eq(0).text(Num);
                Num++;
        });
        var sum = 0;
        $('.ValorHabitacion').each(function() {
            sum += Number($(this).text());
        });
        $('#ValorTotalReserva').val(sum); 
}




/*Paso33 */
function VerificarCajaNitSiEstaVacia(TipoMovimiento)
{       //document.getElementById('ReservaSiNo').disabled = false ;
       // $("#Checkreserva>div").attr( "disabled", true);
        var Movimiento = TipoMovimiento;
        
        var TipoDocumentoCliente = "";
        var NitCliente = "";

                switch( Movimiento)
                {
                        case 'RESERVA':
                        var TipoClienteReserva = document.getElementById('ClienteTipoReserva').value;
                                switch (TipoClienteReserva) {
                                        case '1':
                                        TipoDocumentoCliente = document.getElementById('TipoDocumentoClienteParticularReserva').value;
                                        NitCliente = document.getElementById('NitClienteParticularReserva').value;
                                        if(NitCliente != "")
                                                {
                                                        CargarDatosCliente(Movimiento,TipoClienteReserva,TipoDocumentoCliente,NitCliente);
                                                }
                                        else
                                                {
                                                        swal("Informacion","Ingrese el numero de documento o nit","info");
                                                }
                                        break;
                                case '2':
                                        NitCliente = document.getElementById('NitClienteCorporativoReserva').value;
                                        if(NitCliente != "")
                                                {
                                                        CargarDatosCliente(Movimiento,TipoClienteReserva,TipoDocumentoCliente,NitCliente);
                                                }
                                        else
                                                {
                                                        swal("Informacion","Ingrese el numero de documento o nit","info");
                                                }
                                        break;
                                
                                case '3':
                                        NitCliente = document.getElementById('NitClienteAgenciaReserva').value;
                                        if(NitCliente != "")
                                                {
                                                        CargarDatosCliente(Movimiento,TipoClienteReserva,TipoDocumentoCliente,NitCliente);
                                                }
                                        else
                                                {
                                                        swal("Informacion","Ingrese el numero de documento o nit","info");
                                                }
                                break;
                
                                default:
                                        break;
                                }
                        break;
                      
                case 'REGISTRO':
                    var TipoClienteRegistro = document.getElementById('ClienteTipoRegistro').value;
                        switch(TipoClienteRegistro)
                        {
                                case '1':
                                        TipoDocumento = document.getElementById('TipoDocumentoClienteParticularRegistro').value;
                                        NitParticular = document.getElementById('NitClienteParticularRegistro').value; 
        
                                        if(NitParticular != "")
                                        {
                                                CargarDatosCliente(Movimiento,TipoClienteRegistro,TipoDocumento,NitParticular);
                                                
                                        }
                                        else
                                        {
                                                swal("Informacion","Ingrese el numero de documento o nit","info");
                                        }
                                break;
                                case '2':
                                        NitCorporativo = document.getElementById('NitClienteCorporativoRegistro').value; 
                                        if(NitCorporativo != "")
                                        {
                                                CargarDatosCliente(Movimiento,TipoClienteRegistro,TipoDocumentoCliente,NitCorporativo);
                                                
                                        }
                                        else
                                        {
                                                swal("Informacion","Ingrese el numero de documento o nit","info");
                                        }
                                break;
                                case '3':
                                        NitCorporativo = document.getElementById('NitClienteAgenciaRegistro').value; 
                                        if(NitCorporativo != "")
                                        {
                                                CargarDatosCliente(Movimiento,TipoClienteRegistro,TipoDocumentoCliente,NitCorporativo);
                                                
                                        }
                                        else
                                        {
                                                swal("Informacion","Ingrese el numero de documento o nit","info");
                                        }
                                break;
                        }
                      break;
                }
}




/*Paso34 */
function CargarDatosCliente(Movimiento,TipoCliente,TipoDocumento,NitCliente)
{
        var url = "";
        if(Movimiento == 'RESERVA')
        {
                switch (TipoCliente){
                        case '1':
                                var Parametros = { 
                                    "NombreProceso" : "ConsultarClienteExiste",
                                    "TipoCliente" : TipoCliente,
                                    "TipoDocumento" : TipoDocumento,
                                    "NitCliente" : NitCliente,
                                    "Movimiento" : Movimiento
                                 };
                                break;
                        case '2':
                                var Parametros = { 
                                        "NombreProceso" : "ConsultarClienteExiste",
                                        "TipoCliente" : TipoCliente,
                                        "NitCliente" : NitCliente,
                                        "Movimiento" : Movimiento
                                };
                                break;
                        case '3':
                                var Parametros = { 
                                        "NombreProceso" : "ConsultarClienteExiste",
                                        "TipoCliente" : TipoCliente,
                                        "NitCliente" : NitCliente,
                                        "Movimiento" : Movimiento
                                };
                                break;

                        }
        }
        else if(Movimiento == 'REGISTRO')
        {
                switch(TipoCliente)
                {
                        case '1':
                                var Parametros = { 
                                        "NombreProceso" : "ConsultarClienteExiste",
                                        "TipoCliente" : TipoCliente,
                                        "TipoDocumento" : TipoDocumento,
                                        "NitCliente" : NitCliente,
                                        "Movimiento" : Movimiento
                                };
                        break;
                        case '2':
                                var Parametros = { 
                                        "NombreProceso" : "ConsultarClienteExiste",
                                        "TipoCliente" : TipoCliente,
                                        "NitCliente" : NitCliente,
                                        "Movimiento" : Movimiento
                                };
                        break;
                        case '3':
                                var Parametros = { 
                                        "NombreProceso" : "ConsultarClienteExiste",
                                        "TipoCliente" : TipoCliente,
                                        "NitCliente" : NitCliente,
                                        "Movimiento" : Movimiento
                                };
                        break;
                }
        }
        //console.log(Parametros);
                $.ajax({
                data : Parametros,
                url : "../modulos/movimiento/funciones.php",
                type : "post",
                beforeSend: function () 
                        {
                        },
                success : function(response)
                {
                        console.log("linea :"+response);
                        if(response.trim() == "")
                        { 
                                if(Parametros.Movimiento == "RESERVA"){
                                        switch(Parametros.TipoCliente)
                                        { 
                                                case '1': 
                                                        swal("Información","El cliente no existe","info");
                                                        $('#ClienteParticularNombresReserva').prop("disabled",false);
                                                        $('#ClienteParticularApellidosReserva').prop("disabled",false);
                                                        $('#ClienteParticularTelefono1Reserva').prop("disabled",false);
                                                        $('#ClienteParticularCorreoReserva').prop("disabled",false); 
                                                        break;
                                                case '2':
                                                        swal("Información","El corporativo no existe, dirijase a registrarlo","info");
                                                        break;
                                                case '3':
                                                        swal("Información","La agencia no existe, dirijase a registrarlo","info");
                                                        break;
                                        } 
                                }
                                else if(Parametros.Movimiento == "REGISTRO")
                                {CargarDepartamentos();
                                        switch(Parametros.TipoCliente)
                                        { 
                                                case '1': 
                                                        swal("Información","El cliente no existe","info");
                                                        LimpiarCajas();
                                                        $('#NombreClienteParticularRegistro').prop("disabled",false);
                                                        $('#ApellidosClienteParticularRegistro').prop("disabled",false);
                                                        $('#Telefono1ClienteParticularRegistro').prop("disabled",false);
                                                        $('#CorreoClienteParticularRegistro').prop("disabled",false);

                                                        $('#Telefono2ClienteParticularRegistro').prop("disabled",false);
                                                        $('#CorreoClienteParticularRegistro').prop("disabled",false);
                                                        $('#DireccionClienteParticularRegistro').prop("disabled",false);
                                                        $('#NacionalidadClienteParticularRegistro').prop("disabled",false);

                                                        $('#ActividadEconomicaClieenteParticularRegistro').prop("disabled",false);
                                                        // $('#NumeroCuentaClienteParticularRegistro').prop("disabled",false);

                                                        $('#TipoPersonaClientePartiuclarRegistro').prop("disabled",false);
                                                        $('#TipoContribuyenteClienteParticularRegistro').prop("disabled",false);

                                                        // $('#CodigoMagico').prop("disabled",false);
                                                        
                                                        break;
                                                case '2':
                                                        swal("Información","El corporativo no existe, dirijase a registrarlo","info");
                                                        LimpiarCajas();
                                                        break;
                                                case '3':
                                                        swal("Información","La agencia no existe, dirijase a registrarlo","info");
                                                        LimpiarCajas();
                                                        break;
                                        }   
                                }
                        }
                        else
                        {
                                console.log(response);
                                var Datos=JSON.parse(response.trim());
                                console.log(Datos);
                                if(Parametros.Movimiento == "RESERVA")
                                        {
                                        switch(Parametros.TipoCliente)
                                                { 
                                                        case '1': 
                                                                $('#ClienteParticularNombresReserva').val(Datos[0].NombreCliente);
                                                                $('#ClienteParticularApellidosReserva').val( Datos[0].ApellidoCliente );
                                                                $('#ClienteParticularTelefono1Reserva').val(Datos[0].Telefono1Cliente);
                                                                $('#ClienteParticularCorreoReserva').val(Datos[0].CorreoCliente);

                                                                $('#ClienteParticularNombresReserva').prop("disabled",true);
                                                                $('#ClienteParticularApellidosReserva').prop("disabled",true);
                                                                $('#ClienteParticularTelefono1Reserva').prop("disabled",true);
                                                                $('#ClienteParticularCorreoReserva').prop("disabled",true);
                                                                // console.log("Movimiento :"+ Parametros.Movimiento);
                                                                // console.log("datos: "+ Datos);
                                                                break;
                                                        case '2':
                                                                console.log("datos: "+ Datos);
                                                                $('#NombreClienteCorporativoReserva').val(Datos[0].NombreCliente);
                                                                $('#Telefono1ClienteCorporativoReserva').val(Datos[0].Telefono1Cliente);
                                                                $('#CorreoClienteCorporativoReserva').val(Datos[0].CorreoCliente);

                                                                $('#NombreClienteCorporativoReserva').prop("disabled",true);
                                                                $('#Telefono1ClienteCorporativoReserva').prop("disabled",true);
                                                                $('#CorreoClienteCorporativoReserva').prop("disabled",true);
                                                                //console.log("datos: "+ Datos);
                                                                break;
                                                        case '3':
                                                                $('#NombresClienteAgenciaReserva').val(Datos[0].NombreCliente);
                                                                $('#Telefono1ClienteAgenciaReserva').val(Datos[0].Telefono1Cliente);
                                                                $('#CorreoClienteAagenciaReserva').val(Datos[0].CorreoCliente);

                                                                $('#NombresClienteAgenciaReserva').prop("disabled",true);
                                                                $('#Telefono1ClienteAgenciaReserva').prop("disabled",true);
                                                                $('#CorreoClienteAagenciaReserva').prop("disabled",true);
                                                                break;
                                                } 
                                        }
                                else if(Parametros.Movimiento == "REGISTRO")
                                        { CargarDepartamentos();
                                                switch(Parametros.TipoCliente)
                                                { 
                                                        case '1': 
                                                        $("#ReservaSiNo").prop('disabled',false);

                                                        if(Datos[0].IdCliente == "" || Datos[0].IdCliente == null ){}else{ $('#CodigoMagico').val(Datos[0].IdCliente);}

                                                                if(Datos[0].NombreCliente == "" || Datos[0].NombreCliente == null){}else{$('#NombreClienteParticularRegistro').val(Datos[0].NombreCliente);$("#NombreClienteParticularRegistro").attr( "disabled", true);}
                                                                if(Datos[0].ApellidoCliente == "" || Datos[0].ApellidoCliente == null){}else{$('#ApellidosClienteParticularRegistro').val(Datos[0].ApellidoCliente);$("#ApellidosClienteParticularRegistro").attr( "disabled", true);}
                                                                if(Datos[0].Telefono1Cliente == "" || Datos[0].Telefono1Cliente == null){}else{$('#Telefono1ClienteParticularRegistro').val(Datos[0].Telefono1Cliente);$("#Telefono1ClienteParticularRegistro").attr( "disabled", true);}
                                                                if(Datos[0].CorreoCliente == "" || Datos[0].CorreoCliente == null){}else{$('#CorreoClienteParticularRegistro').val(Datos[0].CorreoCliente);$("#CorreoClienteParticularRegistro").attr( "disabled", true);}
                                                                // if(Datos[0].CodigoMagicoCliente == "" || Datos[0].CodigoMagicoCliente == null ){}else{ $('#CodigoMagico').val(Datos[0].CodigoMagicoCliente);$('#CodigoMagico').prop('disabled', true);}
                                                                if(Datos[0].Telefono2Cliente == "" || Datos[0].Telefono2Cliente == null ){}else{ $('#Telefono2ClienteParticularRegistro').val(Datos[0].Telefono2Cliente);$('#Telefono2ClienteParticularRegistro').prop('disabled', true);}
                                                                if(Datos[0].DireccionCliente == "" || Datos[0].DireccionCliente == null){}else{ $('#DireccionClienteParticularRegistro').val(Datos[0].DireccionCliente);$('#DireccionClienteParticularRegistro').prop('disabled', true);}
                                                                if(Datos[0].PreferenciasCliente == "" || Datos[0].PreferenciasCliente == null){}else{ $('#PreferenciasClienteParticularRegistro').val(Datos[0].PreferenciasCliente);}
                                                                if(Datos[0].NacionalidadCliente == "" || Datos[0].NacionalidadCliente == null){}else{ $('#NacionalidadClienteParticularRegistro').val(Datos[0].NacionalidadCliente);$('#NacionalidadClienteParticularRegistro').prop('disabled', true);}
                                                                if(Datos[0].IdCiudad == "" || Datos[0].Telefono2Cliente == null){}else{$('#CiudadClienteParticularRegistro').val(Datos[0].IdCiudad);
                                                                $('#CiudadClienteParticularRegistro').prop('disabled', true);CargarDepartamentosConIdCiudad(Datos[0].IdCiudad);}
                                                                if(Datos[0].ActividadEconomicaCliente == "" || Datos[0].ActividadEconomicaCliente == null){}else{ $('#ActividadEconomicaClieenteParticularRegistro').val(Datos[0].ActividadEconomicaCliente);$('#ActividadEconomicaClieenteParticularRegistro').prop('disabled', true);}
                                                                // if(Datos[0].NumeroCuentaCliente == "" || Datos[0].NumeroCuentaCliente == null){}else{ $('#NumeroCuentaClienteParticularRegistro').val(Datos[0].NumeroCuentaCliente);$('#NumeroCuentaClienteParticularRegistro').prop('disabled', true);}
                                                                if(Datos[0].IdPersonaTipo == "" || Datos[0].IdPersonaTipo == null){}else{ $('#TipoPersonaClientePartiuclarRegistro').val(Datos[0].IdPersonaTipo);$('#TipoPersonaClientePartiuclarRegistro').prop('disabled', true);}
                                                                if(Datos[0].IdContribuyenteTipo == "" || Datos[0].IdContribuyenteTipo == null ){}else{$('#TipoContribuyenteClienteParticularRegistro').val(Datos[0].IdPersonaTipo);$('#TipoContribuyenteClienteParticularRegistro').prop('disabled', true);}
                                                                $("#Checkreserva>div").attr( "disabled", false);
                                                                // console.log("Movimiento :"+ Parametros.Movimiento);
                                                                // console.log("datos: "+ Datos);

                                                                // Funcion para buscar los movimientos que tiene el cliente como 'reserva garantizada'
                                                                
                                                                break;
                                                        case '2':
                                                                $("#Checkreserva>div").attr( "disabled", false);
                                                                // console.log("datos: "+ Datos);
                                                                $('#NombreClienteCorporativoRegistro').val(Datos[0].NombreCliente);
                                                                $('#NombreClienteCorporativoRegistro').attr( "disabled", true);
                                                                $('#CodigoMagico').val(Datos[0].IdCliente);
                                                                $("#CodigoMagico").attr( "disabled", true);
                                                                // $('#Telefono1ClienteCorporativoReserva').val(Datos[0].Telefono1Cliente);
                                                                // $('#CorreoClienteCorporativoReserva').val(Datos[0].CorreoCliente);
                                                                //console.log("datos: "+ Datos);
                                                                break;
                                                        case '3':
                                                                $("#Checkreserva>div").attr( "disabled", false);
                                                                $('#NombreClienteAgenciaRegisgtro').val(Datos[0].NombreCliente);
                                                                $('#NombreClienteAgenciaRegisgtro').attr( "disabled", true);
                                                                $('#CodigoMagico').val(Datos[0].IdCliente);
                                                                $("#CodigoMagico").attr( "disabled", true);
                                                                // $('#Telefono1ClienteAgenciaReserva').val(Datos[0].Telefono1Cliente);
                                                                // $('#CorreoClienteAagenciaReserva').val(Datos[0].CorreoCliente);
                                                                break;
                                                } 
                                        } 
                                } 
                        }
                });
 }



 /*Paso35 */
function TraerCodigoCorporativoYAgencia()
{
        var TipoCliente = $("#ClienteTipoRegistro").val();
        switch(TipoCliente)
                {
                        case '2':
                                $("#Checkreserva>div").attr('disabled',false);
                                var IdCliente = $("#ConveniosSelectRegistro").val();
                                var Parametros = {
                                        "NombreProceso" : "TraerCodigoClietneRegistroCorporativoYAgencias",
                                        "IdCliente" : IdCliente
                                }
                                break;
                        case '3':
                                $("#Checkreserva>div").attr('disabled',false);
                                var IdCliente = $("#ConveniosSelectRegistro").val();
                                var Parametros = {
                                        "NombreProceso" : "TraerCodigoClietneRegistroCorporativoYAgencias",
                                        "IdCliente" : IdCliente
                                }
                                break;
                } 
        $.ajax({        
                data : Parametros,
                url : "../modulos/movimiento/funciones.php",
                type : "post",
                success : function(response)
                        {
                               var Codigo = response;
                                switch(TipoCliente)
                                {
                                        case '2':
                                                $("#CodigoMagico").val(Codigo);
                                                $("#CodigoMagico").attr( "disabled", true);
                                        break;

                                        case '3':
                                                $("#CodigoMagico").val(Codigo);
                                                $("#CodigoMagico").attr( "disabled", true);
                                        break;
                                }      
                        }
                });
}




/*Paso36 */
function CajasParaHacerConsultaInformes(TipoDeInforme)
{
        var parametros = "";
        switch(TipoDeInforme)
        {
                case 'ExtrangerosAlojados':
                               var ruta = "../modulos/movimiento/InformeEstangerosAlojados.php";
                               var DivContendor = "ContenedorInformeEstrangerosAlojados";
                               var Fecha1ExtrangerosAlojados = $("#Fecha1EstrangerosAlojados").val();
                               var Fecha2ExtrangerosAlojados = $("#Fecha2EstrangerosAlojados").val();

                               parametros = {
                                "Fecha1ExtrangerosAlojados":Fecha1ExtrangerosAlojados,
                                "Fecha2ExtrangerosAlojados":Fecha2ExtrangerosAlojados       
                               }
                        break;
                case 'LlegadasEsperadas':
                                var ruta = "../modulos/movimiento/InformeLlegadasEsperadas.php";
                                var DivContendor = "ContenedorInformeLlegadasEsperadas";
                                var Fecha1LlegadasEsperadas = $("#Fecha1LlegadasEsperadas").val();
                                var Fecha2LlegadasEsperadas = $("#Fecha2LlegadasEsperadas").val();
                                parametros = {
                                 "Fecha1LlegadasEsperadas":Fecha1LlegadasEsperadas,
                                 "Fecha2LlegadasEsperadas":Fecha2LlegadasEsperadas       
                                }
                        break;
                case 'ListadoMovimientosParaImprimir':
                                var ruta = "../modulos/movimiento/ListaMovimientosParaImprimir.php";
                                var DivContendor = "ContenedorMovimientosParaImprimir";
                                var Fecha1MovimientosParaImprimir = $("#Fecha1MovimientosParaImprimir").val();
                                parametros = {
                                        "Fecha1MovimientosParaImprimir":Fecha1MovimientosParaImprimir 
                                       }
                        break;
        }
        $.ajax({
                data: parametros,
                url: ruta,
                type: 'post',
                beforeSend: function () {
                        $('#'+DivContendor).html("Procesando, espere por favor...");
                },
                success: function (response) {
                        $('#'+DivContendor).html(response);
                }
        });
}
/*paso 37 */
function ImprimirFomularioRegistroCheckIn(dt)
{
        $("#IdMovimientoHabitacionImpreciónCheckIn").text(dt.IdMovimientoHabitacion);
        /**Cliente */
        $("#NitClienteImprecionCheckIn").text(dt.NitCliente);
        $("#NombreClienteImprecionCheckIn").text(dt.NombreCliente+" "+dt.ApellidoCliente);
        $("#CorreoClienteImprecionCheckIn").text(dt.CorreoCliente);
        $("#TelefonoImprecionCheckIn").text(dt.Telefono1Cliente);
        $("#NacionalidadClienteImprecionCheckIn").text(dt.NacionalidadCliente);
        $("#DepartamentoImprecionCheckIn").text(dt.NombreDepartamento);
        $("#CiudadClienteImprecionCheckIn").text(dt.NombreCiudad);

        /**Reserva */
        if(dt.TipoMovimiento == 'RESERVA GARANTIZADA')
        {
                $("#ReservaClienteImprecionCheckIn").text('SI');
        }
        else
        {
                $("#ReservaClienteImprecionCheckIn").text('NO');
        }
        $("#TarifaImprecionCheckIn").text(dt.NombreTarifa);
        $("#TipoTransporteImprecionCheckIn").text(dt.TipoTransporteMovimiento);
        $("#MotivoViajeClienteImprecionCheckIn").text(dt.MotivoViajeMovimiento);

        $("#HabitacionImprecionCheckIn").text(dt.NombreHabitacion);
        $("#CantidadAdultosImprecionCheckIn").text(dt.CantidadAdultosMovimientoHabitacion);
        $("#CantidadNinosImprecionCheckIn").text(dt.CantidadNinosMovimientoHabitacion);
        $("#NombreResponsableHabitacionImprecionCheckIn").text(dt.NombreResponsableMovimientoHabitacion+" "+dt.ApellidoResponsableMovimientoHabitacion);
        $("#NitResponsableHabitacionImprecionCheckIn").text(dt.NitResponsableMovimientoHabitacion);
        var Dato = {
                "NombreProceso" : "DatosHuespedesParaImprimir",
                "IdMovimientoHabitacion" : dt.IdMovimientoHabitacion
        };
        //console.log(Dato);
        $.ajax({
                data: Dato,
                url: "../modulos/movimiento/funciones.php",
                type: 'POST',
                success: function (response) {
                        var Datos =  JSON.parse(response);
                      //  console.log(Datos);
                        for(var i = 0; i< Datos.length ; i++)
                        {
                        $("#ContenedorImpreciónParaHuespedes").append("<tr><td class='borde' colspan='3'><strong class='flotar-Izquiperda'>Nacionalidad: &nbsp;&nbsp;    </strong> <div class='flotar-Izquiperda' id=''>"+Datos[i].NacionalidadHuesped+"</div></td>        <td class='borde' colspan='5'><strong class='flotar-Izquiperda'>Número Doc: &nbsp;&nbsp;    </strong> <div class='flotar-Izquiperda' id=''>"+Datos[i].NumeroDocumentoHuesped+"</div></td></tr>       <tr><td class='borde' colspan='8'><strong class='flotar-Izquiperda'>Nombre: &nbsp;&nbsp;    </strong> <div class='flotar-Izquiperda' id=''>"+Datos[i].NombreHuesped+"   "+Datos[i].ApellidoHuesped+"</div></td> </tr>");
                        }
                        imprSelec('ContenedorImpresion');
                        $("#ContenedorImpreciónParaHuespedes tr").remove();
                }
        });
}

function ValidarFechasOnchange(FechaEntrada,FechaSalida)
{
        if (FechaEntrada != "" && FechaSalida == ""){}
        else if((FechaSalida !="" && FechaEntrada == "") || FechaEntrada  == FechaSalida)
        {
                swal("Información!!","Las Fechas No coinciden","info");
        }
        else{
                if(FechaSalidaNoPuedeSerMenorAFechaEntrada(FechaEntrada,FechaSalida) == 1)
                {
                        swal("Información!!","Las Fechas No coinciden","info");
                }else
                {}
        }
}
function ActualizarHuesped(DatosDelHuesped)
{
        $("#TipoHuespedActualizarHuesped").val(DatosDelHuesped['TipoHuesped']);
        $("#TipoDocumentoHuespedActualizar").val(DatosDelHuesped['TipoDocumentoHuesped']);
        $("#NumeroDocumentoHuespedActualizar").val(DatosDelHuesped['NumeroDocumentoHuesped']);
        $("#NacionalidadHuespedHuespedActualizar").val(DatosDelHuesped['NacionalidadHuesped']);
        $("#FechaNacimientoHuespedActualizar").val(DatosDelHuesped['FechaNacimientoHuesped']);
        $("#NombreHuespedHuespedActualizar").val(DatosDelHuesped['NombreHuesped']);
        $("#ApellidoHuespedHuespedActualizar").val(DatosDelHuesped['ApellidoHuesped']);
}
function ActualizarHuespedDatosCargados()
{
       var TipoHuesped = $("#TipoHuespedActualizarHuesped").val();
       var TipoDocumento = $("#TipoDocumentoHuespedActualizar").val();
       var NumeroDocumento = $("#NumeroDocumentoHuespedActualizar").val();
       var Nacionalidad = $("#NacionalidadHuespedHuespedActualizar").val();
       var FechaNaciomiento = $("#FechaNacimientoHuespedActualizar").val();
       var Nombre = $("#NombreHuespedHuespedActualizar").val();
       var Apellido = $("#ApellidoHuespedHuespedActualizar").val();

       if(TipoHuesped == "" || TipoDocumento == "" || NumeroDocumento == "" || Nacionalidad == "" || FechaNaciomiento == "" || Nombre == "" || Apellido == "")
       {
        swal("Información!!","Faltas datos por llenar","info");
       }else
       {
                var Parametros = {
                        "NombreProceso" : "ActualizarHuespedFormulario",
                        "TipoHuesped" : TipoHuesped,
                        "TipoDocumento" : TipoDocumento,
                        "NumeroDocumento" : NumeroDocumento,
                        "Nacionalidad" : Nacionalidad,
                        "FechaNaciomiento" : FechaNaciomiento,
                        "Nombre" : Nombre,
                        "Apellido" : Apellido
                };
                $.ajax({
                        data: Parametros,
                        url: "../modulos/movimiento/funciones.php",
                        type: 'POST',
                        success: function (response) {
                                swal("OK!!","Actualizo los datos","success");
                                LimpiarCajas();
                                var url="../modulos/movimiento/HistorialHuespedes.php";
                                cargar(url,"HistorialHuespedesFormulario"); 

                        }
                });
       }
}
/****************************Jose***********************************************/

//codigo de Brahyan Marquez

/*** quitar select*/
function QuitarOption(SelectDesde,SelectHasta){
        
        var Valor=$("#"+SelectDesde+" option:selected").text();
        /* console.log(Valor); */
        
        $('#'+SelectHasta+' option').each(function() {
        if ( $(this).text() == Valor) {
                $(this).remove();
        }
        });
}
/*** */
function ActualizarCambioHabitacion(){

        var  HabitacionActual = $("#HabitacionActual").val();
        var  HabitacionCambio = $("#HabitacionCambio").val();
        var  ObservacionesCambio = $("#ObservacionesCambio").val();
 
        var HBACTUALconver = JSON.parse(HabitacionActual);
        var HBCAMBIOconver = JSON.parse(HabitacionCambio);
        
        var IdMovimientoHabitacionTraido = HBACTUALconver.IdMovimientoHabitacion;
        var observaciones = HBACTUALconver.ObservacionesMovimientoHabitacion;
        var IdHabitacionTrada = HBCAMBIOconver.IdHabitacion;
        var observacionFinal = observaciones +" "+ ObservacionesCambio;
 
 
        Parametros = {
         "IdMovimientoHabitacionTraido": IdMovimientoHabitacionTraido,
         "IdHabitacionTrada": IdHabitacionTrada,
         "observacionFinal": observacionFinal,
         "NombreProceso": "ActualizarCambioHabitacion"
        };
        /* console.log(Parametros); */
        $.ajax({
                type: "POST",
                url: "../modulos/movimiento/funciones.php",
                data: Parametros,
                success: function (response) {
                        if(response = "ACTUALIZO"){
                                 swal("Actualización!!","Cambios Realizados Con Exito","success"); 
                                 document.getElementById("HabitacionActual").value = "";
                                 LimpiarCajas();    
                                 location.reload();
                                 
                        }else{
                                 swal("Error","No se pudo Actualizar Cambio de Habitación","error");
                        }
                }
        });
 
}
// otro

function CargarDatosHuespedExtra(){
        
        var CapturaDatos = $("#SelecHabitacionesActualizarHuespedes").val();
        var dtHuesped = JSON.parse(CapturaDatos);
        
        $("#CantidadPaxHuespedExtras").text(dtHuesped.CantidadPaxHabitacionTipo);
        $("#EstadoPaxHuespedExtras").text(dtHuesped.EstadoMovimiento);
        $("#FechaEntradaHuespedExtras").text(dtHuesped.FechaEntradaMovimiento);
        $("#FechaSalidaHuespedExtras").text(dtHuesped.FechaSalidaMovimiento);
        $("#CantAdultosHuespedExtras").text(dtHuesped.CantidadAdultosMovimientoHabitacion);
        $("#CantNinosHuespedExtras").text(dtHuesped.CantidadNinosMovimientoHabitacion);
        $("#NitResponsableHuespedExtras").text(dtHuesped.NitResponsableMovimientoHabitacion);
        $("#NombreResponsableHuespedExtras").text(dtHuesped.NombreResponsableMovimientoHabitacion);
        var cantidadPAX = parseInt(dtHuesped.CantidadPaxHabitacionTipo);
        /* console.log(cantidadPAX); */

        console.log(dtHuesped);
        var Parametros = {
                "NombreProceso": "ConsultaCantidadPax",
                "IdMovimientohabitacion": dtHuesped.IdMovimientohabitacion
        };

                $.ajax({
                        type: "POST",
                        url: "../modulos/movimiento/funciones.php",
                        data: Parametros,
                        success: function (response) {
                                 console.log(response); 

                                 try {
                                        var y = JSON.parse(response);
                                          /*  console.log(y); */
                                          $("#CantAdultosHuespedExtras").text(y.ADULTOS);
                                          $("#CantNinosHuespedExtras").text(y.NINOS);
                                          $("#CantExtrasHuespedAdicionales").text(y.ADICIONALES);
                                          /* console.log(y.ADICIONALES); */
                                          var pax = parseInt(y.TOTALPAX);
                                          if(pax == cantidadPAX){
                                                  $("#BtnAgregarHuespedesHuespedExtras").prop("disabled", true);
                                          }else{
                                                  $("#BtnAgregarHuespedesHuespedExtras").prop("disabled", false);
                                          }
                                 } catch (error) {
                                        
                                 }

                                     
                        }
                });
}
function CargarDatosHuespedPasadia(){
        
        var CapturaDatos = $("#SelecHabitacionesActualizarHuespedePasadia").val();
        var dtHuesped = JSON.parse(CapturaDatos);
        
        $("#CantidadPaxHuespedPasadias").text(dtHuesped.CantidadPaxHabitacionTipo);
        $("#EstadoPaxHuespedPasadias").text(dtHuesped.EstadoMovimiento);
        $("#FechaEntradaHuespedPasadias").text(dtHuesped.FechaEntradaMovimiento);
        $("#FechaSalidaHuespedPasadias").text(dtHuesped.FechaSalidaMovimiento);
        $("#NitResponsableHuespedPasadias").text(dtHuesped.NitResponsableMovimientoHabitacion);
        $("#NombreResponsableHuespedPasadias").text(dtHuesped.NombreResponsableMovimientoHabitacion);
        var cantidadPAX = parseInt(dtHuesped.CantidadPaxHabitacionTipo);
        
        var Parametros = {
                "NombreProceso": "ConsultaCantidadPax",
                "IdMovimientohabitacion": dtHuesped.IdMovimientohabitacion
        };

                $.ajax({
                        type: "POST",
                        url: "../modulos/movimiento/funciones.php",
                        data: Parametros,
                        success: function (response) {
                                var y = JSON.parse(response);
                                $("#CantAdultosHuespedPasadia").text(y.ADULTOS);
                                $("#CantNinosHuespedPasadia").text(y.NINOS);
                                $("#CantPasadiaHuespedAdicionales").text(y.ADICIONALES);
                        }
                });
        
        /* cargar Datos de TablaPasadia  */
                /* var cantidadP = document.getElementById("CantidadPaxHuespedPasadias").innerHTML; */

                $.ajax({
                        type: "POST",
                        url: "../modulos/movimiento/PasadiaListarDatos.php",
                        data: {"IdMovimientoHabitacion": dtHuesped.IdMovimientohabitacion, "CantidadPax": cantidadPAX },
                        success: function (response) {
                               $("#CargarTablaPasadia").html(response);
                        }
                });
}
function ConultaHuespedExtra(){

        var NitHuesped = $("#NumeroDocumentoHuespedHuespedExtras").val();
        
        var Parametros = {
                "NumeroDocumento" : NitHuesped,
                "NombreProceso" : "TraerDatosHuespedExtras"
        };

        $.ajax({
                type: "POST",
                url: "../modulos/movimiento/funciones.php",
                data: Parametros,
                success: function (response) {
                        if(response != "" ){
                               
                        }else{
                                var Conversion = JSON.parse(response);
                        console.log(Conversion);
                        document.getElementById("TipoHuespedExtras").value = Conversion.TipoHuesped;
                        document.getElementById("NacionalidadHuespedHuespedExtras").value = Conversion.NacionalidadHuesped;
                        document.getElementById("FechaNacimientoHuespedExtras").value = Conversion.FechaNacimientoHuesped;
                        document.getElementById("NombreHuespedHuespedExtras").value = Conversion.NombreHuesped;
                        document.getElementById("ApellidoHuespedHuespedExtras").value = Conversion.ApellidoHuesped;
                        $("#ObservacionesHuespedHuespedExtras").text(Conversion.ObservacionesHuesped);
                                if(Conversion.SeguroHuesped == "0" || Conversion.SeguroHuesped == "" ){
                                        document.getElementById('SeguroRegistroHuespedExtras').checked = false;
                                }else{
                                        document.getElementById('SeguroRegistroHuespedExtras').checked = true;
                                }
                        }
                }
        });


}
function RegistrarHuespedExtras(){
        
        var TipoHuespedExtras = $("#TipoHuespedExtras").val();
        var TipoDocumentoHuespedExtras = $("#TipoDocumentoHuespedExtras").val();
        var NumeroDocumentoHuespedHuespedExtras = $("#NumeroDocumentoHuespedHuespedExtras").val();
        var NacionalidadHuespedHuespedExtras = $("#NacionalidadHuespedHuespedExtras").val();
        var FechaNacimientoHuespedExtras = $("#FechaNacimientoHuespedExtras").val();
        var SeguroRegistroHuespedExtras = $("#SeguroRegistroHuespedExtras").val();
        var NombreHuespedHuespedExtras = $("#NombreHuespedHuespedExtras").val();
        var ApellidoHuespedHuespedExtras = $("#ApellidoHuespedHuespedExtras").val();
        var ObservacionesHuespedHuespedExtras = $("#ObservacionesHuespedHuespedExtras").val();
        var p = $("#SelecHabitacionesActualizarHuespedes").val();

        /* console.log(Parametros); */

        if(TipoHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Tipo Huesped.", "warning");        
        }
        else if(TipoDocumentoHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Tipo Documento.", "warning");        
        }
        else if(p.trim() == ""){
                swal("No selecciono!", "Falta por selecionar una Habitación.", "warning");        
        }
        else if(NumeroDocumentoHuespedHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Numero Documento.", "warning");        
        }
        else if(NacionalidadHuespedHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Nacionalidad .", "warning");        
        }
        else if(FechaNacimientoHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Fecha Nacimiento.", "warning");        
        }
        else if(NombreHuespedHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Nombre Huesped.", "warning");        
        }
        else if(ApellidoHuespedHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Apellido Huesped.", "warning");        
        }
        else if(ObservacionesHuespedHuespedExtras.trim() == ""){
                swal("Campo Vacio!", "Falta por Agregar Datos en el Campo Observaciones Huesped .", "warning");        
        }else{
               
             
         var IdMovimientoHabitacionHuespedExtras = JSON.parse(p); 

        var Parametros = {
                "TipoHuespedExtras": TipoHuespedExtras,
                "TipoDocumentoHuespedExtras": TipoDocumentoHuespedExtras,
                "NumeroDocumentoHuespedHuespedExtras": NumeroDocumentoHuespedHuespedExtras,
                "NacionalidadHuespedHuespedExtras": NacionalidadHuespedHuespedExtras,
                "FechaNacimientoHuespedExtras": FechaNacimientoHuespedExtras,
                "SeguroRegistroHuespedExtras": SeguroRegistroHuespedExtras,
                "NombreHuespedHuespedExtras": NombreHuespedHuespedExtras,
                "ApellidoHuespedHuespedExtras": ApellidoHuespedHuespedExtras,
                "ObservacionesHuespedHuespedExtras": ObservacionesHuespedHuespedExtras,
                "IdMovimientoHabitacionHuespedExtras": IdMovimientoHabitacionHuespedExtras.IdMovimientohabitacion,
                "NombreProceso": "RegistrarHuespedExtras"
        };
        $.ajax({
                type: "POST",
                url: "../modulos/movimiento/funciones.php",
                data: Parametros,
                success: function (response) {
                        if(response == "INSERTO"){
                                swal("Registro!", "Registro realizado Con Exito.", "success");   
                                LimpiarCajas();  
                                
                                var parametros = "";
                                var ruta = "../modulos/movimiento/MovimientoTab.php";
                                $.ajax({
                                        data: parametros,
                                        url: ruta,
                                        type: 'post',
                                        beforeSend: function () {
                                                $("#Forms").html("Procesando, espere por favor...");
                                        },
                                        success: function (response) {
                                                $("#Forms").html(response);
                                        }
                                });
                        }else{
                                swal("error!", "No se Registro Extra.", "error");
                        }
                }
        });

        }

}
function ActualizarFechaSalida(IdHuesped){

        var Paramentros = {
                "IdHuesped": IdHuesped,
                "NombreProceso": "ActualizarFechaPasadia"
        };

        swal({ 
                title: "¿Esta seguro que el Huesped o continua con la estadía?",
                text: "Una vez realizada la Salida no se podrá realizar el Cambio...",
                type: "warning",
                showCancelButton: true,
                cancelButtonText: "CancelarSalida",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "¡Continular!",
                closeOnConfirm: false },
                function(){ 

                $.ajax({
                        type: "POST",
                        url: "../modulos/movimiento/funciones.php",
                        data: Paramentros,
                        success: function (response) {
                              
                                if(response == "ACTUALIZO"){
                                        swal("¡Hecho!","El Huésped ha dejado la Estadía en el Hotel.","success");
                                        CargarDatosHuespedPasadia();
                                }else{
                                        swal("¡Error!","La Actualización del Huésped en la Estadía del Hotel No se realizo.","error");
                                        
                                } 
                        }
                         
                        });  
        });

               
}
function ConsultaMovimientoEspecifico(){
        var datos = $("#EspecificoMovimintoFechaEntrada").val();
        var Paramentros = {
                "FechaMovimientoEspecifico" : datos
        };
        $.ajax({
                type: "POST",
                url: "../modulos/movimiento/MovimientoEspecificoListarDatos.php",
                data: Paramentros,
                success: function (response) {
                        $("#CargarTablaMovimientoEspecifico").html(response);
                }
        });
}
function ActualizarMovimientoEspecifico(dt){
        
        var Paramentros = {
                "ESTADO": dt.ESTADO,
                "IdMovimiento":dt.IdMovimiento,
                "IdMovimientoHabitacion":dt.IdMovimientoHabitacion,
                "NombreProceso": "ActualizarMovimientoEspecifico"
        };
        // console.log(Paramentros);
        $.ajax({
                type: "POST",
                url: "../modulos/movimiento/funciones.php",
                data: Paramentros,
                success: function (response) {
                        if(response == "ACTUALIZO"){
                                swal("Exito!!","Actualizacion Realizada","success");
                                ConsultaMovimientoEspecifico();

                        }else{
                                swal("Error","No se pudo Actualizar Movimiento","error");
                        }
                }
        });


}



function ValidarExistenciaCliente(){
        var ClienteNumeroDocumento = $("#ClienteNumeroDocumento").val();
        var Parametros = {
                "NumeroDocumento":ClienteNumeroDocumento,
                "NombreProceso": "ConsultaCliente"
        };
        $.ajax({
                type: "POST",
                url: "../modulos/registroindividual/funciones.php",
                data: Parametros,
                success: function (response) {
                     if(response.trim() =="CLIENTEENCONTRADO"){
                        swal("Ojo con el Cliente","El Cliente ya se encuentra Registrado !!","warning");
                     }
                     
                }
        });
}
function HabilitarDepartamentoDatosCliente()
{
        var Nacionalidad = $('#NacionalidadClienteParticularRegistro').val();
        if(Nacionalidad != "colombiano" ){
                $('#ClienteDepartamento').attr("disabled",true);
                $('#ClienteCiudadLista').attr("disabled",true);
                CargarSelectDepartamentoConCiudad('-1');
        }
        else{
                $('#ClienteDepartamento').attr("disabled",false);
                $('#ClienteCiudadLista').attr("disabled",false);
                /* CargarDepartamentos(); */
        }
}
function CargarCiudad(){
        /*  var departamento = document.getElementById("ClienteDepartamento").value; */
         var departamento = $("#ClienteDepartamento").val();
         CargarSelectDepartamentoConCiudad(departamento);
}
function CargarSelectDepartamentoConCiudad(Departamento)
{
                    $.ajax({
                           data : {"IdDepartamento":Departamento},
                           url : "../modulos/controles/CiudadSelect.php",
                           type : "post",
                           success : function(response)
                           {
                                   $("#ClienteCiudadLista").html(response);
                                   
                           }
                    });
}

function CargarCiudadActualzar(){
        /*  var departamento = document.getElementById("ClienteDepartamento").value; */
         var departamento = $("#ClienteDepartamentoActualizar").val();
         CargarSelectDepartamentoConCiudadActualizar(departamento);
 }

 function CargarSelectDepartamentoConCiudadActualizar(Departamento)
 {
                     $.ajax({
                            data : {"IdDepartamento":Departamento},
                            url : "../modulos/controles/CiudadSelect.php",
                            type : "post",
                            success : function(response)
                            {
                                    $("#ClienteCiudadListaActualizar").html(response);
                                    
                            }
                     });
 }

function RadioTipoClienteAcutalizar(dato){
        
        switch (dato) {
                case 'Particular':
                $("#ClienteValorCreditoActualizar1").hide();
                $("#ClienteConvenioSINOActualizar1").hide();
                $("#ClienteListadodeConveniosActualizar1").hide();
                $("#ClienteComisionConvenioActualizar1").hide();    
                localStorage.TipoClienteActualizar = 1; 
                break;

                case 'Agencia':
                $("#ClienteValorCreditoActualizar1").show();
                $("#ClienteConvenioSINOActualizar1").show();
                $("#ClienteListadodeConveniosActualizar1").show();
                $("#ClienteComisionConvenioActualizar1").show();   
                localStorage.TipoClienteActualizar = 2;     
                break;

                case 'Corporativo':
                $("#ClienteValorCreditoActualizar1").show();
                $("#ClienteConvenioSINOActualizar1").show();
                $("#ClienteListadodeConveniosActualizar1").show();
                $("#ClienteComisionConvenioActualizar1").hide();
                localStorage.TipoClienteActualizar = 3;     
                break;
        
                default:
                RadioTipoClienteAcutalizar('Particular');
                break;
        }
}



function ClienteRegistrar(){

        var ClienteNombre = $("#ClienteNombre").val();
        var ClienteApellido = $("#ClienteApellido").val();
        var ClienteTipoDocumento = $("#ClienteTipoDocumento").val();
        var ClienteNumeroDocumento = $("#ClienteNumeroDocumento").val();
        var ClienteTelefono1 = $("#ClienteTelefono1").val();
        var ClienteCorreo = $("#ClienteCorreo").val();
        var ClienteTelefono2 = $("#ClienteTelefono2").val();
        var ClienteDireccion = $("#ClienteDireccion").val();
        var ClienteActividadEconomica = $("#ClienteActividadEconomica").val();
        var ClienteNumeroCuenta = $("#ClienteNumeroCuenta").val();
        var NacionalidadClienteParticularRegistro = $("#NacionalidadClienteParticularRegistro").val();
        var ClienteCiudadLista = $("#ClienteCiudadLista").val();
        var ClienteTipoPersona = $("#ClienteTipoPersona").val();
        var ClienteTipoContribuyente = $("#ClienteTipoContribuyente").val();
        var ClienteCodigoMagico = $("#ClienteCodigoMagico").val();
        var ClientePreferencias = $("#ClientePreferencias").val();
        var ClienteObservaciones = $("#ClienteObservaciones").val();
        var ClienteValorCredito = $("#ClienteValorCredito").val();
        var ClienteListadodeConvenios = $("#ClienteListadodeConvenios").val();
        var ClienteComisionConvenio = $("#ClienteComisionConvenio").val();
        var IdClienteTipo = localStorage.TipoCliente;
        
        var Parametros = {
                "ClienteNombre" : ClienteNombre,
                "ClienteApellido" : ClienteApellido,
                "ClienteTipoDocumento" : ClienteTipoDocumento,
                "ClienteNumeroDocumento" : ClienteNumeroDocumento,
                "ClienteTelefono1" : ClienteTelefono1,
                "ClienteTelefono2" : ClienteTelefono2,
                "ClienteDireccion" : ClienteDireccion,
                "ClienteCorreo" : ClienteCorreo,
                "ClienteActividadEconomica" : ClienteActividadEconomica,
                "ClienteNumeroCuenta" : ClienteNumeroCuenta,
                "NacionalidadClienteParticularRegistro" : NacionalidadClienteParticularRegistro,
                "ClienteCiudadLista" : ClienteCiudadLista,
                "ClienteTipoPersona" : ClienteTipoPersona,
                "ClienteTipoContribuyente" : ClienteTipoContribuyente,
                "ClienteCodigoMagico" : ClienteCodigoMagico,
                "ClientePreferencias" : ClientePreferencias,
                "ClienteObservaciones" : ClienteObservaciones,
                "ClienteValorCredito" : ClienteValorCredito,
                "ClienteListadodeConvenios" : ClienteListadodeConvenios,
                "ClienteComisionConvenio" : ClienteComisionConvenio,
                "IdClienteTipo": IdClienteTipo,
                "NombreProceso": "RegistroCliente"
        };
        console.log(Parametros);
        switch (IdClienteTipo) {
                case "1":
                        if(ClienteNombre.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");         
                        }
                        else if(ClienteApellido.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Apellido  !!","warning");
                        }
                        else if(ClienteTipoDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo TipoDocumento  !!","warning");
                        }
                        else if(ClienteNumeroDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
                        }
                        else if(ClienteTelefono1.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
                        }
                        else if(ClienteCorreo.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
                        }else{
                                console.log(Parametros); 
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/registroindividual/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                             if(response =="REGISTRO"){
                                                swal("Correcto","El Cliente Registrado con exito !!","success");
                                                LimpiarCajas();
                                                RadioTipoCliente('Particular');
                                             }else{
                                                swal("Error","El Cliente No se Registro Datos","error");
                                             }  
                                        }
                                });
                        }

                        break;
                case "2":

                        if(ClienteNombre.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");         
                        }
                        else if(ClienteNumeroDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
                        }
                        else if(ClienteTelefono1.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
                        }
                        else if(ClienteCorreo.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
                        }else{
                                console.log(Parametros); 
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/registroindividual/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                        if(response =="REGISTRO"){
                                                swal("Correcto","El Cliente Registrado con exito !!","success");
                                                LimpiarCajas();
                                                RadioTipoCliente('Agencia');
                                        }else{
                                                swal("Error","El Cliente No se Registro Datos","error");
                                        }  
                                        }
                                });
                        }
                        
                        break;
                case "3":

                        if(ClienteNombre.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Nombre  !!","warning");         
                        }
                        else if(ClienteNumeroDocumento.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Numero Documento  !!","warning");
                        }
                        else if(ClienteTelefono1.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Telefono1  !!","warning");
                        }
                        else if(ClienteCorreo.trim() ==""){
                                swal("Campos Vacios","Verificar Campo Correo  !!","warning");
                        }else{
                                console.log(Parametros); 
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/registroindividual/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                        if(response =="REGISTRO"){
                                                swal("Correcto","El Cliente Registrado con exito !!","success");
                                                LimpiarCajas();
                                                RadioTipoCliente('Corporativo');
                                        }else{
                                                swal("Error","El Cliente No se Registro Datos","error");
                                        }  
                                        }
                                });
                        }
                        break;
        
                default:
                swal("Error","Verificar Campos !!","warning");
                        break;
        }
        
}

function BuscarClienteTransfiere(EmisorOReceptorTransferencias){
        if(EmisorOReceptorTransferencias == "EMISOR")
        {
                var Nit = $("#NitTransferenciasEmisor").val();

                var Parametros = {
                        "Nit": Nit,
                        "EmisorOReceptorTransferencias": EmisorOReceptorTransferencias,
                        "NombreProceso" : "ConsultaDatosClienteTransfiere"
                        }
        }
        else
        {
                var Nit = $("#NitTransferenciasReceptor").val();

                var Parametros = {
                        "Nit": Nit,
                        "EmisorOReceptorTransferencias": EmisorOReceptorTransferencias,
                        "NombreProceso" : "ConsultaDatosClienteTransfiere"
                        }
        }
        
        $.ajax({
                type: "POST",
                url: "../modulos/facturacion/funciones.php",
                data: Parametros,
                success: function (response) {
                        var t = JSON.parse(response);
                        if(t.length == 0)
                        {
                                if(EmisorOReceptorTransferencias == "EMISOR")
                                {swal("Información","El cliente no tiene ninguna recerva o registro con abonos","info"); LimpiarCajas();}
                                else{swal("Información","El cliente no tiene ninguna recerva o registro sin abonos","info");}
                                LimpiarCajas();
                                $("#ListadoMovimientosTransferenciaEmisor option").remove();
                                $("#ListadoMovimientosTransferenciaReceptor option").remove();
                        }
                        else
                        {   
                                    // console.log("TipoCliente"+t[0].IdClienteTipo);
                                if(EmisorOReceptorTransferencias == "EMISOR")
                                { 
                                        $("#ListadoMovimientosTransferenciaEmisor option").remove();
                                        if(t[0].IdClienteTipo == '1')
                                        {
                                                $("#NombreClienteTransferenciasEmisor").val(t[0].NombreCliente+"  "+t[0].ApellidoCliente);
                                        }
                                        else
                                        {
                                                $("#NombreClienteTransferenciasEmisor").val(t[0].NombreCliente);
                                        }
                                        $("#ListadoMovimientosTransferenciaEmisor").append("<option value=''>Seleccione Movimiento</option>");
                                        for(var i = 0 ; i < t.length ; i++)
                                        {
                                                $("#ListadoMovimientosTransferenciaEmisor").append("<option value="+t[i].IdMovimiento+">"+t[i].TipoMovimiento+"</option>");
                                        }
                                }
                                else
                                {
                                        $("#ListadoMovimientosTransferenciaReceptor option").remove();
                                        if(t[0].IdClienteTipo == '1')
                                        {
                                                $("#NombreClienteTransferenciasReceptor").val(t[0].NombreCliente+"  "+t[0].ApellidoCliente);
                                        }
                                        else
                                        {
                                                $("#NombreClienteTransferenciasReceptor").val(t[0].NombreCliente);
                                        }
                                        $("#ListadoMovimientosTransferenciaReceptor").append("<option value=''>Seleccione Movimiento</option>");
                                        for(var i = 0 ; i < t.length ; i++)
                                        {
                                                $("#ListadoMovimientosTransferenciaReceptor").append("<option value="+t[i].IdMovimiento+">"+t[i].TipoMovimiento+"</option>");
                                        }
                                }
                        }
                }
        });

}

function MostrarHabitacionesFormularioTransferencia(EmisorOReceptorTransferencias)
{
        if(EmisorOReceptorTransferencias == "EMISOR")
        {
                var IdMovimiento = $("#ListadoMovimientosTransferenciaEmisor").val();

                var Parametros = {
                        "IdMovimiento": IdMovimiento,
                        "NombreProceso" : "ConsultaHabitacionesClienteTransfiere"
                        }
        }
        else
        {
                var IdMovimiento = $("#ListadoMovimientosTransferenciaReceptor").val();

                var Parametros = {
                        "IdMovimiento": IdMovimiento,
                        "NombreProceso" : "ConsultaHabitacionesClienteTransfiere"
                        }
        }
        $.ajax({
                type: "POST",
                url: "../modulos/facturacion/funciones.php",
                data: Parametros,
                success: function (response) {
                        var Cadena = "";
                        var Dt = JSON.parse(response);
                        for(var i = 0 ; i < Dt.length ; i++)
                        {       if(i == 0)
                                {
                                        Cadena=Dt[i].NombreHabitacion;
                                }
                                else
                                {
                                        Cadena = Cadena+" , "+Dt[i].NombreHabitacion; 
                                }
                        }
                        if(EmisorOReceptorTransferencias == "EMISOR")
                        {
                                $("#HabitacionesTransferenciasEmisor").val(Cadena);
                                $("#AbonoTotalEmisor").val(Dt[0].AbonoMovimiento);
                                
                        }
                        else
                        {
                                $("#HabitacionesTransferenciasReceptor").val(Cadena);
                                $("#AbonoTotalReceptor").val(Dt[0].AbonoMovimiento);
                        }
                        
                }
        });
}
function InsertFormularioTransferencia()
{
        /*Validaciones */
        if($("#NitTransferenciasEmisor").val() == "" || $("#NitTransferenciasEmisor").val() == null || $("#NitTransferenciasReceptor").val() == "" || $("#NitTransferenciasReceptor").val() == null)
                {$('#NitTransferenciasEmisor').addClass("has-error");
                 $('#NitTransferenciasReceptor').addClass("has-error");
                 swal("Error","Verifique nit de los clientes","warning");  
                }
        else if($("#NombreClienteTransferenciasEmisor").val() == "" || $("#NombreClienteTransferenciasEmisor").val() == null || $("#NombreClienteTransferenciasReceptor").val() == "" || $("#NombreClienteTransferenciasReceptor").val() == null)
                {$('#NombreClienteTransferenciasEmisor').addClass("has-error");
                 $('#NombreClienteTransferenciasReceptor').addClass("has-error"); 
                }
        else if($("#ListadoMovimientosTransferenciaEmisor").val() == "" || $("#ListadoMovimientosTransferenciaEmisor").val() == null || $("#ListadoMovimientosTransferenciaReceptor").val() == "" || $("#ListadoMovimientosTransferenciaReceptor").val() == null)
                {$('#ListadoMovimientosTransferenciaEmisor').addClass("has-error");
                 $('#ListadoMovimientosTransferenciaReceptor').addClass("has-error");
                 swal("Error","Verifique los movimientos","warning");  
                }
        else if($("#HabitacionesTransferenciasEmisor").val() == "" || $("#HabitacionesTransferenciasEmisor").val() == null || $("#HabitacionesTransferenciasReceptor").val() == "" || $("#HabitacionesTransferenciasReceptor").val() == null)
                {$('#HabitacionesTransferenciasEmisor').addClass("has-error");
                 $('#HabitacionesTransferenciasReceptor').addClass("has-error");
                }
        else if($("#ValorATransferir").val() == "" || $("#ValorATransferir").val() == null)
                {$('#ValorATransferir').addClass("has-error");
                 swal("Error","Ingrese valor a tranferir","warning");  
                }
                else 
                {    
                        /*Validar que el valor a transferir no se mayor a lo que se tiene */
                        var DineroDisponible = parseFloat($("#AbonoTotalEmisor").val());
                        var DineroATransferir = parseFloat($("#ValorATransferir").val());

                        var ValorRestante = DineroDisponible - DineroATransferir;
                        if(ValorRestante < 0)
                        {
                                swal("Error","El valor a transferir no puede ser mayor a el disponible","warning");
                        }
                        else
                        {       var IdMovimientoEmisor = $("#ListadoMovimientosTransferenciaEmisor").val();
                                var IdMovimientoReceptor = $("#ListadoMovimientosTransferenciaReceptor").val();
                                var ValorAtransferir = $("#ValorATransferir").val();
                                var Parametros = {
                                        "IdMovimientoEmisor": IdMovimientoEmisor,
                                        "IdMovimientoReceptor": IdMovimientoReceptor,
                                        "ValorTranferencia": ValorAtransferir,
                                        "NombreProceso" : "TransferenciaInsert"
                                };
                                $.ajax({
                                        type: "POST",
                                        url: "../modulos/facturacion/funciones.php",
                                        data: Parametros,
                                        success: function (response) {
                                                if(response.trim() == "CORRECTO")
                                                {
                                                        swal("OK!","TransferenciaExistosa","success");
                                                        LimpiarCajas();
                                                }
                                                else
                                                {
                                                        swal("Error!","Revise los datos","warning");
                                                }
                                        }
                                });
                        }
                }

}


function BuscarClienteFacturacion()
{
        var NitCliente=$('#RegistrarFacturaNit').val();
        if(NitCliente!="")
        {
                var Parametros = {
                        "NitCliente": NitCliente,
                        "NombreProceso" : "BuscarClienteFacturacion"
                };
                $.ajax({
                        type: "POST",
                        url: "../modulos/facturacion/funciones.php",
                        data: Parametros,
                        success: function (response) {
                                if(response.trim() == "[]")
                                {
                                        swal("Informacion!","El cliente no ha sido encontrado o no existe","warning");                        
                                }
                                else
                                {
                                        var Datos = JSON.parse(response);
                                        document.getElementById('RegistrarFacturaNombre').value=Datos[0].NombresCompleto;
                                        document.getElementById('RegistrarFacturaTelefono').value=Datos[0].Telefono1Cliente;
                                        document.getElementById('RegistraFacturaDireccion').value=Datos[0].DireccionCliente;
                                }
                        }
                });
        }else{
                swal("Informacion!","Debe completar el campo de nit","warning");
        }
}


/***** consumos externos *****/


var RegistarConsumosContadorExternos=1;
function AggConsumoExternosTabla()
{       
        var error=0;
        if($('#RegistrarConsumosExternosNombreProducto').val()=="")
        {error++;}
        if($('#RegistrarConsumosExternosCantidadProducto').val()=="")
        {error++;}
        if(error>0)
        {
                swal("Información","Faltan campos por llenar","warning");
        }else{
                var select = document.getElementById("RegistrarConsumosExternosNombreProducto"), //El <select>
                text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
                var NombreProducto=text;
                var CodigoProducto=$('#RegistrarConsumosExternosNombreProducto').val();    
                var CantidadProducto=$('#RegistrarConsumosExternosCantidadProducto').val();
                var Parametros = {  
                        "IdProducto": CodigoProducto,
                        "NombreProceso" : "TraerValorProductos",                                                                                                       
                                };
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {      
                                        var Datos=JSON.parse(response);
                                        var ValorProducto=Datos[0].ValorProductos;
                                        var Iva=Datos[0].ImpuestoProductoTipo;                                     
                                        var Impuesto=((ValorProducto * Iva) / 100) * CantidadProducto;
                                        row='<tr id="fila'+RegistarConsumosContadorExternos+'"><td>'+RegistarConsumosContadorExternos+'</td><td class="CodigoProductoExterno">'+CodigoProducto+'</td><td class="NombreProductoExterno">'+NombreProducto+'</td><td class="CantidadProductoExterno">'+CantidadProducto+'</td><td class="ImpuestoProductoExterno">'+Impuesto+'</td><td class="ValorProductoExterno">'+ValorProducto * CantidadProducto+'</td><td><i class="glyphicon glyphicon-remove" onclick="EliminarSeleccionado('+RegistarConsumosContadorExternos+');"></i></td></tr>';
                                        $('#TablaConsumosExternos').append(row);   
                                        RegistarConsumosContadorExternos++;                                                     
                                }
                        });
        }
}

function AggConsumoExternosTablaServicio()
{
        var error=0;
        if($('#RegistrarConsumosExternosNombreServicio').val()=="")
        {error++;}
        if($('#RegistrarConsumosExternosCantidadServicio').val()=="")
        {error++;}
        if(error>0)
        {
                swal("Información","Faltan campos por llenar","warning");
        }else{
        var select = document.getElementById("RegistrarConsumosExternosNombreServicio"), //El <select>
        text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
        var NombreServicio=text;
        var CodigoServicio=$('#RegistrarConsumosExternosNombreServicio').val(); 
        var CantidadServicio=$('#RegistrarConsumosExternosCantidadServicio').val(); 
        var Parametros = {  
                "IdServicio": CodigoServicio,
                "NombreProceso" : "TraerValorServicios",                                                                                                       
                        };
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {      
                                        var Datos=JSON.parse(response);
                                        var ValorServicio=Datos[0].ValorServicios;
                                        var Iva=Datos[0].ImpuestoServicios;
                                        var Impuesto= ((ValorServicio * Iva) / 100) * CantidadServicio;                                                                         
                                        row='<tr id="fila'+RegistarConsumosContadorExternos+'"><td>'+RegistarConsumosContadorExternos+'</td><td class="CodigoServicioExterno">'+CodigoServicio+'</td><td class="NombreServicioExterno">'+NombreServicio+'</td><td class="CantidadServicioExterno">'+CantidadServicio+'</td><td class="ImpuestoServicioExterno">'+Impuesto+'</td><td class="ValorServicioExterno">'+ValorServicio * CantidadServicio+'</td><td><i class="glyphicon glyphicon-remove" onclick="EliminarSeleccionado('+RegistarConsumosContadorExternos+');"></i></td></tr>';
                                        $('#TablaConsumosExternos').append(row);  
                                        RegistarConsumosContadorExternos++;                                                                              
                                }
                        });
                }
}
function CargarSelectProductoExternos()
{        

                var TProducto=$('#RegistrarConsumosExternosTipoProducto').val();
                var Parametros = {  
                        "IdTipoProducto":TProducto,
                        "NombreProceso" : "CargarSelectProductos",                                                                                                       
                                };
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {                                     
                                        $('#RegistrarConsumosExternosNombreProducto').html('<option value="">Seleccione el producto</option>');
                                        $('#RegistrarConsumosExternosNombreProducto').append(response);             
                                        $('#RegistrarConsumosExternosNombreProducto').prop("disabled",false); 
                                        $('#RegistrarConsumosExternosCantidadProducto').prop("disabled",false);  
                                }
                        });
        
        
}
function CargarSelectServiciosExternos()
{        
        
                var TServicio=$('#RegistrarConsumosExternosTipoServicio').val();
                var Parametros = {  
                        "IdTipoServicio": TServicio,
                        "NombreProceso" : "CargarSelectServicios",                                                                                                       
                                };
                $.ajax({        
                        data : Parametros,
                        url : "../modulos/facturacion/funciones.php",
                        type : "post",
                        success : function(response)
                                {             
                                        
                                $('#RegistrarConsumosExternosNombreServicio').html('<option value="">Seleccione el servicio</option>');                         
                                $('#RegistrarConsumosExternosNombreServicio').append(response);     
                                $('#RegistrarConsumosExternosNombreServicio').prop("disabled",false);                
                                $('#RegistrarConsumosExternosCantidadServicio').prop("disabled",false); 
                                }
                        });
        
}
function EliminarSeleccionado(IndiceFila)
{
        $("#fila" + IndiceFila).remove();
}
var IdFacturaExterna=0;
function FacturarConsumosExternos()
{
                var Nombre=$('#NombreclienteConsumoExterno').val();
                var Nit=$('#NitclienteConsumoExterno').val();
                var Telefono=$('#TelefonoClienteConsumoExterno').val();
                var Direccion=$('#DireccionClienteConsumoExterno').val();


        var error=0;
        var ArrayCodigoProducto= new Array(); 
        $('.CodigoProductoExterno').each(function(){
               ArrayCodigoProducto.push($(this).text());               
            });
            
        var ArrayNombreProducto= new Array(); 
            $('.NombreProductoExterno').each(function(){
                    ArrayNombreProducto.push($(this).text());               
                });
            var ArrayCantidadProducto= new Array(); 
        $('.CantidadProductoExterno').each(function(){
                ArrayCantidadProducto.push($(this).text());               
            });
        var ArrayValorProducto= new Array();    
        $('.ValorProductoExterno').each(function(){
                ArrayValorProducto.push($(this).text());               
            });  
        var ArrayImpuestoProducto= new Array(); 
        $('.ImpuestoProductoExterno').each(function(){
                ArrayImpuestoProducto.push($(this).text());               
            });          
            /** servicios */
        var ServiciosRegistrados=0;
        //var Id = $('input.HuespedesId').val();
        var ArrayCodigoServicio= new Array(); 
        $('.CodigoServicioExterno').each(function(){
               ArrayCodigoServicio.push($(this).text());               
            });
            
            var ArrayNombreServicio= new Array(); 
        $('.NombreServicioExterno').each(function(){
                ArrayNombreServicio.push($(this).text());               
            });
            var ArrayCantidadServicio= new Array(); 
        $('.CantidadServicioExterno').each(function(){
                ArrayCantidadServicio.push($(this).text());               
            });
        var ArrayValorServicio= new Array();    
        $('.ValorServicioExterno').each(function(){
                ArrayValorServicio.push($(this).text());               
            });

        var ArrayImpuestoServicio= new Array(); 
        $('.ImpuestoServicioExterno').each(function(){
                ArrayImpuestoServicio.push($(this).text());               
            }); 
            var ValorSum=0;ValorIva=0;
            var CantidadProductosExternos=ArrayCodigoProducto.length;
            var CantidadServiciosExternos=ArrayCodigoServicio.length;
            for(var i=0;i<CantidadProductosExternos;i++)
            {
                FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">01</td>';
                FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayCodigoProducto[i]+'</td>';
                FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayNombreProducto[i]+'</td>';
                FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">'+ArrayCantidadProducto[i]+'</td>';
                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayImpuestoProducto[i],'##,###,##0',1);+'</td>';
                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayValorProducto[i],'##,###,##0',1);+'</td><tr>';

                ValorSum+=parseInt(ArrayValorProducto[0]);
                ValorIva+=parseInt(ArrayImpuestoProducto[0]);
            }
            for(var i=0;i<CantidadServiciosExternos;i++)
            {
                FacturacionRowsEnviar+='<tr><td style="width: 5%; text-align: center;border:solid 1px;">01</td>';
                FacturacionRowsEnviar+='<td style="width: 5%; text-align: center;border:solid 1px;">'+ArrayCodigoServicio[i]+'</td>';
                FacturacionRowsEnviar+='<td style="width: 40%; text-align: left;border:solid 1px;">'+ArrayNombreServicio[i]+'</td>';
                FacturacionRowsEnviar+='<td style="width: 10%; text-align: center;border:solid 1px;">'+ArrayCantidadServicio[i]+'</td>';
                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayImpuestoServicio[i],'##,###,##0',1);+'</td>';
                FacturacionRowsEnviar+='<td style="width: 20%; text-align: right;border:solid 1px;">$'+MASK(this,ArrayValorServicio[i],'##,###,##0',1);+'</td><tr>';

                ValorSum+=parseInt(ArrayValorServicio[0]);
                ValorIva+=parseInt(ArrayImpuestoServicio[0]);
            }

            var ValorSub=parseInt(ValorSum)-parseInt(ValorIva);
           
            
            CrearFacturaConsumosExternos(ValorSum,ValorIva,ValorSub,Nit);
            if(ArrayCodigoProducto.length<1)
            {                    
                    error=1;
            }else{
                var parametros = {
                                "CodigoProducto":ArrayCodigoProducto,
                                "CantidadProducto":ArrayCantidadProducto,
                                "ValorProducto":ArrayValorProducto,                        
                                "IdFacturaExterna":IdFacturaExterna,   
                                "NombreProceso":"RegistrarConsumosProductosExternos",
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/facturacion/funciones.php',
                        type:  'post',
                        beforeSend: function () 
                        {
                        },
                        success:  function (response) {                                 
                                if(response.trim()=="NOHAY")
                                {
                                       swal("Advertencia","No hay productos suficientes en el inventario verifique las existencias", "warning"); 
                                }else{
                                        swal("Bien", "Se han registrado los consumos", "success"); 
                                }
                                
                                                                  
                        }
                });
            }
            if(ArrayCodigoServicio.length<1)
            {                    
                    error++;
            }else{
                
                var RegistrarConsumosFolio=$('#RegistrarConsumosFolioMostrar').text();         
       
                var parametros = {
                                "CodigoServicio":ArrayCodigoServicio,
                                "CantidadServicio":ArrayCantidadServicio,
                                "ValorServicio":ArrayValorServicio,                
                                "IdFacturaExterna":IdFacturaExterna,     
                                "NombreProceso":"RegistrarConsumosServiciosExternos",
                                };
                $.ajax({
                        data:  parametros,
                        url:   '../modulos/facturacion/funciones.php',
                        type:  'post',
                        beforeSend: function () 
                        {
                        },
                        success:  function (response) {                                                      
                                swal("Bien", "Se han registrado los consumos", "success");                           
                        }                       
                });
            }
                
            imprFactura(Nombre,Nit,Telefono,Direccion,FacturacionRowsEnviar,ValorSum,ValorIva,ValorSub); 
            FacturacionRowsEnviar="";
            $('#TablaConsumos').html("");
            
}
function CrearFacturaConsumosExternos(ValorSum,ValorIva,ValorSub,Nit)
{
        var Parametros={
                "NombreProceso":"CreacionFacturaExterna",
                "ValorTotal":ValorSum,
                "Iva":ValorIva,
                "SubTotal":ValorSub,
                "IdFolios":Nit
        };
        $.ajax({
                data:  Parametros,
                url:   '../modulos/facturacion/funciones.php',
                type:  'post',
                success:  function (response) {                       
                        IdFacturaExterna=response;                      
                }}); 
}