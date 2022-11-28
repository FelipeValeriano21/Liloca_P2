<?php if (isset($_GET['idCliente'])) {

$user_id = $_GET['idCliente'];
} 

?>
  
<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../cliente/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liloca - Consulta Cliente</title>
  </head>
  <body style = "background-color: #DDBB73" >

 <header>
    <h1>Consulta de Clientes do id <?php echo $user_id ?> </h1>
</header> 

<main class=" col-11 m-auto">


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID PEDIDO</th>
      <th scope="col">ID_FESTA</th>
      <th scope="col">NOME DO CLIENTE</th>
      <th scope="col">DATA_DE _ENTREGA</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>

       <tr>

       
<?php 
      include '../database/conexao.php';

      $procedure = "SELECT * from pedido p INNER JOIN festa f on p.idFesta_fk = f.idFesta INNER JOIN cliente c on c.idCliente = f.idCliente_fk where idCLiente = $user_id ;  ";

    
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $idpedido = $dados['idPedido'];
        $idfesta = $dados['idFesta_fk']; 
        $idnome = $dados['nome'];
        $data_entrega = $dados['data_entrega'];
     
        ?>
           
            <td><?php echo $idpedido ?></td>
            <td><?php echo $idfesta ?></td>
            <td><?php echo $idnome ?></td>
            <td><?php echo $data_entrega ?></td>
            <td>

           <?php echo '<a class="btn btn-info" href="pedido.php?idPedido='.$dados['idPedido'].'">vizualizar folha</a> ' ; ?>

            </td>

      
          </tr> 
       <?php } ?>
       </tbody>
</table>





</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>