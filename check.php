<?php
// 보안을 위해 API 토큰을 서버 코드에 숨깁니다.
$ACCESS_TOKEN = 'o.uVBmUrvbFOlba1bu0Gj8ArmHD2jmLBo9';

header('Content-Type: application/json');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.pushbullet.com/v2/pushes?limit=15");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Access-Token: $ACCESS_TOKEN",
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Pushbullet 서버 응답 그대로 브라우저에 전달
http_response_code($http_code);
echo $response;
?>
