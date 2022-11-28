<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liloca - Consulta FESTA</title>
  </head>
  <body style = "background-color: #DDBB73" >

 <header>
    <h1>Consulta de FESTAS - LILOCA</h1>
</header> 

<main class=" col-11 m-auto">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ID CLIENTE</th>
      <th scope="col">ANIVERSARIANTE</th>
      <th scope="col">IDADE</th>
      <th scope="col">Endereco</th>
      <th scope="col">TEMA</th>
      <th scope="col">DATA DA FESTA</th>
      <th scope="col">CORES</th>
    
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      include '../database/conexao.php';

      $procedure = "CALL consulta_festas(@p0);";
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $txtidFesta = $dados['idFesta'];
        $txtCliente_idCliente= $dados['idCliente_fk'];
        $aniversariante= $dados['aniversariante'];
        $txtidade = $dados['idade'];
        $txtendereco = $dados['endereco'];
        $txttema = $dados['tema'];
        $txtdata_festa = $dados['data_festa'];
        $txtcores = $dados['cores'];
        ?>
       <tr>
           
            <td><?php echo $txtidFesta ?></td>
            <td><?php echo $txtCliente_idCliente ?></td>
            <td><?php echo $aniversariante ?></td>
            <td><?php echo $txtidade ?></td>
            <td><?php echo $txtendereco ?></td>
            <td><?php echo $txttema ?></td>
            <td><?php echo $txtdata_festa ?></td>
            <td><?php echo $txtcores ?></td>
            <td>

           <?php echo '<a class="btn btn-danger" href="delete_festa.php?idFesta='.$dados['idFesta'].'">Delete</a> <a class="btn btn-warning" href="editar_festa.php?idFesta='.$dados['idFesta'].'">Edite</a>'; ?>

            </td>

      
          </tr> 
       <?php } ?>
       </tbody>
</table>

<a href="inserir_festa.html"><button style="background-color:#228B22; color: white">Adicionar Cliente</button></a> 



</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>