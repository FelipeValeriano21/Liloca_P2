
      
    <!doctype html>
    <html lang="en">
      <head>
       
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <link href="../cliente/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
        <title>Pedidos</title>
      </head>
      <body style = "background-color: #DDBB73" >
    
     <header>
        <h1>LILOCA FESTAS - Consulta de Pedidos</h1>
    </header> 
    
    <main class=" col-11 m-auto">
    
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID PEDIDO</th>
          <th scope="col">ID_FESTA</th>
          <th scope="col">NOME DO CLIENTE</th>
          <th scope="col">DATA_DE _ENTREGA</th>
          <th scope="col">Ações</th>
        </tr>
      </thead>
      <tbody>
    
           <tr>
    
           
    <?php 
          include '../database/conexao.php';
    
          $procedure = "SELECT * from pedido p INNER JOIN festa f on p.idFesta_fk = f.idFesta INNER JOIN cliente c on c.idCliente = f.idCliente_fk ";
    
        
          
          $sql = mysqli_query($conn, $procedure) or die( 
            mysqli_error($conn) //caso haja um erro na consulta 
          );
    
          while ($dados = mysqli_fetch_assoc($sql)){
            $idpedido = $dados['idPedido'];
            $idfesta = $dados['idFesta_fk']; 
            $idnome = $dados['nome'];
            $data_entrega = $dados['data_entrega'];
         
            ?>
               
                <td><?php echo $idpedido ?></td>
                <td><?php echo $idfesta ?></td>
                <td><?php echo $idnome ?></td>
                <td><?php echo $data_entrega ?></td>
                <td>
    
               <?php echo '<a class="btn btn-info" href="pedido.php?idPedido='.$dados['idPedido'].'">vizualizar folha <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf-fill" viewBox="0 0 16 16">
  <path d="M5.523 10.424c.14-.082.293-.162.459-.238a7.878 7.878 0 0 1-.45.606c-.28.337-.498.516-.635.572a.266.266 0 0 1-.035.012.282.282 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548zm2.455-1.647c-.119.025-.237.05-.356.078a21.035 21.035 0 0 0 .5-1.05 11.96 11.96 0 0 0 .51.858c-.217.032-.436.07-.654.114zm2.525.939a3.888 3.888 0 0 1-.435-.41c.228.005.434.022.612.054.317.057.466.147.518.209a.095.095 0 0 1 .026.064.436.436 0 0 1-.06.2.307.307 0 0 1-.094.124.107.107 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256zM8.278 4.97c-.04.244-.108.524-.2.829a4.86 4.86 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.517.517 0 0 1 .145-.04c.013.03.028.092.032.198.005.122-.007.277-.038.465z"/>
  <path fill-rule="evenodd" d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2zm.165 11.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.64 11.64 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.856.856 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.844.844 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.76 5.76 0 0 0-1.335-.05 10.954 10.954 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.238 1.238 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a19.707 19.707 0 0 1-1.062 2.227 7.662 7.662 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103z"/>
</svg></a> ' ; ?>
    
                </td>
    
          
              </tr> 
           <?php } ?>
           </tbody>
    </table>
    
    
    
    <a href="../index.html"><button style="background-color:#483D8B; color: white">Voltar ao menu <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
  <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg></button></a> 

    
    </main>
    
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    
      </body>
    </html>