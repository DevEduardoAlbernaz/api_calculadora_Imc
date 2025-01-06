<?php
    require_once("../model/conexao.class.php");
	require_once("../controller/usuarioDAO.class.php");

	header("Cache-Control: no-cache, no-store, must-revalidate"); // limpa o cache
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=utf-8"); 

    $nome = $_GET['nome'];
	$dao = new UsuarioDAO();

	$lista = $dao->buscaNome($nome);

	$json = json_encode($lista);
	echo $json;
?>