<?php>
<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "sistemagestorproyectos");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Función para insertar una relación rol-usuario
function insertarRolUsuario($conexion, $rolID, $usuarioID) {
    $sql = "INSERT INTO rolusuariorelacion (RolID, UsuarioID) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $rolID, $usuarioID);
    if ($stmt->execute() === TRUE) {
        echo "Nueva relación rol-usuario creada con éxito.";
    } else {
        echo "Error al crear la relación: " . $conexion->error;
    }
    $stmt->close();
}

// Función para seleccionar todas las relaciones rol-usuario
function seleccionarRolesUsuarios($conexion) {
    $sql = "SELECT RolID, UsuarioID FROM rolusuariorelacion";
    $result = $conexion->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "RolID: " . $row["RolID"]. " - UsuarioID: " . $row["UsuarioID"]. "<br>";
        }
    } else {
        echo "No hay relaciones rol-usuario.";
    }
}

// Función para actualizar una relación rol-usuario
function actualizarRolUsuario($conexion, $rolID, $usuarioID, $nuevoRolID, $nuevoUsuarioID) {
    $sql = "UPDATE rolusuariorelacion SET RolID=?, UsuarioID=? WHERE RolID=? AND UsuarioID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("iiii", $nuevoRolID, $nuevoUsuarioID, $rolID, $usuarioID);
    if ($stmt->execute() === TRUE) {
        echo "Relación rol-usuario actualizada con éxito.";
    } else {
        echo "Error al actualizar la relación: " . $conexion->error;
    }
    $stmt->close();
}

// Función para eliminar una relación rol-usuario
function eliminarRolUsuario($conexion, $rolID, $usuarioID) {
    $sql = "DELETE FROM rolusuariorelacion WHERE RolID=? AND UsuarioID=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $rolID, $usuarioID);
    if ($stmt->execute() === TRUE) {
        echo "Relación rol-usuario eliminada con éxito.";
    } else {
        echo "Error al eliminar la relación: " . $conexion->error;
    }
    $stmt->close();
}

// Ejemplo de uso
insertarRolUsuario($conexion, 1, 100);
seleccionarRolesUsuarios($conexion);
actualizarRolUsuario($conexion, 1, 100, 2, 200);
eliminarRolUsuario($conexion, 2, 200);

// Cerrar conexión
$conexion->close();
?>

?>