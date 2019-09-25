<?php

$id = $_GET['id'];

$curl = curl_init('http://127.0.0.1:3333/atendimento/$id');

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$atendimentos = json_decode(curl_exec($curl));

// print_r($atendimentos);

?>