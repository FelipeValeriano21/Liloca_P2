<?php 

include "../database/conexao.php";

if (isset($_POST['update'])) {

    $txtid = $_POST['idCliente'];
    $txtnome = $_POST['nome'];
    $txtemail = $_POST['email'];
    $txttelefone = $_POST['telefone'];
    $txtendereco = $_POST['endereco'];
    $txtcpf = $_POST['cpf'];

    $sql = "CALL editar_cliente ('$txtid', '$txtnome', '$txtemail', '$txttelefone', '$txtendereco', '$txtcpf')";

      $result = $conn->query($sql); 

      if ($result == TRUE) {

          echo "Record updated successfully.";
          header("Location: consulta_cliente.php");

      }else{

          echo "Error:" . $sql . "<br>" . $conn->error;

    

      }

  } 

  if (isset($_GET['idCliente'])) {

    $user_id = $_GET['idCliente']; 

    $sql = "SELECT * FROM cliente WHERE idCliente ='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($dados = $result->fetch_assoc()) {

          $idCliente = $dados['idCliente'];
          $nome = $dados['nome']; 
          $email = $dados['email'];
          $telefone = $dados['telefone'];
          $endereco = $dados['endereco'];
          $cpf = $dados['cpf'];

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
        
    
          <form class="row g-3 needs-validation" novalidate method="post" action="editar.php">
            <div class="col-md-2">
              <label for="validationCustom01" class="form-label">ID</label>
              <input name="idCliente" id="idCliente" type="number" class="form-control" id="validationCustom01" value="<?php echo $idCliente; ?>" required>
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
              <label for="validationCustomUsername" class="form-label">E-MAIL</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input name="email" id="email" value = "<?php echo $email; ?>" type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <label for="validationCustom03" class="form-label">TELEFONE</label>
              <input value = "<?php echo $telefone; ?>" name="telefone" id="telefone" type="number" class="form-control" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>

            <div class="col-md-5">
                <label for="validationCustom03" class="form-label">ENDEREÇO</label>
                <input value = "<?php echo $endereco; ?>" name="endereco" id="endereco" type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>

              <div class="col-md-5">
                <label for="validationCustom03" class="form-label">CPF</label>
                <input name="cpf" value = "<?php echo $cpf; ?>" id="cpf" type="number" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
            
              <td>   <input style="width: 200px; background-color: green; color: white" type="submit" value="Update" name="update">  </td>
            
              <a href="consulta.php"> <button style="background-color:#482d00; color: white; width: 200px">Voltar</button></a>
</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body> 
</html>
    <?php

    } else{ 

        header('Location: consulta.php');

    } 

}

?> 