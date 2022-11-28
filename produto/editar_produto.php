<?php 

include "../database/conexao.php";

if (isset($_POST['update'])) {

  $txtid = $_POST['idProduto'];
  $txtnome = $_POST['nome'];
  $txtestoque = $_POST['estoque'];
  $txttipo = $_POST['tipo'];
  $txtmedicao = $_POST['medicao'];
  $txtvalor_unit = $_POST['valor_unit'];

    $sql = "CALL editar_produto ('$txtid', '$txtnome', '$txtestoque', '$txttipo', '$txtmedicao', '$txtvalor_unit')";

      $result = $conn->query($sql); 

      if ($result == TRUE) {

          echo "Record updated successfully.";
          header("Location: consulta_produto.php");

      }else{

          echo "Error:" . $sql . "<br>" . $conn->error;

    

      }

  } 

  if (isset($_GET['idProduto'])) {

    $prod_id = $_GET['idProduto']; 

    $sql = "SELECT * FROM produto WHERE idProduto ='$prod_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($dados = $result->fetch_assoc()) {
          $idProduto = $dados['idProduto'];
          $nome = $dados['nome']; 
          $estoque = $dados['estoque'];
          $tipo = $dados['tipo'];
          $medicao = $dados['medida'];
          $valor_unit = $dados['valor_unit'];

        } 

        


    ?>

<!doctype html>
<html lang="en">

  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liloca - Editar Cliente</title>
  </head>
  <body style = "background-color: #DDBB73">

<header>
    <h1>Editar Cliente - LILOCA</h1>
</header> 


<br>

<main align = "center" class=" col-9 m-auto">


    <div class =  "col-11 m-auto" style = "color:rgb(0, 0, 0)">

        <h6 class="text-center" style="font-family:cursive">INFORME OS DADOS DO PRODUTO:        </h6>
      
    
        <form class="row g-3 needs-validation" novalidate method="post" action="editar_produto.php">
            <div class="col-md-2">
              <label for="validationCustom01" class="form-label">ID</label>
              <input name="idProduto" id="idProduto" type="number" class="form-control" id="validationCustom01" value="<?php echo $idProduto; ?>" required>
              <div class="valid-feedback">
              </div>
            </div>

            <div class="col-md-5">
                <label for="validationCustom01" class="form-label">NOME</label>
                <input name="nome" id="nome" type="text" class="form-control" id="validationCustom01" value="<?php echo $nome; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
        
           
            <div class="col-md-5">
              <label for="validationCustom03" class="form-label">	estoque</label>
              <input name="estoque" id="estoque" type="number" class="form-control" id="validationCustom03" value = "<?php echo $estoque; ?>" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="col-md-5">
              <label for="validationCustom03" class="form-label">	Tipo</label>
              <input name="tipo" id="tipo" type="text" class="form-control" id="validationCustom03" value = "<?php echo $tipo; ?>"  required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="col-md-5">
                <label for="validationCustom03" class="form-label">medicao</label>
                <input name="medicao" id="medicao" type="text" class="form-control" id="validationCustom03" value = "<?php echo $medicao; ?>" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

                 <div class="col-md-5">
                <label for="validationCustom01" class="form-label">Valor unitario</label>
                <input name="valor_unit" id="valor_unit" type="text" class="form-control" id="validationCustom01" value="<?php echo $valor_unit; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

    
            
              <td> <input style="width: 200px; background-color: green; color: white" type="submit" value="Update" name="update">  </td>
            
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body> 
</html>
    <?php

    } else{ 

        header('Location: consulta_produto.php');

    } 

}

?> 