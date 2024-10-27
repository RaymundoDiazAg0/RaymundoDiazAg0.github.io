<?php
include 'conexion.php'; // Incluir el archivo de conexión

header('Content-Type: application/json'); // Asegura que la respuesta sea JSON

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $codigo_confirmacion = $_POST['codigo_confirmacion'];
        $pases_confirmados = $_POST['pases_confirmados'];

        // Verificar si el código de confirmación existe en la base de datos
        $sql = "SELECT * FROM invitados WHERE codigo_confirmacion = :codigo_confirmacion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':codigo_confirmacion', $codigo_confirmacion);
        $stmt->execute();
        
        $invitado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($invitado) {
            // Obtener el número total de pases permitidos
            $n_pases = $invitado['n_pases'];

            // Verificar si el número de pases confirmados excede el número permitido
            if ($pases_confirmados > $n_pases) {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'No puedes confirmar más pases de los que tienes disponibles.'
                ]);
                exit;
            }

            // Actualizar el estado de confirmación y el número de pases confirmados del invitado
            $update_sql = "UPDATE invitados SET confirmar = 1, pases_confirmados = :pases_confirmados WHERE codigo_confirmacion = :codigo_confirmacion";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bindParam(':codigo_confirmacion', $codigo_confirmacion);
            $update_stmt->bindParam(':pases_confirmados', $pases_confirmados, PDO::PARAM_INT);

            if ($update_stmt->execute()) {
                // Respuesta JSON de éxito
                echo json_encode([
                    'status' => 'success',
                    'message' => '¡Gracias ' . $invitado['nombre'] . ', has confirmado ' . $pases_confirmados . ' pases!'
                ]);
            } else {
                // Obtener el error de la ejecución de la consulta
                $errorInfo = $update_stmt->errorInfo();
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error al confirmar la asistencia. Detalles del error: ' . $errorInfo[2]
                ]);
            }
        } else {
            // Respuesta JSON si el código no es válido
            echo json_encode([
                'status' => 'error',
                'message' => 'Código de confirmación no válido. Verifica tu invitación.'
            ]);
        }
    }
} catch (PDOException $e) {
    // Captura errores de conexión o de base de datos
    echo json_encode([
        'status' => 'error',
        'message' => 'Error en la base de datos: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    // Captura cualquier otro tipo de errores
    echo json_encode([
        'status' => 'error',
        'message' => 'Error inesperado: ' . $e->getMessage()
    ]);
}
?>