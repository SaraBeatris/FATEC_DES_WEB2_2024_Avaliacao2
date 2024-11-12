<?php
session_start();
if (!isset($_SESSION['login'])) {
   header('Location: login.php');
   exit();
}

$msg = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   require_once 'Cadastro.php';
   $cadastro = new Cadastro();
   $cadastro->removerVaga($_POST['id']);
   $msg = "Vaga removida com sucesso!, clique em visualizar vagas para conferir.";
}
?>
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Vaga</title>
    <link rel="stylesheet" href="css/remover.css">
</head>
<body>
    <div class="form-container">
        <h2>Remover Vaga</h2>

        <form method="POST">
            <label for="id">ID da Vaga:</label>
            <input type="number" name="id" id="id" required>

            <button type="submit" class="btn-remover">Remover Vaga</button>
        </form>

    
        <form action="listar_vagas.php" method="GET">
            <button type="submit" class="btn-visualizar">Visualizar Vaga</button>
        </form>
        <form action="home.php" method="GET">
                <button type="submit" class="">Voltar</button>
                <?php if ($msg): ?>
            <div class="msg-sucesso"><?php echo $msg; ?></div>
        <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
