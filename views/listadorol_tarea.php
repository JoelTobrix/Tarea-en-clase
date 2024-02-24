<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Roles y Tareas</title>
</head>
<body>
    <h1>Listado de Roles y Tareas</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Rol ID</th>
                <th>Usuario ID</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="datosRolTarea">
            <!-- Los datos se llenarán con AJAX -->
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../controllers/rol_tareas.php?op=todos',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var filas = '';
                    $.each(response, function(key, value) {
                        filas += '<tr><td>' + value.RolID + '</td><td>' + value.UsuarioID + '</td><td><button onclick="eliminar(' + value.RolID + ')">Eliminar</button></td></tr>';
                    });
                    $('#datosRolTarea').html(filas);
                }
            });
        });

        function eliminar(RolID) {
            // Aquí iría el código para llamar a la función de eliminación en tu controlador
            console.log("Eliminar ID:", RolID);
        }
    </script>
</body>
</html>
