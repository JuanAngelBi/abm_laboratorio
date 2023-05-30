<?php 
if($_POST){
    // Recepción
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:""); //1
    $hora=(isset($_POST['hora'])?$_POST['hora']:"");    //2
    $nombre_completo=(isset($_POST['nombre_completo'])?$_POST['nombre_completo']:"");   //3
    $temperatura=(isset($_POST['temperatura'])?$_POST['temperatura']:"");   //4
    $tos=(isset($_POST['tos'])?$_POST['tos']:"");   //5
    $insuf_respiratoria=(isset($_POST['insuf_respiratoria'])?$_POST['insuf_respiratoria']:"");  //6
    $dolor_garganta=(isset($_POST['dolor_garganta'])?$_POST['dolor_garganta']:"");  //7
    $perdida_olfato=(isset($_POST['perdida_olfato'])?$_POST['perdida_olfato']:"");  //8
    $perdida_gusto=(isset($_POST['perdida_gusto'])?$_POST['perdida_gusto']:""); //9
    $otros_sintomas=(isset($_POST['otros_sintomas'])?$_POST['otros_sintomas']:"");  //10
    $contacto_aislados=(isset($_POST['contacto_aislados'])?$_POST['contacto_aislados']:""); //11
    $contacto_viajeros=(isset($_POST['contacto_viajeros'])?$_POST['contacto_viajeros']:""); //12
    $viajes_lugares=(isset($_POST['viajes_lugares'])?$_POST['viajes_lugares']:"");  //13
    $observaciones=(isset($_POST['observaciones'])?$_POST['observaciones']:""); //14
    // Consulta SQL para insertar registro
    $stm=$conexion->prepare("INSERT INTO ingresos(id,fecha,hora,nombre_completo,temperatura,tos,insuf_respiratoria,dolor_garganta,perdida_olfato,perdida_gusto,otros_sintomas,contacto_aislados,contacto_viajeros,viajes_lugares,observaciones)
    VALUES(null,:fecha,:hora,:nombre_completo,:temperatura,:tos,:insuf_respiratoria,:dolor_garganta,:perdida_olfato,:perdida_gusto,:otros_sintomas,:contacto_aislados,:contacto_viajeros,:viajes_lugares,:observaciones)");
    // Asignación
    $stm->bindParam(":fecha",$fecha);   //1
    $stm->bindParam(":hora",$hora); //2
    $stm->bindParam(":nombre_completo",$nombre_completo);   //3
    $stm->bindParam(":temperatura",$temperatura);   //4
    $stm->bindParam(":tos",$tos);   //5
    $stm->bindParam(":insuf_respiratoria",$insuf_respiratoria); //6
    $stm->bindParam(":dolor_garganta",$dolor_garganta); //7
    $stm->bindParam(":perdida_olfato",$perdida_olfato); //8
    $stm->bindParam(":perdida_gusto",$perdida_gusto);   //9
    $stm->bindParam(":otros_sintomas",$otros_sintomas); //10
    $stm->bindParam(":contacto_aislados",$contacto_aislados);   //11
    $stm->bindParam(":contacto_viajeros",$contacto_viajeros);   //12
    $stm->bindParam(":viajes_lugares",$viajes_lugares); //13
    $stm->bindParam(":observaciones",$observaciones);   //14
    $stm->execute();
    // Redireccionar
    header("location:index.php");

}
?>

<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      <div class="modal-body">
        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="">
        <label for="">Hora</label>
        <input type="time" class="form-control" name="hora" value="">
        <label for="">Nombre completo</label>
        <input type="text" class="form-control" name="nombre_completo" value="" placeholder="Ingrese el nombre">
        <label for="">Temperatura</label>
        <input type="number" class="form-control" name="temperatura" value="" placeholder="Ingrese la temperatura">
        <label for="">Tos</label>
        <input type="text" class="form-control" name="tos" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Insuficiencia Respiratoria</label>
        <input type="text" class="form-control" name="insuf_respiratoria" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Dolor de Garganta</label>
        <input type="text" class="form-control" name="dolor_garganta" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Pérdida de Olfato</label>
        <input type="text" class="form-control" name="perdida_olfato" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Pérdida de Gusto</label>
        <input type="text" class="form-control" name="perdida_gusto" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Otros síntomas</label>
        <input type="text" class="form-control" name="otros_sintomas" value="">
        <label for="">Contacto con aislados</label>
        <input type="text" class="form-control" name="contacto_aislados" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Contacto con viajeros</label>
        <input type="text" class="form-control" name="contacto_viajeros" value="" placeholder="Ingrese 'si' o 'no'">
        <label for="">Viajes (lugares)</label>
        <input type="text" class="form-control" name="viajes_lugares" value="">
        <label for="">Observaciones</label>
        <input type="text" class="form-control" name="observaciones" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>