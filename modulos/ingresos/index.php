<?php 

include("../../conexion.php");

$stm=$conexion->prepare("SELECT * FROM ingresos");
$stm->execute();
$ingresos=$stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){

$txtid=(isset($_GET['id'])?$_GET['id']:"");
$stm=$conexion->prepare("DELETE FROM ingresos WHERE id=:txtid");
$stm->bindParam(":txtid",$txtid);
$stm->execute();
header("location:index.php");
}


?>

<?php include("../../template/header.php"); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Agregar ingreso
</button>

<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Nombre completo</th>
                <th scope="col">Temperatura</th>
                <th scope="col">Tos</th>
                <th scope="col">Insufic. respitarotia</th>
                <th scope="col">Dolor de garganta</th>
                <th scope="col">Pérdida olfato</th>
                <th scope="col">Pérdida gusto</th>
                <th scope="col">Otros síntomas</th>
                <th scope="col">Contacto (aislados)</th>
                <th scope="col">Contacto (viajeros)</th>
                <th scope="col">Viajes (lugares)</th>
                <th scope="col">Observaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ingresos as $ingreso) { ?>
            <tr class="">
                <td scope="row"><?php echo $ingreso['id'];?></td>
                <td><?php echo $ingreso['fecha'];?></td>
                <td><?php echo $ingreso['hora'];?></td>
                <td><?php echo $ingreso['nombre_completo'];?></td>
                <td><?php echo $ingreso['temperatura'];?></td>
                <td><?php echo $ingreso['tos'];?></td>
                <td><?php echo $ingreso['insuf_respiratoria'];?></td>
                <td><?php echo $ingreso['dolor_garganta'];?></td>
                <td><?php echo $ingreso['perdida_olfato'];?></td>
                <td><?php echo $ingreso['perdida_gusto'];?></td>
                <td><?php echo $ingreso['otros_sintomas'];?></td>
                <td><?php echo $ingreso['contacto_aislados'];?></td>
                <td><?php echo $ingreso['contacto_viajeros'];?></td>
                <td><?php echo $ingreso['viajes_lugares'];?></td>
                <td><?php echo $ingreso['observaciones'];?></td>
                <td>

                <a href="edit.php?id=<?php echo $ingreso['id'];?>" class="btn btn-success">Editar</a>
                <a href="index.php?id=<?php echo $ingreso['id'];?>" class="btn btn-danger">Eliminar</a>


                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<?php include("create.php"); ?>

<?php include("../../template/footer.php"); ?>