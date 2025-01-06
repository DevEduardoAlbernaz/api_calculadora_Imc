<?php
require_once("../model/conexao.class.php");
require_once("../model/usuario.class.php");
require_once("../controller/usuarioDAO.class.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Permissões de CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

// Criando os objetos
$usuario = new Usuario();
$dao = new UsuarioDAO();

// Atribui os dados enviados via POST ao objeto usuário
$usuario->setNome($_POST['nome']);
$usuario->setGenero($_POST['genero']);
$usuario->setAltura($_POST['altura']);
$usuario->setPeso($_POST['peso']);
$usuario->setImc($_POST['imc']);
$usuario->setClassificacao($_POST['classificacao']);

// Tenta inserir no banco
if ($dao->inserir($usuario)) {
    echo json_encode(["message" => "Usuário cadastrado com sucesso!"]);
} else {
    echo json_encode(["message" => "Erro ao cadastrar usuário!"]);
}
?>