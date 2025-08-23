<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
    background-color: #a35d53;
    font-family: sans-serif;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0px;
    }

    h1 { /* Se aplica directamente a la etiqueta h1, no a una clase */
        font-size: 40px;
        font-weight: bold;
        margin-bottom: 30px;
        color: rgb(240, 240, 240);
    }

    .login {
        background-color: white;
        padding: 40px;
        border-radius: 20px;
        max-width: 400px;
        width: 90%;
        text-align: left;
    }

    h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 24px;
        color: black;
        text-align: center;
    }

    input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        margin: 5px 0px 15px 0px;
    }

    button {
        width: 100%;
        padding: 15px;
        border: none;
        border-radius: 10px;
        background-color: #C39999;
        color: white;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background-color: #B38E8E;
    }

    .error {
        color: red;
        font-size: 14px;
        text-align: center;
        margin-bottom: 15px;
    }
    </style>
</head>
<body>
    <h1>Biblioteca Escolar</h1>
    <div class="login">
        <h2>Iniciar Sesión</h2>
        <?php if(session()->getFlashdata('error')): ?>
            <p class="error"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
        <form method="post" action="<?= base_url('login/autenticar') ?>">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>