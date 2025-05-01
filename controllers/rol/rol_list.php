<?php
    include_once "../../models/Role.php";
    $role = new Role();
    $roles = $role->getAll();
    include_once "../../views/rol/role_lis.php";  
    exit;
?>
