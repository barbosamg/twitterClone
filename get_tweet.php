<?php

    session_start();

    if (!isset($_SESSION['usuario'])) {
        header('Location: index.php?erro=1');
    }

    require_once('db.php');

    $id_usuario = $_SESSION['id_usuario'];

    $objDb = new db();
    $link = $objDb->conecta_mysql();

    $sql = "SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %T') AS data_inclusao_for, t.tweet, u.usuario FROM tweet AS t ";
    $sql.= " INNER JOIN usuario as u ON t.id_usuario = u.id";
    $sql.= " WHERE id_usuario = $id_usuario ORDER BY data_inclusao_for DESC";
    //echo $sql;
    $resultado_id = mysqli_query($link, $sql);

    if($resultado_id){

        while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
            echo "<a href='#' class='list-group-item'>";
            echo '<h4 class="list-group-item-heading"> '.$registro['usuario'].' <small> - '.$registro["data_inclusao_for"].' </small></h4>';
            echo '<p class="list-group-item-text">'.$registro['tweet'].'</p>';
            echo "</a>";
        }

    }else{
        echo "Erro na consulta de tweets do banco de dados";
    }

?>