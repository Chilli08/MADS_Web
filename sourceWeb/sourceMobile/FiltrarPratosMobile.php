<?php

namespace GoEat;

require '../../vendor/autoload.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    http_response_code(200);
    exit;
}

// Habilita o CORS para permitir solicitações entre diferentes domínios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Método permitido para a solicitação
header("Access-Control-Allow-Methods: POST");

// Permite cabeçalhos específicos
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Inicia a sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $pratos = [];

    //VAI BUSCAR TODOS OS RESTAURANTES
    $restaurantes = Restaurante::search([['coluna' => 'estado', 'operador' => '=', 'valor' => 1]]);

    //OBTÉM O FILTRO ATRAVÉS DO URL
    $tipo_id= $_GET['tipo_id'];

    //VAI BUSCAR A LISTA DE PRATOS PARA OS RESTAURANTES OBTIDOS USANDO O FILTRO
    foreach ($restaurantes as $restaurante) {
        if (isset($tipo_id)) {
            $listaPratos = Prato::search([['coluna' => 'tipo', 'operador' => '=' ,'valor' => $tipo_id],['coluna' => 'restaurante', 'operador' => '=' ,'valor' => $restaurante->getId()]]);
            foreach ($listaPratos as $pratos) {
                $resultado[] = [
                    'id' => $pratos->getId(),
                    'nome' => $pratos->getNome(),
                    'descricao' => $pratos->getDescricao(),
                    'preco' => $pratos->getPreco(),
                    'imagem' => $pratos->getImagem(),
                    'tipo' => $pratos->getTipo(),
                    'disponivel' => $pratos->getDisponivel(),
                    'restaurante' => $pratos->getRestaurante()
                ];
            }
        }
    }
    header('Content-Type: application/json');
    echo json_encode($resultado);
    http_response_code(200);
}
