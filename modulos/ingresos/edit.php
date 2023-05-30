<?php 

include("../../conexion.php");

if(isset($_GET['id'])){

    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("SELECT * FROM ingresos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();

    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $fecha=$registro['fecha'];
    $hora=$registro['hora'];
    $nombre_completo=$registro['nombre_completo'];
    $temperatura=$registro['temperatura'];
    $tos=$registro['tos'];
    $insuf_respiratoria=$registro['insuf_respiratoria'];
    $dolor_garganta=$registro['dolor_garganta'];
    $perdida_olfato=$registro['perdida_olfato'];
    $perdida_gusto=$registro['perdida_gusto'];
    $otros_sintomas=$registro['otros_sintomas'];
    $contacto_aislados=$registro['contacto_aislados'];
    $contacto_viajeros=$registro['contacto_viajeros'];
    $viajes_lugares=$registro['viajes_lugares'];
    $observaciones=$registro['observaciones'];
    }

    if($_POST){
        // Recepción
        $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
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
        $stm=$conexion->prepare("UPDATE ingresos SET fecha=:fecha,hora=:hora,nombre_completo=:nombre_completo,temperatura=:temperatura,tos=:tos,insuf_respiratoria=:insuf_respiratoria,dolor_garganta=:dolor_garganta,perdida_olfato=:perdida_olfato,perdida_gusto=:perdida_gusto,otros_sintomas=:otros_sintomas,contacto_aislados=:contacto_aislados,contacto_viajeros=:contacto_viajeros,viajes_lugares=:viajes_lugares,observaciones=:observaciones WHERE id=:txtid");
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
        $stm->bindParam(":txtid",$txtid);
        $stm->execute();
        // Redireccionar
        header("location:index.php");
    
    }
?>

<?php include("../../template/header.php"); ?>

<form action="" method="post">
        <input type="hidden" class="form-control" name="txtid" value="<?php echo $txtid;?>">
        <label for="">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="<?php echo $fecha;?>">
        <label for="">Hora</label>
        <input type="time" class="form-control" name="hora" value="<?php echo $hora;?>">
        <label for="">Nombre completo</label>
        <input type="text" class="form-control" name="nombre_completo" value="<?php echo $nombre_completo;?>" placeholder="Ingrese el nombre">
        <label for="">Temperatura</label>
        <input type="number" class="form-control" name="temperatura" value="<?php echo $temperatura;?>" placeholder="Ingrese la temperatura">
        <label for="">Tos</label>
        <input type="text" class="form-control" name="tos" value="<?php echo $tos;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Insuficiencia Respiratoria</label>
        <input type="text" class="form-control" name="insuf_respiratoria" value="<?php echo $insuf_respiratoria;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Dolor de Garganta</label>
        <input type="text" class="form-control" name="dolor_garganta" value="<?php echo $dolor_garganta;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Pérdida de Olfato</label>
        <input type="text" class="form-control" name="perdida_olfato" value="<?php echo $perdida_olfato;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Pérdida de Gusto</label>
        <input type="text" class="form-control" name="perdida_gusto" value="<?php echo $perdida_gusto;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Otros síntomas</label>
        <input type="text" class="form-control" name="otros_sintomas" value="<?php echo $otros_sintomas;?>">
        <label for="">Contacto con aislados</label>
        <input type="text" class="form-control" name="contacto_aislados" value="<?php echo $contacto_aislados;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Contacto con viajeros</label>
        <input type="text" class="form-control" name="contacto_viajeros" value="<?php echo $contacto_viajeros;?>" placeholder="Ingrese 'si' o 'no'">
        <label for="">Viajes (lugares)</label>
        <input type="text" class="form-control" name="viajes_lugares" value="<?php echo $viajes_lugares;?>">
        <label for="">Observaciones</label>
        <input type="text" class="form-control" name="observaciones" value="<?php echo $observaciones;?>">
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
</form>

<?php include("../../template/footer.php"); ?>