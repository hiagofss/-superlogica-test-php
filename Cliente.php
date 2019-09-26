<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.superlogica.net/v2/financeiro/clientes");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
    "app_token: tVOs6cs7u4jU",
    "access_token: 34EhgQBIfvTJ"
));

$response = curl_exec($ch);
curl_close($ch);

var_dump($response);