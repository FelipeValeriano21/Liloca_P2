<?php if (isset($_GET['idPedido'])) {

$ped_id = $_GET['idPedido'];

include '../database/conexao.php';

      $procedure = "SELECT * from pedido p INNER JOIN festa f on p.idFesta_fk = f.idFesta INNER JOIN cliente c on c.idCliente = f.idCliente_fk where idPedido = $ped_id ;  ";
      $produtos = "SELECT * from itens_de_pedido i INNER JOIN pedido p on i.pedido_fk = p.idPedido INNER JOIN produto o on o.idProduto = i.produto_fk where idPedido = $ped_id ;  ";
    
      
      $sql = mysqli_query($conn, $procedure) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $idpedido = $dados['idPedido'];
        $nome = $dados['nome'];
        $telefone = $dados['telefone'];
        $data_pedido = $dados['data_pedido']; 
        $email = $dados['email'];
        $data_festa = $dados['data_festa'];
        $tema = $dados['tema'];
        $aniversariante = $dados['aniversariante'];
        $idade = $dados['idade'];
        $cores = $dados['cores'];
        $tipo_entrega = $dados['tipo_entrega'];
        $data_entrega = $dados['data_entrega'];

      }

      $sql = mysqli_query($conn, $produtos) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $pedido_fk  = $dados['pedido_fk'];

      }

}


?>




<!doctype html>
<html lang="en">
  <head>
   

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="../cliente/style.css" rel="stylesheet">
    <title>PEDIDO LILOCA</title>
  </head>
  <body style = "background-color: #DDBB73">


    <div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="liloca.png" alt="" width="350" height="200">
      <h2>FOLHA DE PEDIDO </h2>
      <p class="lead">Em baixo encontra-se as informações do pedido</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        
      

      
      </div>


      <div class="col-md-7 col-lg-10 align-items-center" style=" background-image: linear-gradient(to bottom right, #5F4100, #684700); color: white"; >  <br>
        <h4 class="mb-3 ">DADOS DO PEDIDO ID <?php echo $ped_id ?> </h4>
        <br>

        
        <form class="needs-validation align-items-center" novalidate >
          <div class="row g-3">

          <div class="col-12">
              <label for="username" class="form-label">NOME COMPLETO</label>
              <div class="input-group has-validation">
                
                <input type="text" class="form-control" id="username" placeholder="Username" value = "<?php echo $nome ?>" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">TELEFONE</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $telefone ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">DATA DO PEDIDO</label>
              <input type="date" class="form-control" id="lastName" placeholder="" value="<?php echo $data_pedido ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
            

            <div class="col-12">
              <label for="username" class="form-label">EMAIL</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" value = "<?php echo $email ?>"  required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">DATA DA FESTA</label>
              <input type="date" class="form-control" id="firstName" placeholder="" value="<?php echo $data_festa ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">TEMA</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="<?php echo $tema ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">ANIVERSARIANTE</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $aniversariante ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">IDADE</label>
              <input type="number" class="form-control" id="lastName" placeholder="" value="<?php echo $idade ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
            
            <div class="col-12">
              <label for="username" class="form-label">CORES</label>
              <div class="input-group has-validation">
                
                <input type="text" class="form-control" id="username" placeholder="Username" value = "<?php echo $cores ?>" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <label for="firstName" class="form-label">TIPO DE ENTREGA</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="<?php echo $tipo_entrega ?>" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">PRAZO DE ENTREGA</label>
              <input type="date" class="form-control" id="lastName" placeholder="" value="<?php echo $data_entrega ?>" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <br> 

            <h4>Produtos selecionados</h4>

            <table class="table" style="color: white">
  <thead>
    <tr>
      <th scope="col">QUANTIDADE</th>
      <th scope="col">PRODUTO</th>
      <th scope="col">VALOR UNITARIO</th>
      <th scope="col">VALOR</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php 
      include '../database/conexao.php';

      $produtos = "SELECT * from itens_de_pedido i INNER JOIN pedido p on i.pedido_fk = p.idPedido INNER JOIN produto o on o.idProduto = i.produto_fk where idPedido = $ped_id ;  ";

    
      
      $sql = mysqli_query($conn, $produtos) or die( 
        mysqli_error($conn) //caso haja um erro na consulta 
      );

      while ($dados = mysqli_fetch_assoc($sql)){
        $idpedido = $dados['idPedido'];
        $idfesta = $dados['idFesta_fk']; 
        $idnome = $dados['nome'];
        $valor_unit = $dados['valor_unit'];
        $valor = $dados['valor'];
     
        ?>
           
            <td><?php echo $idpedido ?></td>
            <td><?php echo $idnome?></td>
            <td><?php echo $valor_unit ?></td>
            <td><?php echo $valor ?></td>
        

      
          </tr> 
       <?php } ?>
    </tr>
  </tbody>
</table>
            

        
        </form><br><br><br><br><br>
      </div>
    </div>
  </main>


</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
  </body>
</html>