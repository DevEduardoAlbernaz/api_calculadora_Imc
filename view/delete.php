<?php
    require_once("../model/conexao.class.php");
    require_once("../controller/usuarioDAO.class.php");

    $id = $_GET['id'];
	$dao = new UsuarioDAO();

	$dao->remover($id);
?>