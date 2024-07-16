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