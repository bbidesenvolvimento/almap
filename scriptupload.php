<?php
//Inicia a sessão
session_start();
      //define o arquivo
      $tamanho = $_FILES["arquivo"]["size"];
      $tipo = $_FILES["arquivo"]["type"];
      $diretorio = "pagsclientes/";
      $nome_arquivo = $_FILES["arquivo"]["name"];
	  
	  echo ($tamanho);
	   echo ($tipo);
	    echo ($diretorio);
		 echo ($nome_arquivo);
	  
        //verifica se o tamanho do arquivo corresponde ao tamanho permitido (8000000)
        if($tamanho < 8000000)
        {
            //verifica se o tipo de arquivo correspode ao tipo permitido (.gif e .jpg no caso foi imagem)
            if($tipo == "image/pjpeg" or "image/gif")
            {
              //verifica se o aruivo esta no temp
              if(is_uploaded_file($_FILES["arquivo"]["tmp_name"]))
              {
                  //faz o upload do arquivo
                  if(move_uploaded_file($_FILES["arquivo"]["tmp_name"],"$diretorio".$_FILES["arquivo"]["name"]))
                  { }else
                  {

                        echo ("Não foi possivel efetuar o UpLoad!");


                  }
              }else
                {

                        echo ("Arquivo inexistente!");

                }
            }else
            {
                echo ("Tipo inválido, por favor troque seu arquivo!");

            }
        }else
        {
                              echo ("Tamanho muito grande!");
                        }
?>