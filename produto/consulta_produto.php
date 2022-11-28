<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liloca - Consulta PRODUTO</title>
  </head>
  <body style = "background-color: #DDBB73" >

 <header>
    <h1>Consulta de produtos - LILOCA</h1>
</header> 

<main class=" col-11 m-auto">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">VALOR UNITARIO</th>
      <th scope="col">QUANTIDADE</th>
      <th scope="col">MEDICAO</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      include '../database/conexao.php';

      $procedure = "CALL consulta_produtos(@p0);";
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $idProduto = $dados['idProduto'];
        $nome = $dados['nome']; 
        $valor_unit = $dados['valor_unit'];
        $quantidade = $dados['quantidade'];
        $medicao = $dados['medicao'];
        ?>
       <tr>
           
            <td><?php echo $idProduto ?></td>
            <td><?php echo $nome ?></td>
            <td><?php echo $valor_unit ?></td>
            <td><?php echo $quantidade ?></td>
            <td><?php echo $medicao ?></td>
            <td>

           <?php echo '<a class="btn btn-danger" href="delete_produto.php?idProduto='.$dados['idProduto'].'">Delete</a> <a class="btn btn-warning" href="editar_produto.php?idProduto='.$dados['idProduto'].'">Edite</a>'; ?>

            </td>

      
          </tr> 
       <?php } ?>
       </tbody>
</table>

<a href="inserir_cliente.html"><button style="background-color:#228B22; color: white">Adicionar Cliente</button></a> 



</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>