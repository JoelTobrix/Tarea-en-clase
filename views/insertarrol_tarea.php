<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Rol-Tarea</title>
</head>
<body>
    <h1>Insertar Nueva Relación Rol-Tarea</h1>
    <form action="../controllers/rol_tareas.php?op=insertar" method="POST">
        <label for="RolID">Rol ID:</label>
        <input type="text" id="RolID" name="RolID" required><br><br>
        <label for="UsuarioID">Usuario ID:</label>
        <input type="text" id="UsuarioID" name="UsuarioID" required><br><br>
        <input type="submit" value="Insertar">
    </form>
</body>
</html>
