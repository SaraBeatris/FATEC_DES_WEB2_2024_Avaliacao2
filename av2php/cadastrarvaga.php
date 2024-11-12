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
   $cadastro->cadastrarVaga($_POST['nome_empresa'], $_POST['numero_whatsapp'], $_POST['email_contato'], $_POST['descritivo_vaga'], $_POST['curso']);
   $msg = "Cadastro realizado com sucesso! Clique no botão 'Visualizar Vagas' para ver a vaga.";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Vaga</title>
    <link rel="stylesheet" href="css/vagas.css">

        
</head>
<body>
    <div class="form-container">
        <h2>Cadastro de Vaga de Estágio</h2>
        <form method="POST">
            <label>Nome da Empresa:</label>
            <input type="text" name="nome_empresa" required>

            <label>Número Whatsapp:</label>
            <input type="text" name="numero_whatsapp" required>

            <label>E-mail Contato:</label>
            <input type="email" name="email_contato" required>

            <label>Descritivo da Vaga:</label>
            <input type="text" name="descritivo_vaga" required>

            <label>Curso:</label>
            <select name="curso" required>
                <option value="1">DSM</option>
                <option value="2">GE</option>
            </select>

            <button type="submit" class="btn-cadastrar">Cadastrar Vaga</button>
        </form>

        <div class="button-container">
            <form action="listar_vagas.php" method="GET">
                <button type="submit" class="btn-visualizar">Visualizar Vagas</button>
            </form>
        </div>
        <form action="home.php" method="GET">
                <button type="submit" class="btn-home">Voltar</button>
                <?php if ($msg): ?>
            <div class="msg-sucesso"><?php echo $msg; ?></div>
        <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
