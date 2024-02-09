<?php

require_once('./controller/cartaController.php');
include('./modulo/config.php');

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Verifica o método da requisição
$method = $_SERVER['REQUEST_METHOD'];

// Endpoint para retornar todos os contatos
if ($method === 'GET' && isset($_GET['action']) && $_GET['action'] === 'cartas') {
    if ($dados = listarCartas()) {
        if ($dadosJSON = createJSON($dados)) {
            http_response_code(200);
            echo $dadosJSON;
        }
    } else {
        http_response_code(204);
    }
} else {
    http_response_code(404);
}
