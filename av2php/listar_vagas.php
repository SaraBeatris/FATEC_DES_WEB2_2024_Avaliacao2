<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

require_once 'Cadastro.php';
$cadastro = new Cadastro();
$vagas = $cadastro->listarVagas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Vagas</title>
    <link rel="stylesheet" href="css/lista.css">
</head>
<body>
    <div class="form-container">
        <h2>Vagas de Estágio</h2>

        <?php if (empty($vagas)): ?>
            <p>Não há vagas cadastradas no momento.</p>
        <?php else: ?>
            <div class="vagas-lista">
                <?php foreach ($vagas as $vaga): ?>
                    <div class="vaga-item">
                        <p><strong>ID:</strong> <?php echo $vaga['id']; ?></p>
                        <p><strong>Empresa:</strong> <?php echo $vaga['nome_empresa']; ?></p>
                        <p><strong>WhatsApp:</strong> <?php echo $vaga['numero_whatsapp']; ?></p>
                        <p><strong>E-mail:</strong> <?php echo $vaga['email_contato']; ?></p>
                        <p><strong>Descrição:</strong> <?php echo $vaga['descritivo_vaga']; ?></p>
                        <p><strong>Curso:</strong> <?php echo $vaga['curso'] == 1 ? 'DSM' : 'GE'; ?></p>
                        <form action="removervaga.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $vaga['id']; ?>">
                            <button type="submit" class="btn-remover">Remover Vaga</button>
                        </form>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="button-container">
            <form action="home.php" method="GET">
                <button type="submit" class="btn-home">Voltar</button>
            </form>
        </div>
    </div>
</body>
</html>
