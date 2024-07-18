<?php
        function thumb($arq){
            $caminho = "fotos/$arq";
            //If it "is null" or the "file does not exist"
            if(is_null($arq) || !file_exists($caminho)){ 
                return "fotos/indisponivel.png";
            } else {
                return $caminho;
            }
        }

        function voltar(){
            return "<a href='index.php'><span class='material-symbols-outlined'>arrow_back</span></a>";
        }

        function msg_sucesso($msg){
            $resp = "<div class='sucesso'>
            <span class='material-symbols-outlined'>task_alt</span> $msg </div>";
            return $resp;
        }

        function msg_aviso($msg){
            $resp = "<div class='aviso'>
            <span class='material-symbols-outlined'>warning</span> $msg </div>";
            return $resp;
        }

        function msg_erro($msg){
            $resp = "<div class='erro'>
            <span class='material-symbols-outlined'>report</span> $msg </div>";
            return $resp;
        }