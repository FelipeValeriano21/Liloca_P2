
<?php

include '../database/conexao.php';

// get the post records
$txtid = $_POST['idCliente'];
$txtnome = $_POST['nome'];
$txtemail = $_POST['email'];
$txttelefone = $_POST['telefone'];
$txtendereco = $_POST['endereco'];

$sql = "INSERT INTO cliente (idCliente, nome, email, telefone, endereco) VALUES ('$txtid', '$txtnome', '$txtemail', '$txttelefone', '$txtendereco');";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);

?>