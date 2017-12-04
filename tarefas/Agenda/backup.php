 <?php
  session_start(); //inicia a seçao
  if(!isset($_SESSION['usuario'])){
    header('Location: index.php?erro=1');
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
    
    <script type="text/javascript">


      $(document).ready(

        function(){
          $('#test').click(function(){
          $("#test").fadeOut(700);
        })
    }




    );


  </script>
  <style type="text/css">
      #test1{
          position: absolute;
          z-index:1;} /*essa vai ficar por baixo*/

#test{  position: absolute;
z-index:2;} /*essa vai ficar por cima*
  </style>
</head>
<body>

  <?php
// Hora atual

  ?>
  <div class="container" id="test">
    <div class="alert alert-info" id="alerta"  >
      <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
      <strong>Contato inexistente!!!</strong>
    </div>

  </div>

  <div class="container" id="test1">
    <div class="alert alert-info" id="alerta"  >
      <button type="button" class="close" data-dismiss="alert" ><span>&times;</span></button>
      <strong>Cdasdasdasdasd!!!</strong>
    </div>
    
  </div>
  <?php




  ?>

  <script src="node_modules/popper.js/dist/popper.min.js"></script>
  <script src="node_modules/jquery/jquery.min.js"></script>
  <script src="node_modules/boostrap/dist/js/boostrap.min.js"></script>
</body>
</html>
