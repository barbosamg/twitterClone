<?php
require_once 'db.php';

$usuario = $_POST['usuario'];

$email = $_POST['email'];

$senha = md5($_POST['senha']);

$objDB = new db();
$link = $objDB->conecta_mysql();

$usuario_existe = false;
$email_existe = false;

//verificar se o usuario ja existe
$sql = "select * from usuario where usuario = '$usuario' ";

if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['usuario'])) {
        $usuario_existe = true;
    }

    var_dump($dados_usuario);

} else {
    echo "Erro ao tentar localizar o registro de email";
}

//verificar se o email ja existe
$sql = "select * from usuario where email = '$email' ";

if ($resultado_id = mysqli_query($link, $sql)) {

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['email'])) {
        $email_existe = true;
    }
    var_dump($dados_usuario);

} else {
    echo "Erro ao tentar localizar o registro de usuário";
}

if($usuario_existe || $email_existe){

    $retorno_get = '';

    if($usuario_existe){
        $retorno_get.= "erro_usuario=1&";
    }

    if($email_existe){
        $retorno_get.= 'erro_email=1&';
    }

    header('Location: inscrevase.php?'.$retorno_get);
    die();
}


//INSERT USUARIO
$sql = "INSERT INTO usuario (usuario, email, senha) values ('$usuario', '$email', '$senha') ";

//executar a query
if (mysqli_query($link, $sql)) {
    echo 'Usuário cadatrado com sucesso';
} else {
    echo 'Erro ao registrar o usuário';
}
