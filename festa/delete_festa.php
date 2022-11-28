<?php 

include "../database/conexao.php"; 

if (isset($_GET['idFesta'])) {

    $festaid = $_GET['idFesta'];

    $sql = "CALL delete_festa	($festaid)";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
header("Location: consulta_festa.php");


    } else{

      echo "Nao foi";

    }

}else{

      echo "ta vazio";

} 

?>