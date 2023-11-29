<?php

namespace GoEat;

require '../../vendor/autoload.php';

use GoEat\MyConnect;

// Allow specified headers in the preflight response
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
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

// Verifique o método da solicitação
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $response = [];

    $connection = MyConnect::getInstance();

    // Verifique se o parâmetro 'id' está presente na URL (tipo de prato)
    if (isset($_GET['id'])) {
        $tipoId = $_GET['id'];

        // Consulta os pratos com base no tipo
        $stmt = $connection->prepare("SELECT * FROM pratos WHERE tipo = ?");
        $stmt->bind_param("s", $tipoId);
        $stmt->execute();
        $result = $stmt->get_result();

        // Prepare a resposta para os pratos encontrados
        while ($prato = $result->fetch_assoc()) {
            $response[] = [
                'id' => $prato['id'],
                'nome' => $prato['nome'],
                'descricao' => $prato['descricao'],
                'preco' => $prato['preco'],
                'imagem' => $prato['imagem'],
                // Adicione outros atributos conforme necessário
            ];
        }
    } else {
        // Se nenhum tipo foi fornecido, retorne todos os pratos
        $result = $connection->query("SELECT * FROM pratos");

        // Prepare a resposta para todos os pratos encontrados
        while ($prato = $result->fetch_assoc()) {
            $response[] = [
                'id' => $prato['id'],
                'nome' => $prato['nome'],
                'descricao' => $prato['descricao'],
                'preco' => $prato['preco'],
                'imagem' => $prato['imagem'],
                // Adicione outros atributos conforme necessário
            ];
        }
    }

    // Envie a resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    http_response_code(200);
    exit;
} else {
    // Se o método da solicitação não for GET
    echo json_encode(["message" => "Método não permitido"]);
    http_response_code(405);
    exit;
}
