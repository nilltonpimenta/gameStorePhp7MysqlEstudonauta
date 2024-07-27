<?php
    session_start();

    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }
        
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

    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }

    function is_logado(){
        if(empty($_SESSION['user'])){
            return false;
        } else {
            return true;
        }
    }

    function is_admin() {
        $tipo = $_SESSION['tipo'] ?? null;
        if(is_null($tipo)){
            return false;
        } else {
            if($tipo == 'admin') {
                return true;
            } else {
                return false;
            }
        }
    }

    function is_editor() {
        $tipo = $_SESSION['tipo'] ?? null;
        if(is_null($tipo)){
            return false;
        } else {
            if($tipo == 'editor') {
                return true;
            } else {
                return false;
            }
        }
    }

    function niveisAcesso(){
        if (is_admin()) {
            echo "<td>";
            echo "<span class='material-symbols-outlined'>add</span>";
            echo "<span class='material-symbols-outlined'>edit_square</span>";
            echo "<span class='material-symbols-outlined'>delete</span>";
        } elseif (is_editor()) {
            echo "<td><span class='material-symbols-outlined'>edit_square</span>";
        }
    }