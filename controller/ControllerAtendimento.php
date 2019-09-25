<?php

  $cpf = filter_input(INPUT_POST, 'cpf');
  $email = filter_input(INPUT_POST, 'email');
  $mensagem = filter_input(INPUT_POST, 'mensagem');
  $data = array("cpf" => $cpf,"email" =>  $email,"mensagem" =>  $mensagem);

  $json = json_encode($data);

  $curl = curl_init("http://127.0.0.1:3333/atendimento");

  curl_setopt($curl, CURLOPT_POST, 1);

  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


  $result = curl_exec($curl);

  curl_close($curl);

// header("Location: ../index.php");

?>