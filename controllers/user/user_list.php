<?php
    include_once "../../models/User.php";
    $usuario = new Usuario();
    $usuarios = $usuario->getAll();
    include_once "../../views/user/user_lis_form.php";
    exit;
?>
