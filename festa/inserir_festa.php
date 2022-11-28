<?php

include '../database/conexao.php';

// get the post records
$txtidFesta = $_POST['idFesta'];
$txtCliente_idCliente = $_POST['Cliente_idCliente'];
$txtnome= $_POST['nome'];
$txtidade = $_POST['idade'];
$txtendereco = $_POST['endereco'];
$txttema = $_POST['tema'];
$txtcores = $_POST['cores'];
$txtdata_festa = $_POST['data_festa'];

$sql = "CALL Inserir_festa ('$txtidFesta', '$txtCliente_idCliente', '$txtnome', '$txtidade', '$txtendereco', '$txttema','$txtcores','$txtdata_festa')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
      header("Location: consulta_festa.php");

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);

?>