<?php
    require_once("../model/conexao.class.php");
    if(Conexao::getInstance()){
        echo "BD Conectado";
    }else{
        echo "Erro ao conectar BD";
    }
?>