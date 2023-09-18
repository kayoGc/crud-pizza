<?php

require_once '../includes/DbOperacao.php';

function isTheseParamtersAvailabe($params)
{
    $availabe = true;
    $missingParams = "";

    foreach ($params as $param) {
        if (!isset($_POST[$param]) || strlen($_POST[$param]) <= 0) {
            $available = false;
            $missingParams = $missingParams . ", " . $param;
        }
    }

    if (!$availabe) {
        $response = array();
        $response['error'] = true;
        $response['message'] = 'Parameters ' . substr($missingParams, 1, strlen($missingParams)) . ' missing';

        echo json_encode($response);

        die();
    }
}

$response = array();


if (isset($_GET['apicall'])) {
    switch ($_GET['apicall']) {
        case 'criarPizza':

            isTheseParamtersAvailabe(array('sabor', 'tipo', 'preco'));

            $db = new DbOperacao;

            if ($db->criarPizza($_POST['sabor'], $_POST['tipo'], $_POST['preco'])) {
                $response['error'] = false;
                $response['message'] = 'Pizza adicionada com sucesso';
                $response['pizzas'] = $db->getAllPizzas();
            } else {
                $response['error'] = true;
                $response['message'] = 'Algum erro aconteceu, por favor tente novamente';
            }
            break;

        case 'getPizza':
            isTheseParamtersAvailabe(array('id'));

            $db = new DbOperacao;
            $response['error'] = false;
            $response['message'] = 'Pedido concluido com sucesso';
            $response['pizza'] = $db->getPizza($_POST['id']);
            break;

        case 'getAllPizzas':
            $db = new DbOperacao;
            $response['error'] = false;
            $response['message'] = 'Pedido concluido com sucesso';
            $response['pizzas'] = $db->getAllPizzas();
            break;

        case 'updatePizza':
            isTheseParamtersAvailabe(array('id', 'sabor', 'tipo', 'preco'));

            $db = new DbOperacao;

            if ($db->updatePizza($_POST['id'], $_POST['sabor'], $_POST['tipo'], $_POST['preco'])) {
                $response['error'] = false;
                $response['message'] = "Pizza modificada com sucesso";
                $response['pizzas'] = $db->getAllPizzas();
            } else {
                $response['error'] = true;
                $response['message'] = 'Algum erro aconteceu, por favor tente novamente';
            }
            break;
        
        case 'deletePizza':
            if ($_GET['id']) {
                $db = new DbOperacao;
                if ($db->deletePizza($_GET['id'])) {
                    $response['error'] = false;
                    $response['message'] = 'Pizza apagada com sucesso';
                    $response['pizzas'] = $db->getAllPizzas();
                } else {
                    $response['error'] = true;
                    $response['message'] = 'Algum erro ocorreu por favor tente novamente';
                }
            } else {
                $response['error'] = true;
                $response['message'] = 'Não foi possível deletar forneça um id por favor';
            }
            break;
    }
} else {
    $response['error'] = true;
    $response['message'] = 'Chamada de Api invalida';
}

echo json_encode($response);
