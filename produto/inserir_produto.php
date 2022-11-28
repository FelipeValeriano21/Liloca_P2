<?php

include '../database/conexao.php';

// get the post records
$txtid = $_POST['idProduto'];
$txtnome = $_POST['nome'];
$txtestoque = $_POST['estoque'];
$txttipo = $_POST['tipo'];
$txtmedicao = $_POST['medicao'];
$txtvalor_unit = $_POST['valor_unit'];

$sql = "CALL Inserir_produto ('$txtid', '$txtnome', '$txtestoque','$txttipo','$txtmedicao','$txtvalor_unit')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}

mysqli_close($conn);

?>