<?php

/*
como utilizar a classe. echo uploadImagem::imgUpload("Nome da pasta onde deve ser adicionado o arquivo");

obs:  No formulario dete ver o campo file da seguinte forma: <input name="filename" type="file">
*/
    class uploadImagem
    {
        protected static $formatosPermitidos = array("png","jpeg","jpg","pdf");
        protected static $extensao;
        protected static $pasta;
        protected static $novoNome;
        protected static $mensagemErro;

        public static function imgUpload($diretorio = "arquivos/")
        {
            self::$pasta = $diretorio ;
            if($_SERVER['REQUEST_METHOD'] == 'POST'):
                self::$extensao = pathinfo($_FILES['filename']['name'],PATHINFO_EXTENSION); // recebe a imagem
                if(in_array(self::$extensao, self::$formatosPermitidos)):
                    //$pasta = "arquivos/";
                    $temporario = $_FILES['filename']['tmp_name']; 
                    self::$novoNome = uniqid().'.'.self::$extensao;
                    if (move_uploaded_file($temporario, self::$pasta.self::$novoNome)):
                        self::$mensagemErro = TRUE;
                    else:
                        self::$mensagemErro = "Erro, não foi possivel fazer o upload!";
                    endif;
                else:
                    self::$mensagemErro = "formato invalido!";
                endif;
            else:
                self::$mensagemErro = "Não foi via POST";
            endif;

            return self::$mensagemErro ;
        }
    }

    echo uploadImagem::imgUpload();
?>