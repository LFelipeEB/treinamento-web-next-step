<?php

  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

require_once('data_base_conection.php');
	

  
	
	$nome  = $_POST['nome'];
	$email = $_POST['email'];
	$phone = $_POST['telefone'];
	$obsercacao = $_POST['obsercacao'];
	$id_user= $_SESSION['id_usuario'];	

    

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$sql="INSERT INTO peoples (user_id, nome, email, phone, obsercacao ) values ('$id_user','$nome','$email','$phone','$obsercacao');";
	 mysqli_query($link, $sql);
     header ("location: add_contato.php?info=1"); // retorna sucesso
     

?>




