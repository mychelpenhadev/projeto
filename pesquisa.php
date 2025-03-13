<?php
include "conexao.php";
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <title>Pesquisar</title>
</head>

<body>
  <?php include 'navbar.php'; ?>

  <?php
  if (isset($_POST['busca'])) {
    $pesquisa = $_POST['busca'];
  } else {
    $pesquisa = '';
  }

  $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

  $dados = mysqli_query($conn, $sql);

  ?>



  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card"
          <div class="card-header">
          <h1>Pesquisa</h1>
          <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
              <form class="d-flex" role="search" action="pesquisa.php" method="POST">
                <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
              </form>
            </div>
          </nav>

          <table class="table table-hover">
            <thead>
              <tr>
                <th sscope="col">Nome</th>
                <th sscope="col">Endereço</th>
                <th sscope="col">Telefone</th>
                <th sscope="col">Email</th>
                <th sscope="col">Data de Nascimento</th>
                <th sscope="col">Funções</th>
              </tr>
            </thead>
            <tbody>

              <?php

              while ($linha = mysqli_fetch_assoc($dados)) {
                $cod_pessoa = $linha['cod_pessoa'];
                $nome = $linha['nome'];
                $endereco = $linha['endereco'];
                $telefone = $linha['telefone'];
                $email = $linha['email'];
                $data_nascimento = $linha['data_nascimento'];
                $data_nascimento = mostra_data($data_nascimento);


                echo "<tr>
          <td scope='row'>$nome</td>
          <td>$endereco</td>
          <td>$telefone</td>
          <td>$email</td>
          <td>$data_nascimento</td>
          <td width=150px>
              <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
              <a href='#' type='button' class='btn btn-danger btn-sm'  data-bs-toggle='modal' data-bs-target='#confirma'
              onclick=" . '"' . "pegar_dados($cod_pessoa, '$nome')" . '"' . ">Excluir</a> 
              </td>

        </tr>";
              }

              ?>


            </tbody>
          </table>

          <a href="index.php" class="btn btn-primary mt-3">Voltar para o Inicio</a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="modal fade" id="confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirmação de exclusão</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Deseja realmente excluir <b id="nome_pessoa"> Nome da pessoa</b>?</p>
        </div>
        <div class="modal-footer">
          <form method="GET" action="excluir_script.php">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
            <input type="hidden" name="id" id="cod_pessoa" value="">
            <input type="hidden" name="nome" id="nome_pessoa_1" value="">
            <input type="submit" class="btn btn-danger" value="Sim">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function pegar_dados(id, nome) {
      document.getElementById('nome_pessoa').innerHTML = nome;
      document.getElementById('nome_pessoa_1').value = nome;
      document.getElementById('cod_pessoa').value = id;
    }
  </script>


  <!-- jQuery first, then Popper.js, then Bootstrap 35-->
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
    crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>