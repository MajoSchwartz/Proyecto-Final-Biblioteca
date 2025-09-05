<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Libros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (para íconos) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h2 { text-align: center; margin-bottom: 20px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <!-- Botón de imprimir / exportar PDF -->
    <div class="no-print text-end mb-3 me-5">
        <button class="btn btn-primary" onclick="window.print()">
            <i class="fas fa-print"></i> Imprimir / Exportar PDF
        </button>
    </div>

    <h2>Reporte de Libros</h2>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Páginas</th>
                <th>No. Ejemplar</th>
                <th>Cantidad</th>
                <th>Nivel</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($libros as $libro): ?>
                <tr>
                    <td><?= esc($libro['id']) ?></td>
                    <td><?= esc($libro['titulo']) ?></td>
                    <td><?= esc($libro['autor']) ?></td>
                    <td><?= esc($libro['género']) ?></td>
                    <td><?= esc($libro['páginas']) ?></td>
                    <td><?= esc($libro['Ejemplar']) ?></td>
                    <td><?= esc($libro['cantidad']) ?></td>
                    <td><?= esc($libro['nivel']) ?></td>
                    <td><?= esc($libro['estado']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

</html>