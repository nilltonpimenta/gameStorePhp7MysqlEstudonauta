<?php
    $query = "SELECT usuario, nome, tipo FROM usuarios WHERE usuario='".$_SESSION['user']."'";
    $busca = $banco->query($query);
    $reg = $busca->fetch_object();
?>
<h1>Alterar dados</h1>
<form action="user-edit.php" method="post">
    <table>
        <tr><td>Usuário:</td><td><input type="text" name="usuario" size="10" maxlength="10" readonly value="<?=$reg->usuario?>"></td></tr>
        <tr><td>Nome:</td><td><input type="text" name="nome" size="30" maxlength="30" value="<?=$reg->nome?>"></td></tr>
        <tr><td>Tipo:</td><td><input type="text" readonly  value="<?=$reg->tipo?>"></td></tr>
        <tr><td>Senha:</td><td><input type="password" name="senha1" size="10" maxlength="10"></td></tr>
        <tr><td>Repita a senha:</td><td><input type="password" name="senha2" size="10" maxlength="10"></td></tr>
        <tr><td><input type="submit" value="Salvar alterações"></td></tr>
    </table>
</form>