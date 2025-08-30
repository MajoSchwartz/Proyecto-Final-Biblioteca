<?=$cabecera?>
<<<<<<< HEAD
    <div class="d-flex justify-content-center">
        <h2>LISTADO DE USUARIOS </h2>
    </div>
    <div class="d-flex justify-content-around">
        <a href="<?=base_url('crear')?>" class="btn btn-info">Crear un Usuario </a>
        <a href="<?=base_url('panel')?>" class="btn btn-danger">Regresar </a>
    </div>
    <br>
    <table class="table table-striped">
        <thead class="text-center table-dark">
            <tr>
                <th class="col-sm-1">id</th>
                <th class="col-sm-1">usuario</th>
                <th class="col-sm-1">Nombre</th>
                <th class="col-sm-1">Carnet</th>
                <th class="col-sm-1">rol</th>
                <th class="col-sm-1">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $key => $value): ?>
                <tr>
                    <?php 
                        if ($value["rol"] == 1){
                            $estatus = "Administrador";
                        } else {
                            if ($value["rol"] == 2){
                                $estatus = "Bibliotecario";
                            } else {
                                $estatus = "Estudiante";
                            }
                        }
                    ?>
                    <td class="col-sm-1 text-center"><?php echo $value["id"]; ?></td>
                    <td class="pr-3"><?php echo $value["usuario"]; ?></td>
                    <td class="pr-3"><?php echo substr($value["nombre"],0,30); ?></td>
                    <td class="pr-3"><?php echo $value["carnet"]; ?></td>
                    <td class="pr-3"><?php echo substr($estatus,0,30); ?></td>
                    <td>
                        <div class="btn-group-sm">
                            <a href="<?=base_url('modificar/'.$value['id']);?>" class="btn btn-info" title="Modificar"><i class="fas fa-pencil-alt"></i></a>
                            <a href="<?=base_url('eliminar/'.$value['id']);?>" class="btn btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table> 
<?=$pie?>
=======
<a href="<?=base_url('usuarios/crear')?>">Crear un usuario</a>

    <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
        <thead class="thead-light">
            <tr>
                <th>id</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Carnet</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php foreach($usuarios as $usuario): ?> <!-- Para poner cada elemento de la tabla usuarios individualmente -->
            <tr>
                <td><?=$usuario['id'];?></td> <!--Se imprimen los valores-->
                <td><?=$usuario['usuario'];?></td>
                <td><?=$usuario['nombre'];?></td>
                <td><?=$usuario['carnet'];?></td>
                <td><?=$usuario['correo'];?></td>
                <td><?=$usuario['rol'];?></td>
                <td><i class="fas fa-lock"></i> Protegida</td> <!-- La contraseña se mantiene oculta -->
                <td>Editar/
                    <a href="<?base_url('usuarios/borrar/'.$usuario['id']);?>" class="btn btn-danger" type="button">Borrar</a>
                </td>
            </tr>

        <?php endforeach; ?>
            </tbody>
        </table>
<?=$pie?>
>>>>>>> recuperar-usuarios
