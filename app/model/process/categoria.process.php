<?php
    require "../crud.class.php";
    $crud = new Crud();

$crud->categoria(
    $_POST["categoria"]
    );

?>