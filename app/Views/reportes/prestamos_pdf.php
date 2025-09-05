<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro de Préstamos</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h2 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; font-size: 12px; }
        thead { background-color: #f2f2f2; }
        footer { position: fixed; bottom: 0; text-align: center; font-size: 10px; }
    </style>
</head>
<body>
    <h2>Registro de Préstamos</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID Libro</th>
                <th>Ejemplar</th>
                <th>Título Libro</th>
                <th>Nombre Estudiante</th>
                <th>Carnet</th>
                <th>Fecha Préstamo</th>
                <th>Fecha Devolución</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($registros_prestamos as $libro): ?>
            <tr>
                <td><?= $libro['id'] ?></td>
                <td><?= $libro['libro_id'] ?></td>
                <td><?= $libro['ejemplar'] ?></td>
                <td><?= $libro['titulo'] ?></td>
                <td><?= $libro['nombre'] ?></td>
                <td><?= $libro['carnet'] ?></td>
                <td><?= date("d/m/Y", strtotime($libro['fecha_prestamo'])) ?></td>
                <td><?= date("d/m/Y", strtotime($libro['fecha_devolucion'])) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <footer>
        Generado el <?= date("d/m/Y") ?> | Sistema de Biblioteca Escolar
    </footer>
</body>
</html>
