<?php
    echo "<footer>";
    echo "<p> Acessado por " . $_SERVER['REMOTE_ADDR'] . " em ". date('d/M/Y') ."</p>";
    echo "<p> Desenvolvido com a escola Estudonauta</p>";
    echo "</footer>";
    $banco->close(); // Closing the database connection
?>