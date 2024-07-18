<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuário</title>
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,700,0,200" />
    <style>
        div#corpo{
            width: 270px;
            font-size: 13pt;
        }
        td {
            padding: 6px;
        }
    </style>
    <?php
        require_once "includes/banco.php";
        require_once "includes/login.php";
        require_once "includes/funcoes.php";
    ?>
</head>
<body>
    <div id="corpo">
        <?php 
            $usuario = $_POST['usuario'] ?? null;
            $senha = $_POST['senha'] ?? null;

            if (is_null($usuario) || is_null($senha)) {
                require "user-login-form.php";
            } else {
                $query = "SELECT usuario, nome, senha, tipo FROM usuarios where usuario = '$usuario' LIMIT 1";
                $busca = $banco->query($query);
                if (!$busca) {
                    echo msg_erro("Falha ao acessar o banco!");
                } elseif ($busca->num_rows > 0) {
                    $reg = $busca->fetch_object();
                    if (testarHash($senha, $reg->senha)) {
                        echo msg_sucesso("Logado com sucesso");
                        $_SESSION['user'] = $reg->usuario;
                        $_SESSION['nome'] = $reg->nome;
                        $_SESSION['tipo'] = $reg->tipo;
                    } else {
                        echo msg_erro("Senha inválida");
                    }
                    
                } else {
                    echo msg_erro("Usuário não existe");
                }
                
            }
            
            echo voltar();
        ?>
    </div>
</body>
</html>