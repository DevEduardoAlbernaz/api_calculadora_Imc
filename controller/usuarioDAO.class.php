<?php
class UsuarioDAO{
    public function buscaNome($nome){
		try{
			$sql = "SELECT * FROM usuario WHERE nome LIKE :nome";
			$p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->bindValue(":nome", "%{$nome}%");
			$p_sql->execute();
			$lista = $p_sql->fetchAll(PDO::FETCH_ASSOC);
			return $lista;
		}catch(Exception $e){
			echo "Erro ao consultar usuario: ".$e->getMessage();
		}
	}
	
	public function inserir($usuario) {
		try {
			$sql = "INSERT INTO usuario (nome, genero, altura, peso, imc, classificacao) 
					VALUES (:nome, :genero, :altura, :peso, :imc, :classificacao)";
			$p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->bindValue(":nome", $usuario->getNome());
			$p_sql->bindValue(":genero", $usuario->getGenero());
			$p_sql->bindValue(":altura", $usuario->getAltura());
			$p_sql->bindValue(":peso", $usuario->getPeso());
			$p_sql->bindValue(":imc", $usuario->getImc());
			$p_sql->bindValue(":classificacao", $usuario->getClassificacao());
	
			// Executa o comando e verifica se foi bem-sucedido
			if ($p_sql->execute()) {
				echo "Inserção bem-sucedida!";
				return true; // Retorna sucesso
			} else {
				echo "Falha na inserção!";
				return false; // Retorna falha
			}
		} catch (Exception $e) {
			echo "Erro ao cadastrar usuário: " . $e->getMessage();
			return false; // Retorna falha em caso de exceção
		}
	}
	public function remover($id){
		try{
			$sql = "DELETE FROM usuario WHERE id = :id ";
			$p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->bindValue(":id", $id);
			return $p_sql->execute();
		}catch(Exception $e){
			echo "Erro ao remover usuario: ".$e->getMessage();
		}
	}

	public function atualizar($usuario) {
		try {
			$sql = "UPDATE usuario SET nome = :nome, genero = :genero, altura = :altura, peso = :peso, imc = :imc, classificacao = :classificacao WHERE id = :id";
			$p_sql = Conexao::getInstance()->prepare($sql);
			$p_sql->bindValue(":id", $usuario->getId());
			$p_sql->bindValue(":nome", $usuario->getNome());
			$p_sql->bindValue(":genero", $usuario->getGenero());
			$p_sql->bindValue(":altura", $usuario->getAltura());
			$p_sql->bindValue(":peso", $usuario->getPeso());
			$p_sql->bindValue(":imc", $usuario->getImc());
			$p_sql->bindValue(":classificacao", $usuario->getClassificacao());
	
			return $p_sql->execute();
		} catch (Exception $e) {
			echo "Erro ao atualizar usuário: " . $e->getMessage();
		}
	}

}
?>
 