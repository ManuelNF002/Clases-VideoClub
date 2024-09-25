<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cliente</title>
</head>
<body>
<h1>Actualizar Cliente</h1>
<form action="updateCliente.php" method="post">
    <!-- Campos para editar -->
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required>
    <br>
    <label for="user">Usuario:</label>
    <input type="text" id="user" name="user" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="numero">Número:</label>
    <input type="text" id="numero" name="numero" required>
    <br>
    <label for="maxAlquilerConcurrente">Máximo Alquiler Concurrente:</label>
    <input type="text" id="maxAlquilerConcurrente" name="maxAlquilerConcurrente" required>
    <br>
    <button type="submit">Actualizar Cliente</button>
</form>
</body>
</html>
