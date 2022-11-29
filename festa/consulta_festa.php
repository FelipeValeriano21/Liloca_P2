<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Liloca - Consulta FESTA</title>
  </head>
  <body style = "background-color: #DDBB73" >

 <header>
    <h1>Consulta de FESTAS - LILOCA</h1>
</header> 

<main class=" col-11 m-auto">

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ID CLIENTE</th>
      <th scope="col">ANIVERSARIANTE</th>
      <th scope="col">IDADE</th>
      <th scope="col">Endereco</th>
      <th scope="col">TEMA</th>
      <th scope="col">DATA DA FESTA</th>
      <th scope="col">CORES</th>
    
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      include '../database/conexao.php';

      $procedure = "CALL consulta_festas(@p0);";
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $txtidFesta = $dados['idFesta'];
        $txtCliente_idCliente= $dados['idCliente_fk'];
        $aniversariante= $dados['aniversariante'];
        $txtidade = $dados['idade'];
        $txtendereco = $dados['endereco'];
        $txttema = $dados['tema'];
        $txtdata_festa = $dados['data_festa'];
        $txtcores = $dados['cores'];
        ?>
       <tr>
           
            <td><?php echo $txtidFesta ?></td>
            <td><?php echo $txtCliente_idCliente ?></td>
            <td><?php echo $aniversariante ?></td>
            <td><?php echo $txtidade ?></td>
            <td><?php echo $txtendereco ?></td>
            <td><?php echo $txttema ?></td>
            <td><?php echo $txtdata_festa ?></td>
            <td><?php echo $txtcores ?></td>
            <td>

           <?php echo '<a class="btn btn-danger" href="delete_festa.php?idFesta='.$dados['idFesta'].'">Delete <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg></a> <a class="btn btn-warning" href="editar_festa.php?idFesta='.$dados['idFesta'].'">Edite <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
</svg></a>'; ?>

            </td>

      
          </tr> 
       <?php } ?>
       </tbody>
</table>

<a href="inserir_festa.html"><button style="background-color:#228B22; color: white">Adicionar Festa <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-balloon-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8.48 10.901C11.211 10.227 13 7.837 13 5A5 5 0 0 0 3 5c0 2.837 1.789 5.227 4.52 5.901l-.244.487a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.244-.487ZM4.352 3.356a4.004 4.004 0 0 1 3.15-2.325C7.774.997 8 1.224 8 1.5c0 .276-.226.496-.498.542-.95.162-1.749.78-2.173 1.617a.595.595 0 0 1-.52.341c-.346 0-.599-.329-.457-.644Z"/>
</svg> </button></a> <a href="../index.html"><button style="background-color:#483D8B; color: white">Voltar ao menu <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></button></a>  



</main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  </body>
</html>