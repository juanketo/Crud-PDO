<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require "./app/views/includes/metatags.php"
    ?>
</head>

<body>

    <?php
    require "./app/model/crud.class.php";
    $crud = new Crud();
    if (isset($_GET["vista"])) {
        switch ($_GET["vista"]) {
            case 'home':
                include "./app/views/home.php";
                break;
            case 'read':
                $contactos = $crud->read();
                include "./app/views/read.php";
                break;
            case 'create':
                include "./app/views/create.php";
                break;
            case 'update':
                $contacto = $crud->show($_REQUEST["id"]);
                include "./app/views/update.php";
                break;
            default:
                header("location:./read");
                break;
            case 'cat':
                include "./app/views/cat.php";
                break;
        }
    } else {
        header("location: ./home");
    }

    ?>

    <?php
    require "./app/views/includes/scripts.php"
    ?>
</body>

</html>