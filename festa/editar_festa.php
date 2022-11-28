<?php 

include "../database/conexao.php";

if (isset($_POST['update'])) {

  $txtidFesta = $_POST['idFesta'];
$txtCliente_idCliente = $_POST['Cliente_idCliente'];
$txtaniversariante= $_POST['aniversariante'];
$txtidade = $_POST['idade'];
$txtendereco = $_POST['endereco'];
$txttema = $_POST['tema'];
$txtcores = $_POST['cores'];
$txtdata_festa = $_POST['data_festa'];

    $sql = "CALL editar_festa ('$txtidFesta', '$txtCliente_idCliente', '$txtaniversariante', '$txtidade', '$txtendereco', '$txttema','$txtcores','$txtdata_festa')";

      $result = $conn->query($sql); 

      if ($result == TRUE) {

          echo "Record updated successfully.";
         header("Location: consulta_festa.php");

      }else{

          echo "Error:" . $sql . "<br>" . $conn->error;

    

      }

  } 

  if (isset($_GET['idFesta'])) {

    $user_id = $_GET['idFesta']; 

    $sql = "SELECT * FROM festa WHERE idFesta ='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($dados = $result->fetch_assoc()) {

          $txtidFesta = $dados['idFesta'];
        $txtCliente_idCliente = $dados['idCliente_fk'];
        $txtaniversariante= $dados['aniversariante'];
        $txtidade = $dados['idade'];
        $txtendereco = $dados['endereco'];
        $txttema = $dados['tema'];
        $txtcores = $dados['cores'];
        $txtdata_festa = $dados['data_festa'];

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

        <h6 class="text-center" style="font-family:cursive">INFORME OS DADOS ABAIXO:        </h6>
        
    
         
        <form class="row g-3 needs-validation" novalidate method="post" action="editar_festa.php">
            <div class="col-md-2">
              <label for="validationCustom01" class="form-label">ID</label>
              <input name="idFesta" id="idFesta" type="number" class="form-control" id="validationCustom01" value="<?php echo $txtidFesta; ?>" required>
              <div class="valid-feedback">
              </div>
            </div>

            <div class="col-md-5">
                <label for="validationCustom01" class="form-label">ID Cliente</label>
                <input name="Cliente_idCliente" id="Cliente_idCliente" type="number" class="form-control" id="validationCustom01" value="<?php echo $txtCliente_idCliente; ?>" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
        
        
            <div class="col-md-5">
              <label for="validationCustom03" class="form-label">Nome</label>
              <input name="aniversariante" id="aniversariante" type="text" class="form-control" id="validationCustom03" value = "<?php echo $txtaniversariante; ?>" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="col-md-5">
                <label for="validationCustom03" class="form-label">idade</label>
                <input name="idade" id="idade" type="number" class="form-control" id="validationCustom03"  value = <?php echo $txtidade; ?> required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              <div class="col-md-5">
                <label for="validationCustom03" class="form-label">endereco</label>
                <input name="endereco" id="endereco" type="text" class="form-control" id="validationCustom03" value = <?php echo $txtendereco; ?> required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              
              <div class="col-md-5">
                <label for="validationCustom03" class="form-label">tema</label>
                <input name="tema" id="tema" type="text" class="form-control" id="validationCustom03" value = <?php echo $txttema; ?> required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              
              <div class="col-md-5">
                <label for="validationCustom03" class="form-label">cores</label>
                <input name="cores" id="cores" type="text" class="form-control" id="validationCustom03" value = <?php echo $txtcores; ?> required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              
              <div class="col-md-5">
                <label for="validationCustom03" class="form-label">data da festa</label>
                <input name="data_festa" id="data_festa" type="date" class="form-control" id="validationCustom03"  value = <?php echo $txtdata_festa; ?> required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
            
              <td> <input style="width: 200px; background-color: green; color: white" type="submit" value="Update" name="update">  </td>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body> 
</html>
    <?php

    } else{ 

        header('Location: consulta_festa.php');

    } 

}

?> 