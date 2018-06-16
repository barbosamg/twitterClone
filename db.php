<?php

	class db{

		//host
		private $host = 'localhost';
		//usuario
		private $usuario = 'root';
		//senha
		private $senha = '';
		//nome banco
		private $database = 'bd_twitter';

		//metodo para fazer a conexao

		public function conecta_mysql(){

			//cria a conexao
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

			//ajustar o charset de comunicao entre a aplicacao eo bd
			mysqli_set_charset($con, 'utf8');

			//verificar se houve erro de conexao
			if(mysqli_connect_errno()){
				echo 'Erro ao tentar se conectar com o banco: ' . mysqli_connect_error();
			}

			return $con;
		}

	}

?>