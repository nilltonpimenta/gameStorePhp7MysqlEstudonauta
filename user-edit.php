<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de dados</title>
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,700,0,200" />
    <?php
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/funcoes.php";
    ?>
</head>
<body>
    <div id="corpo">
        <?php 
            if (!is_logado()) {
                echo msg_erro("Efetue <a href='user-login.php'>Login</a> para ter acessso a essa página.");
            } else {
                if (!isset($_POST['usuario'])) {
                    require "user-edit-form.php";
                } else {
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    
                    $query = "UPDATE usuarios set nome = '$nome'";
                    
                    if (empty($senha1) || is_null($senha1)) {
                        echo msg_aviso("Senha antiga mantida.");
                    } else {
                        if ($senha1 === $senha2) {
                            $senha = gerarHash($senha1);
                            $query .= ", senha = '$senha' ";
                        } else {
                            echo msg_erro("Senhas não conferem, senha anterior mantida.");
                        }
                    }
                    $query .= " WHERE usuario = '".$_SESSION['user']."'";
                    
                    if ($banco->query($query)) {
                        echo msg_sucesso("Alterado com sucesso!");
                        logout();
                        echo msg_aviso("Por segurança, efetue o <a href='user-login.php'>login</a> novamente.");
                    } else {
                        echo msg_erro("Não foi possível alterar os dados");
                    }
                }
                
            }
            echo voltar();
        ?>
    </div>
    <?php include_once "rodape.php"; ?>
</body>
</html>