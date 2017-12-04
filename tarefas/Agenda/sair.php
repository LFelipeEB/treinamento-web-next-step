 <?php
  session_start(); //inicia a seçao
  

  session_destroy();
    header('Location: index.php');

?>