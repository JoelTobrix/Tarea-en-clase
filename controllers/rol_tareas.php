<?php
include_once 'models/Rol-Tarea.php';
$rolTarea = new RolTarea;

switch ($_GET["op"]) {
    // Listar todas las relaciones Rol-Tarea
    case 'todos':
        $datos = $rolTarea->todos();
        $todos = [];
        while ($row = mysqli_fetch_assoc($datos)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
        break;
    }
    // Obtener una relación específica por RolID
    case "unoconRolID":
        $RolID = $_POST["RolID"];
        $datos = $rolTarea->unoconRolID($RolID);
        $res = mysqli_fetch_assoc($datos);
        echo json_encode($res);
        break;

        case 'insertar':
            $RolID = $_POST["RolID"];
            $UsuarioID = $_POST["UsuarioID"];
            $resultado = $rolTarea->Insertar($RolID, $UsuarioID);
            echo json_encode($resultado);
            break;
    
        // Actualizar una relación Rol-Tarea podría no ser tan directo, ya que implicaría cambiar uno de los dos IDs. 
        // Normalmente, se eliminaría y crearía una nueva relación en su lugar.
    
        // Eliminar una relación Rol-Tarea
        case 'eliminar':
            $RolID = $_POST["RolID"];
            $resultado = $rolTarea->Eliminar($RolID);
            echo json_encode($resultado);
            break;

?>