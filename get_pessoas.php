<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.php');

    $nome_pessoa = $_POST['nome_pessoa'];
    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT * FROM usuario WHERE usuario like '%$nome_pessoa%' AND id != $id_usuario";
    //echo $sql;
    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo "<a href='#' class='list-group-item'>";
            echo '<strong>'.$registro['usuario'].'</strong><small> - '.$registro['email'].'</small>';
            echo "</a>";
        }

    }else{
        echo "Erro na consulta de usuarios do banco de dados";
    }

?>