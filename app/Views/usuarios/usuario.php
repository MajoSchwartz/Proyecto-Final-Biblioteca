<?=$cabecera?>
<?php $rol = session()->get('rol'); ?> <!--Para poder usar el rol en toda la vista -->
<div class="d-flex justify-content-center">
    <h2>LISTADO DE USUARIOS</h2>
</div>
<main>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success text-center" style="width: 90%; margin: auto;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger text-center" style="width: 90%; margin: auto;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

<div class="d-flex justify-content-between mb-3" style="width: 90%; margin: auto;">
    <?php if ($rol === 'admin'): ?>
        <a class="btn btn-success" href="<?=base_url('usuarios/crear')?>">Crear un usuario</a>
    <?php elseif (session()->get('rol') === 'bibliotecario'): ?>
        <a class="btn btn-primary" href="<?= base_url('reporte/usuarios') ?>">Generar reporte</a>
    <?php endif; ?>
    <a class="btn btn-danger" href="<?=base_url('panel')?>">Regresar</a>

</div>

    <table class="table table-light table-hover" style="width: 90%; min-width: 800px; margin-left: auto; margin-right: auto;">
        <thead class="encabezado-tabla">
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
                <td><i class="fas fa-lock"></i> Protegida</td> <!--La contraseña se mantiene oculta -->
                <td>
                    <a href="<?=base_url('usuarios/editar/'.$usuario['id']);?>" class="btn btn-info" type="button"><i class="fas fa-pencil-alt"></i></a>
                    <a href="<?=base_url('usuarios/borrar/'.$usuario['id']);?>" class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>

        <?php endforeach; ?>
            </tbody>
        </table>

</main>

<?=$pie?>

