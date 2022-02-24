<div class="container">
	<div id="tabla"></div>
</div>
<div class="modal fade" id="nuevoEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-danger alerta" role="alert">
		  Error, no se guardo el nuevo empleado.
		</div>
		<div class="alert alert-danger alertaExiste" role="alert">
		  Error, el empleado ya existe en el sistema.
		</div>
      	<div class="alert alert-primary" role="alert">
		  Los campos con asteriscos (*) son obligatorios
		</div>
        <form action="" id="formNuevoEmpleado">
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="nombre" class="col-form-label"><strong>Nombre completo *</strong></label>
        		</div>
        		<div class="col-8">
					<input type="text" name="nombre" id="nombre" class="form-control">
					<div class="alert alert-danger alertaNombre" role="alert">
					  Error, el nombre solo debe contener letras.
					</div>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="email" class="col-form-label"><strong>Correo electrónico *</strong></label>
        		</div>
        		<div class="col-8">
					<input type="email" name="email" id="email" class="form-control">
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
				<div class="col-4">
					<label for="sexo" class="col-form-label"><strong>Sexo *</strong></label>
				</div>
				<div class="col-8">
		        	<div class="form-check">
						<input class="form-check-input" type="radio" name="sexo" id="sexo" value="1">
						<label class="form-check-label" for="sexo1">
						Masculino
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sexo" id="sexo" value="0">
						<label class="form-check-label" for="sexo2">
						Femenino
						</label>
					</div>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="area" class="col-form-label"><strong>Área *</strong></label>
        		</div>
        		<div class="col-8">
					<select class="form-select" name= "area" aria-label="Default select" id="area" name="area">
						<?php foreach (listaAreas() as $keyArea => $valueArea)  {?>
					  	<option selected value="<?php echo $valueArea->id; ?>"><?php echo $valueArea->nombre; ?></option>

						<?php } ?>
					</select>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="descripcion" class="col-form-label"><strong>Descripción *</strong></label>
        		</div>
        		<div class="col-8">
					<textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        		</div>
        		<div class="col-8">
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" name="boletin" id="boletin">
					  <label class="form-check-label" for="boletin">
					    Deseo recibir boletín informativo
					  </label>
					</div>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="checkRoles" class="col-form-label"><strong>Roles *</strong></label>
        		</div>
        		<div class="col-8">
					<div class="form-check">
						<?php foreach (listaRoles() as $key => $value) {?>
						<input class="form-check-input" type="checkbox" name="roles[]" value="<?php echo $value->id; ?>" id="<?php echo $value->id; ?>">
						<label class="form-check-label" for="checkBoletin">
						<?php echo $value->nombre; ?>
						</label><br>
						<?php } ?>
					</div>
				</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnNuevoEmpleado">Guardar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="editarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-danger alerta" role="alert">
		  Error, no se guardo el nuevo empleado.
		</div>
      	<div class="alert alert-primary" role="alert">
		  Los campos con asteriscos (*) son obligatorios
		</div>
        <form action="" id="formEditarEmpleado">
        	<input type="hidden" name="idU" id="idU">
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="nombreU" class="col-form-label"><strong>Nombre completo *</strong></label>
        		</div>
        		<div class="col-8">
					<input type="text" name="nombreU" id="nombreU" class="form-control">
					<div class="alert alert-danger alertaNombre" role="alert">
					  Error, el nombre solo debe contener letras.
					</div>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="emailU" class="col-form-label"><strong>Correo electrónico *</strong></label>
        		</div>
        		<div class="col-8">
					<input type="email" name="emailU" id="emailU" class="form-control">
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
				<div class="col-4">
					<label for="sexoU" class="col-form-label"><strong>Sexo *</strong></label>
				</div>
				<div class="col-8">
		        	<div class="form-check">
						<input class="form-check-input" type="radio" name="sexoU" id="sexoU" value="1">
						<label class="form-check-label" for="sexo1">
						Masculino
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="sexoU" id="sexoU" value="0">
						<label class="form-check-label" for="sexo2">
						Femenino
						</label>
					</div>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="areaU" class="col-form-label"><strong>Área *</strong></label>
        		</div>
        		<div class="col-8">
					<select class="form-select" name= "areaU" aria-label="Default select" id="areaU">
						<?php foreach (listaAreas() as $keyArea => $valueArea)  {?>
					  	<option selected value="<?php echo $valueArea->id; ?>"><?php echo $valueArea->nombre; ?></option>

						<?php } ?>
					</select>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="descripcionU" class="col-form-label"><strong>Descripción *</strong></label>
        		</div>
        		<div class="col-8">
					<textarea class="form-control" name="descripcionU" id="descripcionU" rows="3"></textarea>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        		</div>
        		<div class="col-8">
					<div class="form-check">
					  <input class="form-check-input" type="checkbox" name="boletinU" value="0" id="boletinU">
					  <label class="form-check-label" for="boletinU">
					    Deseo recibir boletín informativo
					  </label>
					</div>
				</div>
        	</div>
        	<div class="row mb-3 g-3 align-items-center">
        		<div class="col-4">
        			<label for="checkRoles" class="col-form-label"><strong>Roles *</strong></label>
        		</div>
        		<div class="col-8">
					<div class="form-check">
						<?php foreach (listaRoles() as $key => $value) {?>
						<input class="form-check-input" type="checkbox" name="rolesU" value="<?php echo $value->id; ?>" id="<?php echo $value->id; ?>">
						<label class="form-check-label" for="checkBoletin">
						<?php echo $value->nombre; ?>
						</label><br>
						<?php } ?>
					</div>
				</div>
        	</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnEditarEmpleado">Guardar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        Empleado creado con exito
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="successUpdate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        Empleado actualizado con exito
      </div>
    </div>
  </div>
</div>
<script src="<?php echo PATH; ?>public/js/empleados.js"></script>
<script src="<?php echo PATH; ?>public/js/formularios.js"></script>


