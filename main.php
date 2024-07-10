<?php
// Obtener parámetros de la URL
$userId = $_GET['USERID'] ?? '';
$username = $_GET['USERNAME'] ?? '';
$thumbnail = $_GET['THUMBNAIL'] ?? '';
$scriptName = $_GET['SCRIPT_NAME'] ?? '';
$clientIp = $_GET['CLIENT_IP'] ?? '';

// Validar y procesar los datos
if (!empty($userId) && !empty($username) && !empty($clientIp)) {
    // Procesar los datos (ejemplo: guardar en un archivo de registro)
    $logData = "UserID: $userId, Username: $username, Thumbnail: $thumbnail, ScriptName: $scriptName, ClientIP: $clientIp\n";
    file_put_contents('logs.txt', $logData, FILE_APPEND);
    
    // Responder al cliente (opcional)
    echo "Datos recibidos y procesados correctamente.";
} else {
    echo "Datos incompletos.";
}
?>
