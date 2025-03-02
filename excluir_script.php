<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Exclusão de Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <?php
      include "conexao.php";
      $id = $_POST['id'];
      $nome = $_POST['nome'];

      $sql = "DELETE FROM `pessoas` WHERE cod_pessoa = $id";
      if (mysqli_query($conn, $sql)) {
        mensagem("$nome excluído com sucesso!", 'success');
      } else {
        mensagem("Erro ao excluir $nome!", 'danger');
      }
      ?>
      <hr>
      <a href="index.php" class="btn btn-primary">Voltar</a>
    </div>
  </div>



  <!-- jQuery first, then Popper.js, then Bootstrap 35-->
  <script
    src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>