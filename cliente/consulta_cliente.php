<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liloca - Consulta Cliente</title>
  </head>
  <body style = "background-color: #DDBB73" >

 <header>
    <h1>Consulta de Clientes - LILOCA</h1>
</header> 

<main class=" col-11 m-auto">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereco</th>
      <th scope="col">CPF</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      include '../database/conexao.php';

      $procedure = "CALL consulta_clientes(@p0);";
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $idCliente = $dados['idCliente'];
        $nome = $dados['nome']; 
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $endereco = $dados['endereco'];
        $cpf = $dados['cpf'];
        ?>
       <tr>
           
            <td><?php echo $idCliente ?></td>
            <td><?php echo $nome ?></td>
            <td><?php echo $email ?></td>
            <td><?php echo $telefone ?></td>
            <td><?php echo $endereco ?></td>
            <td><?php echo $cpf ?></td>
            <td>

           <?php echo '<a class="btn btn-danger" href="delete_cliente.php?idCliente='.$dados['idCliente'].'">Delete</a> <a class="btn btn-warning" href="editar.php?idCliente='.$dados['idCliente'].'">Edite</a>'; ?>

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