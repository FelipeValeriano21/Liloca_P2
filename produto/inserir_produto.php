<?php

include '../database/conexao.php';

// get the post records
$txtid = $_POST['idProduto'];
$txtnome = $_POST['nome'];
$txtvalor_unit = $_POST['valor_unit'];
$txtquantidade = $_POST['quantidade'];
$txtmedicao = $_POST['medicao'];

$sql = "CALL Inserir_produto ('$txtid', '$txtnome', '$txtvalor_unit', '$txtquantidade', '$txtmedicao')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);

?>