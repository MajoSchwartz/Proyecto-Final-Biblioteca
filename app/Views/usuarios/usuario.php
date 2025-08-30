<?=$cabecera?>
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
