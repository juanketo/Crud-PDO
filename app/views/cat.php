<div class="container">
<div class="row">
  <div class="col">
    <h1>Crear Categoria</h1>
    <div>
      <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" class="form-control" id="categoria" aria-describedby="categoriaHelp">
        <div id="categoriaHelp" class="form-text">Ingresar la categoria</div>
      </div>
      
      <button id="crearcat" class="btn btn-success">Crear</button>
      <a class="btn btn-warning" href="./read">Regresar</a>

    </div>
  </div>
</div>
</div>

<?php 
require "./app/controller/categoria.controller.php";
?>



