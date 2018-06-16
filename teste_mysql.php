<?php

    require_once('db.php');

   // echo $usuario .'<br>'.$senha;

    $sql = "SELECT * FROM usuario";

    $objDB = new db();
    $link = $objDB->conecta_mysql();

    $resultado_id =  mysqli_query($link, $sql);

    if($resultado_id){
        //MYSQLI_ASSOC ->  RETORNA O NOME DOS INDICES
        //MYSQLI_NUM -> RETORNA O NUMERO DOS INDICES
        $dados_usuario = array();
        while($linha = mysqli_fetch_array($resultado_id, MYSQLI_NUM)){
            $dados_usuario[] = $linha;
        }
        var_dump($dados_usuario);

        foreach($dados_usuario as $usuario){
            var_dump($usuario[2]);
            echo '<br>';
        }

    }else{
        echo 'Erro na execução da consulta';
    }
?>