<script>
  $(document).ready(() => {
    $('#crearcat').click(() => {
        let categoria = $('#categoria').val();

        if (categoria === "" || categoria.length < 3 || /\d/.test(categoria)) {
          Swal.fire({
            icon: 'error',
            title: 'Sus datos no se pudieron enviar',
            text: 'Por favor, llene todos los campos',
          });
          return false;
        }

        $.ajax({
            url: "./app/model/process/categoria.process.php",
            data: {
              categoria,
            },
            type: "POST",

            success: (a) => {
              console.log(a);
              Swal.fire({
                title: 'Categoria!',
                text: "Guardado con exito!",
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
              title: 'La categoria no se pudo enviar',
              text: 'Error al agregar la categoria',
            });
          }
        })
    })
  })
</script>