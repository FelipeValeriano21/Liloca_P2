<?php

include '../database/conexao.php';

// get the post records
$txtid = $_POST['idCliente'];
$txtnome = $_POST['nome'];
$txtemail = $_POST['email'];
$txttelefone = $_POST['telefone'];
$txtendereco = $_POST['endereco'];
$txtcpf = $_POST['cpf'];

$sql = "CALL Inserir_cliente ('$txtid', '$txtnome', '$txtemail', '$txttelefone', '$txtendereco', '$txtcpf')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: consulta_cliente.php");

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);

?>