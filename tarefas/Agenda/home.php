 <?php
  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

  $erro=$_GET['erro'];

  $pagina=$_GET['pagina'];

        if(!isset($erro) ){
            echo "asdasd";
            $erro=0;
        }



  ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>  
    <title>Home</title>
    <link type="text/css" rel="stylesheet" href="node_modules/bootrap/dist/css/boostrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 


  </head>

  <script type="text/javascript">
    function Nova(){
     location.href="add_contato.php?info=0";
   }


   $(function(){
        $('#test').click(function(){
          $("#test").fadeOut(700);
        })
      });

 </script>

 <body>
 <?php

    if($erro==4){
      ?>
      <div class="container" id="test">
      <div class="alert alert-info" id="alerta"  >
        <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
         <strong>Contato inexistente!!!</strong>
      </div>
      
      </div>
      <?php
    }

 ?>
<div class="container">
   <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Agenda</a>  
    <ul class="navbar-nav mr-auto" style=" padding-left: 100px; ">
      <li class="nav-item active">
        <a class="nav-link" href="add_contato.php?info=0">Adicionar Contatos <span class="sr-only">(current)</span></a>
      </li>

    </ul> 
    <nav class="navbar navbar-light bg-faded">
      <form class="form-inline" method="post" action="pesquisa.php">
        <div class="input-group" style="margin-right: 150px">
          <input type="text" class="form-control" name="pesquisa"  placeholder="Pesquisar ..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="submit">Pesquisar!</button>
          </span>
        </div><!-- /input-group -->


        <p style="margin-right: 15px; margin-top: 15px; font-size: 17px"><?php echo $_SESSION['usuario'];?></p>
        <a href="sair.php">Sair</a>
      </form>
    </nav>
  </nav>
</div>

<div class="container">
  <?php
  require_once('lista_contatos.php');
  ?>

  <div >
   <span style="color: black">Páginas: </span>
   <strong>
    <?php
     for($i = 1; $i < $numPaginas + 1; $i++) { 
     echo "<a style='color: black' href='home.php?erro=0&pagina=$i'>".$i."</a> "; 
   } 
   ?></strong>
 </div>

 <div class="container" style="min-height: 220px">
  <div class="row">
    <div class="col-sm-6" style="color: white">
      <!--  Registros exibidos: <strong><?php echo $total ?></strong> -->
    </div>
    <div class="col-sm-6 align-right" >
            <!-- 
            <a href="novo1.php">
              <p style="text-align: right; padding-right: 125px"><button class="btn btn-light" style="box-shadow: 2px 2px 5px black;">Novo Cadastro</button></p>
            </a>
          -->
          <div class="botao">

           <button type="button"  style="float:right" class="  botao1 form-inline btn btn-default" onclick="Nova()">Adicionar</button>
         </div>
       </div>


     </div>
   </div>

 </div>






































 <script src="node_modules/popper.js/dist/popper.min.js"></script>
 <script src="node_modules/jquery/jquery.min.js"></script>
 <script src="node_modules/boostrap/dist/js/boostrap.min.js"></script>
</body>
</html>
