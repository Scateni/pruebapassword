$(document).ready(function(){
	$('#tabla').load('views/empleados/empleadosTabla.php');
});
function getEmpleado(id){
	$.ajax({
		type:"POST",
        data:"id=" + id,
        url:"functions/helpers/getEmpleado.php",
        success:function(r){
        	datos=jQuery.parseJSON(r);
        	$('#idU').val(datos['id']);
        	$('#nombreU').val(datos['nombre']);
        	$('#emailU').val(datos['email']);
        	$('#sexoU').val(datos['sexo']);
        	$('#areaU').val(datos['area_id']);
        	$('#boletinU').val(datos['boletin']);
        	$('#descripcionU').val(datos['descripcion']);
        }
	});
}
function deleteEmpleado(id){
	alertify.confirm('Eliminar el empleado', '¿Seguro de eliminar este empleado?', function(){
        $.ajax({
            type: "POST",
            data: "id=" + id,
            url: "functions/helpers/deleteUsuario.php",
            success:function(r){
                if (r==1) {
                   $('#tabla').load('views/empleados/empleadosTabla.php');	
                    alertify.success("Empleado eliminado con exito");
                } else {
                    alertify.error("No se pudo eliminar");
                }
            }
        });
    }
    , function(){
    }).set('labels', {ok:'Si', cancel:'Cerrar'});
}