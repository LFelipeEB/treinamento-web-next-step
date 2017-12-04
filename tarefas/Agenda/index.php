  <?php
     if(isset($_GET['erro_usuario'])){
        $erro=$_GET['erro_usuario'];
     }

     else{
        $erro=0;
     }
  ?>
  <!DOCTYPE html>
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>  
    <title>Cadastro de Extintores</title>


    <link type="text/css" rel="stylesheet" href="node_modules/bootrap/dist/css/boostrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/animated.css">
     <link rel="stylesheet" type="text/css" href="css/style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <!-- jquery - link cdn -->
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>




<script type="text/javascript">

<?php 
if($erro==1 || $erro==3){ //erro com o cadastro
  ?> 
  $(function() {  //oculta as classe ao carregar o documento
        $('#login').hide();
        $('#cadastro').show();
        // alert ('asdas');
  });
  <?php
}
?>

<?php 
if($erro==0 || $erro==2){  
  ?>
 $(function() {  //oculta as classe ao carregar o documento
        $('#cadastro').hide();
        // alert ('asdas');
  });
 <?php
}
?>

function troca(id,id2){
      $('#'+id2).hide();
      $('#'+id).show();
    }
</script>



  </head>
<body>
  <div class="container">
    <div class="top">
      <h1 id="title" class="hidden" style=" padding-top: 100px;"><span >Agenda</span></h1>
    </div>
    <div class="login-box animated fadeInUp" id="login" > 
      <div class="box-header">
        <h2>Logar</h2>
      </div>
      <form method="post" action="logar.php">
          <label for="usuario">Usuário</label>
          <br/>
          <input type="text" id="usuario" name="usuario">
          <br/>
          <label for="senha">Senha</label>
          <br/>
          <input type="password" id="senha" name="senha">
          <br/>
          <button type="submit">Entrar</button> 
          <button type="button" class="btn btn-success" onclick="troca('cadastro','login')">Cadastrar</button>
          <br/>
          <?php
                    if($erro==2){
                      echo '<font color ="FF0000"> Usuário ou Senha inválidos</font>';
                    }
              ?>

      <a href="#"><p class="small">Forgot your password?</p></a>
      </form>
    </div>
  </div>


  <div class="login-box animated fadeInUp" id="cadastro">
      <div class="box-header">
        <h2>CADASTRAR</h2>
      </div>
    <form method="post" action="cadastro_usuario.php">
      <label for="usuario">Usuário</label>
      <br/>
      <input type="text" id="usuario" name="usuario">
      <br/>
      <label for="email">E-mail</label>
      <br/>
      <input type="email" id="email" name="email">
      <br/>
      <label for="senha">Senha</label>
      <br/>
      <input type="password" id="senha" name="senha">
      <br/>
       <button type="button" class="btn btn-success" onclick="troca('login','cadastro')">Voltar</button>
        <button type="submit">Confimar</button>
      <br/>
      <?php
               if($erro==1){
                  echo '<font color ="FF0000"> Usuário já existe</font>';
                }
                if($erro==3){
                  echo '<font color ="FF0000"> Dados inválidos</font>';
                }


          ?>
    </form>
    </div>

</body>
<script>
  $(document).ready(function () {
      $('#logo').addClass('animated fadeInDown');
      $("input:text:visible:first").focus();
  });
  $('#username').focus(function() {
    $('label[for="username"]').addClass('selected');
  });
  $('#username').blur(function() {
    $('label[for="username"]').removeClass('selected');
  });
  $('#password').focus(function() {
    $('label[for="password"]').addClass('selected');
  });
  $('#password').blur(function() {
    $('label[for="password"]').removeClass('selected');
  });
</script>






     <script src="node_modules/popper.js/dist/popper.min.js"></script>
     <script src="node_modules/jquery/jquery.min.js"></script>
     <script src="node_modules/boostrap/dist/js/boostrap.min.js"></script>
 
  </html>

