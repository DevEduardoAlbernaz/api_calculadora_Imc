<?php
require_once("../model/conexao.class.php");
require_once("../model/usuario.class.php");
require_once("../controller/usuarioDAO.class.php");

header("Cache-Control: no-cache, no-store, must-revalidate");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

$body = file_get_contents('php://input');
$jsonBody = json_decode($body, true);

$usuario = new Usuario();
$dao = new UsuarioDAO();

try {
    if ($jsonBody) {
        $usuario->setId($jsonBody['id']);
        $usuario->setNome($jsonBody['nome']);
        $usuario->setGenero($jsonBody['genero']);
        $usuario->setAltura($jsonBody['altura']);
        $usuario->setPeso($jsonBody['peso']);
        $usuario->setImc($jsonBody['imc']);
        $usuario->setClassificacao($jsonBody['classificacao']);
    } else {
        $usuario->setId($_POST['id']);
        $usuario->setNome($_POST['nome']);
        $usuario->setGenero($_POST['genero']);
        $usuario->setAltura($_POST['altura']);
        $usuario->setPeso($_POST['peso']);
        $usuario->setImc($_POST['imc']);
        $usuario->setClassificacao($_POST['classificacao']);
    }

    $result = $dao->atualizar($usuario);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "Usuário atualizado com sucesso!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Erro ao atualizar usuário."]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>