<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Jogos</title>
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,700,0,200" />
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        $ordem = $_GET['o'] ?? "n";
        $chave = $_GET['c'] ?? "";

    ?>
    <div id="corpo">
        <?php include_once "topo.php"; ?>
        <h1>Escolha seu jogo</h1>
        <?php echo msg_sucesso("Sucesso");
        echo msg_aviso("Aviso");
        echo msg_erro("Erro") ?>
        <form method="get" action="index.php">
            <p class="pequeno">Ordenar:
            <a href="index.php?o=n&c=<?=$chave?>">Nome</a> | 
			<a href="index.php?o=p&c=<?=$chave?>">Produtora</a> | 
			<a href="index.php?o=nA&c=<?=$chave?>">Nota alta</a> | 
			<a href="index.php?o=nB&c=<?=$chave?>">Nota baixa</a> | 
            <a href="index.php">Mostrar todos</a> | 
            Buscar: <input type="text" name="c" size="10" maxlength="40"/>
            <input type="submit" value="OK"/></p>
        </form>
        <table class="listagem">
            <?php 
                $q = "SELECT j.cod, j.nome, g.genero, j.capa, p.produtora FROM jogos j JOIN generos g ON j.genero = g.cod JOIN produtoras p ON j.produtora = p.cod ";
                
                if (!empty($chave)) {
                    $q .= " WHERE j.nome like '%$chave%' OR p.produtora like '%$chave%' OR g.genero like '%$chave%' ";
                }

                switch($ordem){
				case "p":
					$q .= " ORDER BY p.produtora ";
				    break;

				case "nA":
					$q .= " ORDER BY j.nota desc ";
				    break;

				case "nB":
					$q .= " ORDER BY j.nota asc ";
					break;

				case "g":
					$q .= " ORDER BY g.genero ";
					break;

				default:
					$q .= " ORDER BY j.nome ";
				}

                $busca = $banco->query($q);
                if (!$busca) {
                    echo "<tr><td>Infelizmente a busca deu errada.";
                } elseif ($busca->num_rows === 0) {
                    echo "<tr><td>Nenhum registro encontrado.";
                } else {
                    while ($reg=$busca->fetch_object()) {
                        $caminho = thumb($reg->capa);
                        echo "<tr><td><img src='$caminho' class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo "[$reg->genero]";
                        echo "<br/>$reg->produtora";
                        echo "<td>Adm";
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php"; ?>
</body>
</html>