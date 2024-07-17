<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Jogos</title>
    <link rel="stylesheet" href="estilos/estilo.css">
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        $ordem = $_GET['o'] ?? 'n';
    ?>
    <div id="corpo">
        <?php include_once "topo.php"; ?>
        <h1>Escolha seu jogo</h1>
        <form method="get" id="busca" action="index.php">
            Ordenar:
            <a href="index.php?o=n">Nome</a> | 
			<a href="index.php?o=p">Produtora</a> | 
			<a href="index.php?o=nA">Nota alta</a> | 
			<a href="index.php?o=nB">Nota baixa</a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40"/> <input type="submit" value="OK"/>
        </form>
        <table class="listagem">
            <?php 
                $q = "select j.cod, j.nome, g.genero, j.capa, p.produtora from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod ";
                
                switch($ordem){
				case "p":
					$q .= "ORDER BY p.produtora";
				    break;

				case "nA":
					$q .= "ORDER BY j.nota desc";
				    break;

				case "nB":
					$q .= "ORDER BY j.nota asc";
					break;

				case "g":
					$q .= "ORDER BY g.genero";
					break;

				default:
					$q .= "ORDER BY j.nome";
				}

                $busca = $banco->query($q);
                if (!$busca) {
                    echo "<tr><td>Infelizmente a busca deu errada.";
                } elseif ($busca->num_rows === 0) {
                    echo "<tr><td>Nenhum registro encontrado.";
                } else {
                    while ($reg=$busca->fetch_object()) {
                        $t = thumb($reg->capa);
                        echo "<tr><td><img src='$t' class='mini'/>";
                        echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                        echo "[$reg->genero]";
                        echo "<br/>$reg->produtora";
                        echo "<td>Adm";
                    }
                }
            ?>
        </table>
    </div>
    <?php require_once "rodape.php"; ?>
</body>
</html>