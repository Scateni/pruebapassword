<?php 
require_once '../../config/db.php';
require_once '../../functions/functions.php';
$listEmpleados =  listaEmpleados();
?>
<div class="row">
  <div class="col-sm-12">
    <h1>Lista de empleados</h1>
    <div class="table-responsive">
      <div class="buttonsTable">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#nuevoEmpleado"><span class="fas fa-user-plus"></span> Crear</button>
      </div>
      <table class="table table-borderless table-striped">
        <thead>
          <tr>
            <th scope="col"><span class="fas fa-user"></span> Nombre</th>
            <th scope="col"><span class="fas fa-at"></span> Email</th>
            <th scope="col"><span class="fas fa-venus-mars"></span> Sexo</th>
            <th scope="col"><span class="fas fa-briefcase"></span> Área</th>
            <th scope="col"><span class="fas fa-envelope"></span> Boletín</th>
            <th scope="col"><center> Modificar</center></th>
            <th scope="col"><center> Eliminar</center></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($listEmpleados as $key => $value) { 
              $sexo = "Masculino";
              if ($value->sexo == "0") {
                 $sexo = "Femenino";
              } 
              foreach (listaAreas() as $keyArea => $valueArea) {
                if ($valueArea->id == $value->area) {
                  $area = $valueArea->nombre;
                }
              }
              $boletin = "Si";
              if ($value->boletin == "0") {
                $boletin = "No";
              }
            ?>          
          <tr>
            <td><?php echo $value->nombre; ?></td>
            <td><?php echo $value->email; ?></td>
            <td><?php echo $sexo; ?></td>
            <td><?php echo $area; ?></td>
            <td><?php echo $boletin; ?></td>
            <td><center><button type="button" class="btn fas fa-edit" data-bs-toggle="modal" data-bs-target="#editarEmpleado" onclick="getEmpleado(<?php echo $value->id; ?>)"></button></center></td>
            <td><center><button type="button" class="btn fas fa-trash-alt" onclick="deleteEmpleado(<?php echo $value->id; ?>)"></button></center></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>