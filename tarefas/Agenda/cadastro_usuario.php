<?php

require_once('data_base_conection.php');

  
	
	$nome  = $_POST['usuario'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	




	if($nome==""|| $email =="" || $senha==""){

		header('location:index.php?erro_usuario=3');
		die();
	}




	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$usuario_existe= false;


	$sql="SELECT * FROM users where nome='$nome'";

	 if($resultado_id=mysqli_query($link, $sql)){

	 		$dados_usuario= mysqli_fetch_array($resultado_id);
		//	var_dump($dados_usuario);
		//	die();
			if(isset($dados_usuario['nome'])){
				// echo "Usuário já cadastrado";
				$usuario_existe=true;
			}

	}else {
		echo "Erro ao tentar localizar o registro de usuário";
	}


	if($usuario_existe){ //retorna pro index o erro
		$retorno_get='';
		if($usuario_existe){
				$retorno_get.="erro_usuario=1"; // usuario já exist

			}
		header('location:index.php?'.$retorno_get);
		die();
	}

	$sql="INSERT INTO users (nome, email, password) values ('$nome','$email','$senha');";
	 mysqli_query($link, $sql);
     header ("location: home.php?erro=0&pagina=1");

?>




