<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit-no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alterações de Cadastro</title>
</head>

<body>

    <?php

    include "conexao.php";

    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";

    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);

    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>cadastro</h1>
                <form action="edit_script.php" method="POST">
                    <div class="form-group">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" name="nome" required value="<?php echo $linha['nome']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="<?php echo $linha['endereco']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $linha['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="dt_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="data_nascimento" value="<?php echo $linha['data_nascimento']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success mt-3" value="Salvar Alterações">
                        <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa'] ?>">
                    </div>
                </form>
                <a href="index.php" class="btn btn-primary mt-3">Voltar para o Inicio</a>
            </div>
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