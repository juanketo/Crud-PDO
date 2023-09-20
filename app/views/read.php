<div class="container mt-3 ">
    <div class="row">
        <div class="col">
            <a class="btn btn-success" href="./create">Agregar</a>
            <a class="btn btn-success" href="./home">Regresar</a>
            <a class="btn btn-success" href="./cat">Nueva Caategoria</a>

            <hr>
            <table class="table table-dark table-striped table-hover table-bordered table-sm table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">email</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Actualizar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($contactos as $contacto) :

                    ?>
                        <tr>
                            <td> <?php echo $contacto["nombre"] ?> </td>
                            <td> <?php echo $contacto["telefono"] ?> </td>
                            <td> <?php echo $contacto["email"] ?> </td>
                            <td> <?php echo $contacto["categoria"] ?> </td>
                            <td>
                                <a class="btn btn-warning" href="./update&id=<?php echo $contacto['id'] ?>"> Actualizar</a>
                            </td>
                            <td>
                                <button onclick="eliminar(<?php echo $contacto['id']?>)" class="btn btn-danger">Eliminar</button>
                            </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
            </table>
        </div>
    </div>
</div>
<?php 
    require "./app/controller/delete.controller.php";
?>
