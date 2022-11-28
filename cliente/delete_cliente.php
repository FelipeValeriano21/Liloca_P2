<?php 

include "../database/conexao.php"; 

if (isset($_GET['idCliente'])) {

    $user_id = $_GET['idCliente'];

    $sql = "CALL delete_cliente	($user_id)";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("Location: consulta_cliente.php");


    } else{

      echo "Nao foi";

    }

}else{

      echo "ta vazio";

} 

?>