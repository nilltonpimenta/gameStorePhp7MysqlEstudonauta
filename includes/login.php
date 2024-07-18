<?php
    function cripto($senha){
        $cripto = '';
        for ($pos=0; $pos < strlen($senha); $pos++) { 
            $letraPosterior = ord($senha[$pos]) + 1; // returns the numeber +1 from the letter's ASCII table
            $cripto .= chr($letraPosterior); // chr() reveses ord()
        }
        return $cripto;
    }

    function gerarHash($senha){
        $hash = password_hash(cripto($senha), PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash) {
        $ok = password_verify(cripto($senha), $hash);
        return $ok;
    }