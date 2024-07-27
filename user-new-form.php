<h1>Novo usuário</h1>
<form action="user-new.php" method="post">
    <table>
        <tr><td>Usuário:</td><td><input type="text" name="usuario" size="10" maxlength="10"></td></tr>
        <tr><td>Nome:</td><td><input type="text" name="nome" size="30" maxlength="30"></td></tr>
        <tr><td>Tipo:</td><td><select name="tipo">
            <option value="admin">Administrador</option>
            <option value="editor" selected>Editor</option>
        </select></td></tr>
        <tr><td>Senha:</td><td><input type="password" name="senha1" size="10" maxlength="10"></td></tr>
        <tr><td>Repita a senha:</td><td><input type="password" name="senha2" size="10" maxlength="10"></td></tr>
        <tr><td><input type="submit" value="Cadastrar usuário"></td></tr>
    </table>
</form>