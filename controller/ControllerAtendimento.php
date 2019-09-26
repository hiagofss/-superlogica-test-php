<?php

$id = $_GET['id'];

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'postAtendimento') {
        postAtendimento();
    }
    if ($_POST['action'] == 'updateAtendimento') {
        updateAtendimento($id);
    }
}

function postAtendimento()
{
    $cpf = filter_input(INPUT_POST, 'cpf');
    $email = filter_input(INPUT_POST, 'email');
    $mensagem = filter_input(INPUT_POST, 'mensagem');
    $data = array("cpf" => $cpf, "email" => $email, "mensagem" => $mensagem);

    if (empty($cpf) || empty($email) || empty($mensagem)) {
        header("Location: ../Atendimento.php");
    } else {
        $json = json_encode($data);

        $curl = curl_init("http://18.228.39.100:3333/atendimento");

        curl_setopt($curl, CURLOPT_POST, 1);

        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        if (curl_exec($curl)) {
            $_SESSION['msgSuce'] = "Atendimento cadastrado com sucesso";
        } else {
            $_SESSION['msgErroCad'] = "Erro ao cadastrar atendimento, tente novamente";
            header('Location: ../Atendimento.php');
            curl_close($curl);
        }
        curl_close($curl);
        header('Location: ../Atendimento.php');
    }

}

function updateAtendimento($id)
{
    $cpf = filter_input(INPUT_POST, 'cpf');
    $email = filter_input(INPUT_POST, 'email');
    $mensagem = filter_input(INPUT_POST, 'mensagem');
    $status = filter_input(INPUT_POST, 'status');
    $data = array("cpf" => $cpf, "email" => $email, "mensagem" => $mensagem, "status" => $status);

    if (empty($cpf) || empty($email) || empty($mensagem)) {
        header("Location: ../AtendimentoCliente.php?id=1" . $id . "");
    } else {
        $json = json_encode($data);

        $url = 'http://18.228.39.100:3333/atendimento/' . $id . '';

        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);

        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        if (curl_exec($curl)) {
            $_SESSION['msgSuce'] = "Atendimento atualizado com sucesso";
        } else {
            $_SESSION['msgErroCad'] = "Erro ao atualizar atendimento, tente novamente";
            header("Location: ../AtendimentoCliente.php?id=1" . $id . "");
            curl_close($curl);
        }
        curl_close($curl);
        header('Location: ../Atendimento.php');
    }
}

function listAtendimento()
{
    $curl = curl_init('http://127.0.0.1:3333/atendimento');

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return $atendimentos = json_decode(curl_exec($curl));
}

?>