<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Escolar</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Playfair Display', serif;
            height: 100vh;
            display: flex;
        }

        .left {
            flex: 1;
            background-image: url('<?= base_url('fondo-biblioteca.jpg') ?>'); /* Imagen en carpeta pública*/
            background-size: cover;
            background-position: center;
        }

        .right {
            flex: 1;
            background-color: #592C22;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            width: 350px;
            box-shadow: 0 0 20px rgba(0,0,0,0.4);
        }

        .login-box h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background-color: #C39999;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            background-color: #B38E8E;
        }

        .error {
            color: #ff6b6b;
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="left"></div>

    <div class="right">
        <div class="login-box">
            <h1><b>BIBLIOTECA ESCOLAR</b></h1>
            <?php if(session()->getFlashdata('error')): ?>
                <p class="error"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>
            <form method="post" action="<?= base_url('login/autenticar') ?>">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" required>

                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>

