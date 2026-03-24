<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // CORS 문제 방지

// ⚠️ 여기에 Pushbullet에서 만든 Access Token을 정확히 넣으세요.
$ACCESS_TOKEN = 'o.uVBmUrvbFOlba1bu0Gj8ArmHD2jmLBo9';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.pushbullet.com/v2/pushes?limit=15");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Access-Token: $ACCESS_TOKEN",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if (curl_errno($ch)) {
    echo json_encode(['error' => 'Connection Error']);
} else {
    http_response_code($http_code);
    echo $response;
}

curl_close($ch);
?>
