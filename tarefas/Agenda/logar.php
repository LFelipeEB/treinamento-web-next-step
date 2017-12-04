<?php
	
	session_start();
	require_once('data_base_conection.php');
	
  	
	
	$nome  = $_POST['usuario'];
	$senha = $_POST['senha'];
	

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql="SELECT * FROM users where nome='$nome' and password ='$senha' ";

	$resultado_id = mysqli_query($link, $sql);




	if($resultado_id){

	         $dados_usuario= mysqli_fetch_array($resultado_id);// retorna a pesquisa do banco de dados com um array
			 // var_dump($dados_usuario);
			 // die();

			if(isset($dados_usuario['nome'])){
					
				$_SESSION['id_usuario'] = $dados_usuario['id'];
				$_SESSION['usuario'] = $dados_usuario['nome'];
				$_SESSION['email'] = $dados_usuario['email'];
			
                header('Location: home.php?erro=0&pagina=1');

			}
			else{
					//echo 'Usuário não existe';
					header('Location: index.php?erro_usuario=2');//forçando a redirecionamento da pagina
				}
		}	
		else {
				echo('Erro na execução da consulta, favor entrar em contato com admin do site.');
		}

?>




