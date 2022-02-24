$("#formNuevoEmpleado").validate({
	rules: {
		nombre: {
			required: true,
			minlength: 3,
			maxlength: 50
		},
		email: {
			required: true,
			email: true
		},
		sexo: {
			required: true
		},
		area: {
			required: true
		},
		descripcion: {
			required: true,
			minlength: 3
		},
		roles: {
			required: true
		}
	}
});
$("#formEditarEmpleado").validate({
	rules: {
		nombreU: {
			required: true,
			minlength: 3,
			maxlength: 50
		},
		emailU: {
			required: true,
			email: true
		},
		sexoU: {
			required: true
		},
		areaU: {
			required: true
		},
		descripcionU: {
			required: true,
			minlength: 3
		},
		rolesU: {
			required: true
		}
	}
});
$("#btnNuevoEmpleado").click(function(){
	if ($("#formNuevoEmpleado").valid() == false) {
		return;
	} else {
		let nombre = $('#nombre').val();
		let email = $('#email').val();
		let sexo = $('#sexo').val();
		let area = $('#area').val();
		let descripcion = $('#descripcion').val();
		let boletin = $('#boletin').val();
		let roles = $('#roles').val();
		data=$('#formNuevoEmpleado').serialize();
		$.ajax({
			type:"POST",
			data:data,
			url:"functions/helpers/nuevoEmpleado.php",
			success:function(r){
				if (r == 1) {
					$('#tabla').load('views/empleados/empleadosTabla.php');
					$('#formNuevoEmpleado')[0].reset();
					$('#nuevoEmpleado').modal('hide');
					$('#success').modal('show');
					setTimeout(function() {
						$('#success').modal('hide');
					},2000);
				} else {
					if (r == 2) {
						$('.alertaNombre').show();
						setTimeout(function() {
   							$(".alertaNombre").fadeOut(300);
						},3000);
					} else {
						if (r == 3) {
							$('.alertaExiste').show();
							setTimeout(function() {
	   							$(".alertaExiste").fadeOut(300);
							},3000);
						} else {
							$('.alerta').show();
							setTimeout(function() {
	   							$(".alerta").fadeOut(300);
							},3000);
						}
					}
				}
			}
		});
	}
});
$("#btnEditarEmpleado").click(function(){
	if ($("#formEditarEmpleado").valid() == false) {
		return;
	} else {
		let nombre = $('#nombreU').val();
		let email = $('#emailU').val();
		let sexo = $('#sexoU').val();
		let area = $('#areaU').val();
		let descripcion = $('#descripcionU').val();
		let boletin = $('#boletinU').val();
		let roles = $('#rolesU').val();
		data=$('#formEditarEmpleado').serialize();
		$.ajax({
			type:"POST",
			data:data,
			url:"/functions/helpers/actualizarEmpleado.php",
			success:function(r){
				if (r == 1) {
					$('#tabla').load('views/empleados/empleadosTabla.php');	
					$('#formEditarEmpleado')[0].reset();
					$('#editarEmpleado').modal('hide');
					$('#successUpdate').modal('show');
					setTimeout(function() {
						$('#successUpdate').modal('hide');
					},2000);
				} else {
					if (r == 2) {
						$('.alertaNombre').show();
						setTimeout(function() {
								$(".alertaNombre").fadeOut(300);
						},3000);
					} else {
						$('.alerta').show();
						setTimeout(function() {
								$(".alerta").fadeOut(300);
						},3000);
					}
				}
			}
		});
	}
});
