<pre>
    <?php
    //$banco = new mysqli(host, user, password, db);
    $banco = new mysqli("localhost", "root", "", "bd_games");
        if ($banco->connect_errno) {
            echo "<p>Encontrei um erro $banco->errno -->  $banco->connect_error</p>";
            die(); //Kills the connection process if there is an error
        }

    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

    /*
    $busca = $banco->query("select * from generos");
    if (!$busca) {
        echo "<p>Falha na busca! $busca->error</p>" ;
    } else {
        while ($reg = $busca->fetch_object()) {
            print_r($reg);
        }
    }
        */