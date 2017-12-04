<?php

class db{
	
		//host
		private $host='localhost';
		//usuario
		private $usuario = 'root';
		//senha
		private $senha = '';
		//Banco de dados
		private $database = 'empresa_junior';


    function conecta_mysql(){

			$con = mysqli_connect($this->host,$this->usuario,$this->senha,$this->database);//conexão

			mysqli_set_charset($con,'utf8');//Ajusta a comunicaçao da apliacaçao com o BD.
			//Verificar se houve erro.
			if(mysqli_connect_errno()) echo 'Houve erro ao tentar conectar com o Banco de Dados'.mysqli_connect_error();	
			//se não houver erro retorna a conexão.
			return $con;
		}
}
?>