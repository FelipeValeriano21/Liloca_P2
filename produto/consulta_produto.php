<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Produtos</title>
  </head>
  <body style = "background-color: #DDBB73" >

 <header>
    <h1>LILOCA FESTAS - Consulta de Produtos</h1>
</header> 

<main class=" col-11 m-auto">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">ESTOQUE</th>
      <th scope="col">TIPO</th>
      <th scope="col">MEDICAO</th>
      <th scope="col">VALOR UNITARIO</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      include '../database/conexao.php';

      $procedure = "CALL consulta_produtos(@p0);";
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $idProduto = $dados['idProduto'];
        $nome = $dados['nome']; 
        $estoque = $dados['estoque'];
        $tipo = $dados['tipo'];
        $medicao = $dados['medida'];
        $valor_unit = $dados['valor_unit'];
        ?>
       <tr>
           
            <td><?php echo $idProduto ?></td>
            <td><?php echo $nome ?></td>
            <td><?php echo $estoque ?></td>
            <td><?php echo $tipo ?></td>
            <td><?php echo $medicao ?></td>
            <td><?php echo $valor_unit ?></td>
            <td>

           <?php echo '<a class="btn btn-danger" href="delete_produto.php?idProduto='.$dados['idProduto'].'">Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a> <a class="btn btn-warning" href="editar_produto.php?idProduto='.$dados['idProduto'].'">Edite <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></a>'; ?>

            </td>

      
          </tr> 
       <?php } ?>
       </tbody>
</table>

<a href="inserir_produto.html"><button style="background-color:#228B22; color: white">Adicionar Produto <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
</svg> </button></a> <a href="../index.html"><button style="background-color:#483D8B; color: white">Voltar ao menu <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></button></a> 




</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>