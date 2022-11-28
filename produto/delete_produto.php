<?php 

include "../database/conexao.php"; 

if (isset($_GET['idProduto'])) {

    $user_id = $_GET['idProduto'];

    $sql = "CALL delete_produto	($user_id)";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("Location: consulta_produto.php");


    } else{

      echo "Nao foi";

    }

}else{

      echo "ta vazio";

} 

?>