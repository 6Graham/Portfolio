<?php
$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $webhook_url = 'https://discord.com/api/webhooks/1260618493288775792/4OACv2r0fZnqGON1bbDEhKi6zKPNnofkfDm_oghLasxFbIuHA_KyPsT3vbkutjSfDFyB'; 
    $json_data = json_encode([
        "username" => $data['username'],
        "embeds" => $data['embeds']
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    $ch = curl_init($webhook_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/json']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    curl_close($ch);

    echo "Datos enviados a Discord.";
} else {
    echo "Datos incompletos.";
}
?>
