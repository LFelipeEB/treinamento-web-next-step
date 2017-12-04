  <?php
  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }
?>

<!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>  
    <title>Adicionar Contato</title>
    <link type="text/css" rel="stylesheet" href="node_modules/bootrap/dist/css/boostrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- jquery - link cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
  function Nova(){
   location.href="home.php?erro=0&pagina=1";
    }


    $(function() {  //oculta as classe ao carregar o documento
        $('#deixarculto').hide();
        // alert ('asdas');
  });
</script>



  </head>
 <body>
        <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Agenda</a>
  <form class="form-inline">

    <p style="margin-right: 15px; margin-top: 15px;"><?php echo $_SESSION['usuario'];?></p>
    
    <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
   <a href="sair.php">Sair</a>
  </form>
</nav>  



  <?php
 
require_once('data_base_conection.php');

    
  $id_user= $_SESSION['id_usuario'];  

  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);


  $objDb = new db();
  $link = $objDb->conecta_mysql();


    $sql="SELECT * FROM peoples where id = '$id' AND user_id = '$id_user';";
     $dados_usuario=mysqli_query($link, $sql);

     $linha= mysqli_fetch_array($dados_usuario);

     // echo $linha['id'];
     // die();

  ?>
  


        <div class="container  colo-container">
        <!-- <div class="page-header"><h1>Cadastro Contatos</h1></div> -->
          <div class="row">
            <div class="col-sm-12">
            <h3>Editar Contato</h3>
                <form method="post" action="editar.php" >

                  <div class="form-group" id="deixarculto">
                    <input type="text" class="form-control"  name="id" id="nome" value="<?php echo $linha['id'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control"  name="nome" id="nome" value="<?php echo $linha['nome'] ?>">
                  </div>
                   <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control"   name="email" id="email" value="<?php echo $linha['email'] ?>">
                  </div>  
                   <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control"   name="telefone" id="telefone" value="<?php echo $linha['phone'] ?>">
                   </div>
                  <div class="form-group">
                     <label for="obsercacao">Observação:</label> 
                     <textarea class="form-control" rows="4"  id="obsercacao" name="obsercacao" ><?php echo $linha['obsercacao'] ?></textarea>

                  </div>

                        
                    <button  type="button"  class="  botao1 form-inline btn btn-default" onclick="Nova()">Voltar</button>
                    <button type="submit"  style="float:right" class="  botao1 form-inline btn btn-default">Confirmar</button>


                    </form>
                 </div>

                
            </div>
          </div>
        











      
     <script src="node_modules/popper.js/dist/popper.min.js"></script>
     <script src="node_modules/jquery/jquery.min.js"></script>
     <script src="node_modules/boostrap/dist/js/boostrap.min.js"></script>
  </body>
  </html>
