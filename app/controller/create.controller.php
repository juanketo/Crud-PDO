<script>
  $(document).ready(() => {
    $('#crear').click(() => {
        let nombre = $("#nombre").val();
        let telefono = $('#telefono').val();
        let email = $('#email').val();
        let categoria = $('#categoria').val();

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
              categoria,
            },
            type: "POST",

            success: (a,b,c,d) => {
              console.log(a,b,c,d);
              Swal.fire({
                title: 'Contacto guardado',
                text: "Contacto Guardado con exito!",
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
              }).then((result) => {
                    //window.location = "./read"
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