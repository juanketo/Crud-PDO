<div class="container">
  <div class="row">
    <div class="col">
      <h1>Crear Contacto</h1>
      <div>
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" aria-describedby="nombreHelp">
          <div id="nombreHelp" class="form-text">Ingresa el nombre a crear</div>
        </div>
        <div class="mb-3">
          <label for="telefono" class="form-label">Telefono</label>
          <input type="text" class="form-control" id="telefono" aria-describedby="telefonoHelp">
          <div id="telefonoHelp" class="form-text">Ingresa el telefono a crear</div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">Ingresa el email a crear</div>
        </div>
        <div class="mb-3">
          <select for="idcategoria" id="categoria" class="form-control">
            <option value="">Crear categoria</option>
            <?php 
              foreach($Categoria as $categoria):
            ?>
            <option value="<?php echo $categoria['idcategoria']?>"> <?php echo $categoria['categoria']?> </option>
            <?php 
              endforeach;
            ?>
          </select>
        </div>
        <button id="crear" class="btn btn-success">Crear</button>
        <a class="btn btn-warning" href="./read">Regresar</a>

      </div>
    </div>
  </div>
</div>

<?php 
  require "./app/controller/create.controller.php";
?>