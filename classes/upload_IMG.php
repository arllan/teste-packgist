<?php
// var_dump(upload_IMG::upload('arquivo','../img-produtos',["png","jpeg","jpg","pdf"]));
      class upload_IMG
      {
          public static function upload($var_da_imagem,$direotiro_destino,$formatos_permitidos)
          {
            $mensagem = array(); 
            if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_FILES[$var_da_imagem]) == TRUE):
                $extensao = pathinfo($_FILES[$var_da_imagem]['name'],PATHINFO_EXTENSION);
                if(in_array($extensao, $formatos_permitidos)):
                    $pasta = "$direotiro_destino".'/';
                    $temporario = $_FILES[$var_da_imagem]['tmp_name']; 
                    $novoNome = uniqid().".$extensao";
                    if(move_uploaded_file($temporario, $pasta.$novoNome)):
                        $mensagem[] = TRUE ;
                        $mensagem[] = $novoNome;
                    else:
                        $mensagem[] = FALSE ;
                        $mensagem[] = "erro-desconhecido";
                    endif;
                else:
                    $mensagem[] = FALSE ;
                    $mensagem[] = "formato-invalido";
                endif;
            else:
                $mensagem[] = FALSE ;
                $mensagem[] = "requisicao-nao-e-via-post-ou-arquivo-nao-enviado";
            endif;
            return $mensagem;
          }
      }
?>