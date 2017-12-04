  <?php
  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
  }

  $info=$_GET['info'];
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
    

     <?php
      if($info==0){
      ?>
    $(function() {  //oculta as classe ao carregar o documento
      $('#test').hide();
    });

     <?php
    }
   
    if($info==1){
      ?>

     $(function(){
        $('#test').click(function(){
          $("#test").fadeOut(700);
        })
      });


    <?php

  }
  
  ?>

</script>

<style type="text/css">
   

#test{  position: absolute;
z-index:2;} /*essa vai ficar por cima*
</style>






</head>
<body>



 <div class="container">

   <div class="container" id="test" style="margin-left: -15px;">
    <div class="alert alert-info" id="alerta"  >
      <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
      <strong>Adicionado com sucesso!!!</strong>
    </div>

  </div>


  <div>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Agenda</a>
    <form class="form-inline">

      <p style="margin-right: 15px; margin-top: 15px;"><?php echo $_SESSION['usuario'];?></p>

      <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> -->
      <a href="ssair.php">Sair</a>
    </form>

  </nav>
  </div>
</div>


<div class="container  colo-container">
  <!-- <div class="page-header"><h1>Cadastro Contatos</h1></div> -->
  <div class="row">
    <div class="col-sm-12">
      <h3>Adicionar Contato</h3>
      <form method="post" action="add_contato_bd.php">
        <div class="form-group">
          <label for="nome">Nome:</label>
          <input type="text" class="form-control"  name="nome" id="nome">
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="email" class="form-control"   name="email" id="email">
        </div>  
        <div class="form-group">
          <label for="telefone">Telefone:</label>
          <input type="text" class="form-control"   name="telefone" id="telefone">
        </div>
        <div class="form-group">
         <label for="obsercacao">Observação:</label> 
         <textarea class="form-control" rows="4"  id="obsercacao" name="obsercacao"></textarea>
       </div>


       <button  type="button"  class="  botao1 form-inline btn btn-default" onclick="Nova()">Voltar</button>
       <button type="submit"  style="float:right" class="  botao1 form-inline btn btn-default">Adicionar</button>


     </form>
   </div>


 </div>
</div>













<script src="node_modules/popper.js/dist/popper.min.js"></script>
<script src="node_modules/jquery/jquery.min.js"></script>
<script src="node_modules/boostrap/dist/js/boostrap.min.js"></script>
</body>
</html>
