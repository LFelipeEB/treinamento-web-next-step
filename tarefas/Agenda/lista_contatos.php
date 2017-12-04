<div style="min-height: 500px">
<table class="table table-striped" style="margin-top:20px; " >
				<thead class="" style="background-color:#AF8E68; color: white">
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Telefone</th>
						<th class="text-center">Ações</th>
					</tr>
				</thead>
	<tbody style="background-color: white">

	<?php
        
	include_once "data_base_conection.php";
   
	$objDb = new db();
	$link = $objDb->conecta_mysql();
	$id_user= $_SESSION['id_usuario'];
        

	$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 

 	$cmd = "SELECT * FROM peoples WHERE user_id='$id_user';"; 


 	 $produtos =  mysqli_query($link, $cmd);
 	 // $produtos = mysql_query($cmd);
 	  
 	 $total = mysqli_num_rows($produtos); 

 	 $registros = 7; 
 	 $numPaginas = ceil($total/$registros);
 	 $inicio = ($registros*$pagina)-$registros;




    $sql= "SELECT * FROM peoples WHERE user_id='$id_user'  order by nome limit $inicio,$registros";
        
    $resultado_id = mysqli_query($link, $sql);
       
    if($resultado_id){									//passando como parametros o MYSQLI_NUM retorna apeas um vez os dados 
															//indexando de forma associativa com o MYSQLI_ASSOC
			$dados_usuario=array () ;
            
            $quant_linha=0;

			while($linha = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){//percorre todod o banco de dados
			// retorna a pesquisa do banco de dados com um array
			//mysqli_fetch_array retorna apenas  a primeira ocorrencia da consulta
			//var_dump($dados_usuario);
			//echo $dados_usuario[3]; MYSQLI_NUM
                $quant_linha++;
				$dados_usuario[] = $linha;
			}
        

         for($i=0; $i<$quant_linha; $i++){
             ?>
			 <tr>
    		<td><?php echo  $dados_usuario[$i]['nome']; ?></td>
    		<td><?php echo  $dados_usuario[$i]['email']; ?></td>
    		<td><?php echo  $dados_usuario[$i]['phone']; ?></td>
       		<td class="text-center">
    			<a href="editar_contato.php?id=<?php echo $dados_usuario[$i]['id'];?>"><button class="btn btn-outline-primary">Editar</button></a>
    			<a href="excluir.php?id=<?php echo $dados_usuario[$i]['id'];?>"<button class="btn btn-outline-danger">Excluir</button></a>
    		</td>
    	</tr>

    	<?php
         }
  	  }
	
    ?>
    </tbody>
	</table>
	</div>