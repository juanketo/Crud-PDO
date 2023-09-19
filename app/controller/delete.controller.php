<script>
    const eliminar = (id) => {
        Swal.fire({
            title: 'Seguro de eliminar',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "./app/model/process/delete.process.php",
                    data: {
                        id
                    },
                    type: "POST",
                    success: (a) => {
                        swal.fire({
                            title: "Todo Bien",
                            text: "Borraste el contacto con exito",
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'okay'
                        }).then((result) => {
                            window.location = "./read"
                        });
                    },
                    error: () => {
                        swal.fire({
                            title: "ERROR",
                            text: "consuta con el admin"
                        });
                    }
                })
            }
        })
    }
</script>