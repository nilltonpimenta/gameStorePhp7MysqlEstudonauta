<?php    
    echo "<header><p class='pequeno'>";

    if (empty($_SESSION['user'])) {
        echo "<a href='user-login.php'>Entrar</a>";
    } else {
        echo "Olá, <strong>".$_SESSION['nome']."</strong>. | ";
        echo "Sair";
    }

    echo "</p></header>";
?>