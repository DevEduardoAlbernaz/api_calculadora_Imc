<?php
	class Usuario{
		private $id;
		private $nome;
		private $genero;
		private $altura;
		private $peso;
		private $imc;
		private $classificacao;

		public function setId($id){
			$this->id = $id;
		}
		public function setNome($nome){
			$this->nome = $nome;
		}
		public function setGenero($genero){
			$this->genero = $genero;
		}
		public function setAltura($altura){
			$this->altura = $altura;
		}
		public function setPeso($peso){
			$this->peso = $peso;
		}
		public function setImc($imc){
			$this->imc = $imc;
		}
		public function setClassificacao($classificacao){
			$this->classificacao = $classificacao;
		}

		public function getId(){
			return $this->id;
		}
		public function getNome(){
			return $this->nome;
		}
		public function getGenero(){
			 return $this->genero;
		}
		public function getAltura(){
			return	$this->altura;
		}
		public function getPeso(){
			 return $this->peso;
		}
		public function getImc(){
			return $this->imc ;
		}
		public function getClassificacao(){
			return $this->classificacao;
		}
		
	}
?>