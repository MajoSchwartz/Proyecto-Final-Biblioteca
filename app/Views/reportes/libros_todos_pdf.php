<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registro de Libros</title>
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
    <h2>Reporte de Inventario General de Libros</h2>
    <table class="table table-bordered table-hover" style="width: 90%; margin: auto;">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Páginas</th>
                <th>Ejemplar</th>
                <th>Cantidad</th>
                <th>Nivel</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($libros as $index => $libro): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= $libro['titulo'] ?></td>
                <td><?= $libro['autor'] ?></td>
                <td><?= $libro['género'] ?></td>
                <td><?= $libro['páginas'] ?></td>
                <td><?= $libro['Ejemplar'] ?></td>
                <td><?= $libro['cantidad'] ?></td>
                <td><?= $libro['nivel'] ?></td>
                <td><?= ucfirst($libro['estado']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <footer>
        Generado el <?= date("d/m/Y") ?> | Sistema de Biblioteca Escolar
    </footer>
</body>
</html>