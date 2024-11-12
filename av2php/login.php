<?php
session_start();

$msg_erro = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $login = $_POST['login'];
   $senha = $_POST['senha'];
   
   
   if ($login === 'estagio' && $senha === 'estagio') {
       $_SESSION['login'] = true;
       header('Location: home.php');
       exit();
   } else {
       
       $msg_erro = "Login ou senha incorretos.";
   }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css"> 
</head>
<body>
    <div class="login-container">
        <h2>Faça o login para informações e atualizações de vagas</h2> 

        

        <div class="login-form">
            <form method="POST">
                <label for="login">Login:</label>
                <input type="text" name="login" id="login" required>
                
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>
                
                <button type="submit">Entrar</button>
                <?php if ($msg_erro): ?>
            <div class="error-message">
                <p><?php echo $msg_erro; ?></p>
            </div>
        <?php endif; ?>
            </form>
        </div>
    </div>
</body>
</html>
