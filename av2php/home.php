<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Controle de Vagas de Estágio</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container">
        <h1>Sistema de Controle de Vagas de Estágio</h1>
        <a href="cadastrarvaga.php">Cadastrar Vaga</a>
        <a href="removervaga.php">Remover Vaga</a>
        <a href="listar_vagas.php">Visualizar Vagas</a>
        <a href="sair.php" class="logout">Logout</a>
    </div>
</body>
</html>
