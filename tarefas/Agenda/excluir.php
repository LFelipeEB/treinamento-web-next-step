  <?php
  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }


	require_once('data_base_conection.php');


 	$id_user= $_SESSION['id_usuario'];  

 	$id=$_GET['id'];

	  $objDb = new db();
	  $link = $objDb->conecta_mysql();

	    $sql="DELETE FROM peoples WHERE id = '$id' AND user_id = '$id_user';";
    	
    	mysqli_query($link, $sql);
    	header('Location: home.php?erro=0&pagina=1');
?>