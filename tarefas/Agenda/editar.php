
<?php
	
  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

require_once('data_base_conection.php');

	

	$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_var($_POST['nome']);
	$phone = filter_var($_POST['telefone']);
	$email = filter_var($_POST['email']);
	$obsercacao = filter_var($_POST['obsercacao']);



	

	$objDb = new db();
	$link = $objDb->conecta_mysql();



	//Verifica se  teve alteração na row


	$sql="SELECT  * FROM peoples where id='$id';";
 	
 	$resultado=mysqli_query($link, $sql);
    $resultado= mysqli_fetch_array($resultado);








     if($nome != $resultado['nome'] || $phone!= $resultado['phone'] || $email!= $resultado['email'] || $obsercacao!= $resultado['obsercacao']){


		date_default_timezone_set("Brazil/East");
		$data_atual= date('Y-m-d H:i:s');

				

		$sql="UPDATE peoples SET nome = '$nome', phone = '$phone',  email='$email', obsercacao ='$obsercacao', modified_at = '$data_atual' where id = '$id';";
		mysqli_query($link, $sql);
     }





	
   
	header ("location: home.php?erro=0&pagina=1");






?>
