<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestra Boda - Mariana & Aldo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/index.css"></link>
    <link rel="stylesheet" href="css/sidebar.css"></link>


    <link rel="icon" href="/img/favicon.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery CDN -->
</head>

</head>
<body>
    <div class="wrapper">
        <?php include 'includes/sidebar.php'?> <!-- Incluye tu sidebar -->

        <button id="toggle-btn"><i class="bi bi-list"></i></button> <!-- Botón para el sidebar -->

        <main id="main">
            <div class="confirmar">
                <form id="confirmForm" method="POST">
                    <label for="codigo_confirmacion">Ingrese su código de confirmación:</label>
                    <input type="text" id="codigo_confirmacion" name="codigo_confirmacion" required>

                    <label for="pases_confirmados">Número de pases a confirmar:</label>
                    <input type="number" id="pases_confirmados" name="pases_confirmados" min="1" required>

                    <button type="submit">Confirmar Asistencia</button>
                </form>

                <!-- Aquí se mostrará el mensaje de confirmación o error -->
                <div id="mensaje"></div>
            </div>
        </main>
    </div>

    <script>
        $(document).ready(function(){
            $('#confirmForm').on('submit', function(e) {
                e.preventDefault(); // Evitar que el formulario se envíe normalmente

                var codigo = $('#codigo_confirmacion').val(); // Obtener el valor del input
                var pases = $('#pases_confirmados').val(); // Obtener el número de pases

                console.log('Datos enviados:', {codigo_confirmacion: codigo, pases_confirmados: pases}); // Depurar datos

                // Enviar los datos mediante AJAX
                $.ajax({
                    type: 'POST',
                    url: 'confirmar.php', // Ruta a tu archivo PHP
                    data: {
                        codigo_confirmacion: codigo,
                        pases_confirmados: pases
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Respuesta recibida:', response); // Mostrar la respuesta completa para depuración
                        // Mostrar mensaje en el div con id "mensaje"
                        if(response.status === 'success') {
                            $('#mensaje').html('<p style="color: green;">' + response.message + '</p>');
                        } else {
                            $('#mensaje').html('<p style="color: red;">' + response.message + '</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        // Manejar errores de AJAX y mostrar información en consola
                        console.log('Error de AJAX:', xhr.responseText);
                        $('#mensaje').html('<p style="color: red;">Error en la conexión. Intenta más tarde.</p>');
                    }
                });
            });
        });
    </script>
    <script src="js/sidebar.js"></script>
</body>
</html>