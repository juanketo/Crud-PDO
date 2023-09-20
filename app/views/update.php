<?php

  $crudU = new Crud();
  $categorias = $crudU -> readCategoria();
?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>Actualizar Contacto</h1>
      <div>
        <div class="mb-3">
          <input type="text" id="id" value="<?php echo $contacto['id'] ?>" hidden>
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" value="<?php echo $contacto["nombre"] ?>" aria-describedby="nombreHelp">
          <div id="nombreHelp" class="form-text">Ingresa el nombre a actualizar</div>
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Telefono</label>
          <input type="text" class="form-control" id="telefono" value="<?php echo $contacto["telefono"] ?>" aria-describedby="telefonoHelp">
          <div id="telefonoHelp" class="form-text">Ingresa el telefono a actualizar</div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" value="<?php echo $contacto["email"] ?>" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Ingresa el email a actualizar</div>
        </div>
        <select for="idcategoria" id="categoria" class="form-control">
            <option value="<?php echo $contacto['categoria']?>"><?php echo $contacto['nombrecategoria']?></option>
            <?php 
              foreach($categorias as $categoria):
            ?>
            <option value="<?php echo $categoria['idcategoria']?>"> <?php echo $categoria['categoria']?> </option>
            <?php 
              endforeach;
            ?>
          </select>
          <br>
        <button id="actualizar" class="btn btn-success">Actualizar</button>
        <a class="btn btn-warning" href="./read">Regresar</a>

      </div>
    </div>
  </div>
</div>
<?php 
  require "./app/controller/update.controller.php";
?>