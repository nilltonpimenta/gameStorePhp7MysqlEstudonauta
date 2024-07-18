<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do jogo</title>
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,700,0,200" />
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
    <div id="corpo">
        <?php
            include_once "topo.php";
            $c = $_GET['cod'] ?? 0; // Null coalescing, , if "cod" exists it assigns it to $c if it is not 0
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
                if(!$busca){
                    echo "<tr><td>Busca falhou! $banco->error";
                } elseif ($busca->num_rows == 1) {
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                        echo "<td><h2>$reg->nome</h2>";
                        echo "Nota: ". number_format($reg->nota, 1) ."/10 ";
                        echo "<tr><td>$reg->descricao";
                        echo "<tr><td>Adm";
                } else {
                    echo "<tr><td>Nenhum registro encontrado";
                }
            ?>
        </table>
        <?=voltar()?>
    </div>
</body>
</html>