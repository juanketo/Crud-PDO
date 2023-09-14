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
        <button id="crear" class="btn btn-success">Crear</button>
        <a class="btn btn-warning" href="./read">Regresar</a>

      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(() => {
    $('#crear').click(() => {
        let nombre = $("#nombre").val();
        let telefono = $('#telefono').val();
        let email = $('#email').val();

        if (nombre === "" || telefono === "" || email === "") {
          Swal.fire({
            icon: 'error',
            title: 'Sus datos no se pudieron enviar',
            text: 'Por favor, llene todos los campos',
          });
          return false;
        }

        if (nombre.length < 3 || /\d/.test(nombre)) {
          Swal.fire({
            icon: 'error',
            title: 'Ese no es un nombre estupido',
            text: 'Por favor, ingrese un nombre válido, revisa que tenga mas de 3 caracteres y que no contenga numeros.',

          });

          return;
        }

        if (telefono < 10 || !/^\d{10,}$/.test(telefono)) {
          Swal.fire({
            icon: 'error',
            title: 'Ese no es un numero estupido',
            text: 'Revisa que el campo tenga solo números y minimo 10 digitos.',
          });
          return;
        }
        const valEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!valEmail.test(email)) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingrese un correo electrónico válido, recuerda que tebe de contener un @ y .com.',
          });
          return;
        }

        $.ajax({
            url: "./app/model/process/create.process.php",
            data: {
              nombre,
              telefono,
              email,
            },
            type: "POST",

            success: () => {
              Swal.fire({
                title: 'Contacto guardado',
                text: "Contacto Guardado con exito!",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
              }).then((result) => {
                    window.location = "./read"
                   })
          },
          error: () => {
            Swal.fire({
              icon: 'error',
              title: 'Sus datos no se pudieron enviar',
              text: 'Error al agregar al usuario',
            });
          }
        })
    })
  })
</script>