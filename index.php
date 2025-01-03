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

</head>
<body>
    <div class="wrapper">

        <?php include 'includes/sidebar.php'?>

        <button id="toggle-btn"><i class="bi bi-list"></i></button>

        <main id="main">
            <div class="banner" id="banner1">
            </div>

            <div class="portada">
                <img src="/img/portada.png" alt="">
            </div>

            <div class="detalles">
            <p>Tenemos el honor de invitarte a la celebración de nuestro matrimonio</p>
            <h2>Sábado 16 Noviembre 2024</h2>
            </div>

            <div class="banner" id="banner2">
                <div class="countdown">
                    <div class="square-flex">
                        <div class="element">
                            <div class="square">
                                <h3 id="days"></h3>
                            </div>
                            <p>Días</p>
                        </div>

                        <div class="element">
                            <div class="square">
                                <h3 id="hours"></h3>
                            </div>
                            <p>Horas</p>
                        </div>

                        <div class="element">
                            <div class="square">
                                <h3 id="minutes"></h3>
                            </div>
                            <p>Minutos</p>
                        </div>

                        <div class="element">
                            <div class="square">
                                <h3 id="seconds"></h3>
                            </div>
                            <p>Segundos</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="detalles">
                <p>Con la bendición de Dios y en compañía de nuestros padres:</p>
                <div class="padres">
                    <h3>Victor Toledo Bravo<br>María de la Cruz Tapia Gómez</h3>
                    <h3>W. Joaquín Díaz Tomé<br>María de los Ángeles Aguilar Rosano</h3>
                </div>
                <p>Y nuestros queridos padrinos:</p>
                <h3>Emmanuel Hernández Ortíz<br>Daniela Díaz Aguilar</h3>
            </div>

            <div class="lugar">
                <h2>Ceremonia Religiosa</h2>
                <img src="/img/parroquia.png" alt="">
                <h3>Parroquia de Nuestra Señora de la Esperanza</h3>
                <h3>12:50 horas</h3>
                <a href="https://maps.app.goo.gl/SMCL7ipKLF2CEK8A6" target="_blank"><button>Mostrar ubicación</button></a>
            </div>

            <div class="banner" id="banner3"></div>

            <div class="lugar">
                <h2>Recepción</h2>
                <img src="/img/salon.png" alt="">
                <h3>Salón Jardín Acrofest, Cuautlancingo</h3>
                <h3>14:30 horas</h3>
                <a href="https://maps.app.goo.gl/TYgawpdAGUqVM71U6" target="_blank"><button>Mostrar ubicación</button></a>
            </div>

            <div class="detalles">
                <p>Vestimenta: formal, no blanco.</p>
                <img class="icon" src="/img/iconos/dresscode.png" alt="">
                <p>Porque queremos que vivas nuestra boda al máximo y nunca dejes la pista, pedimos amablemente: NO NIÑOS.</p>
                <img class="icon" src="/img/iconos/nokids.png" alt="">
            </div>

            <div class="liston">
                <h2>Te contactaremos por teléfono para confirmar tu asitencia.</h2><br>
                <h3>Gracias por ser parte de este momento</h3>
            </div>

            <div class="detalles">
                <p>Sin ti esto no sería igual.<br>Gracias por tu compañía en esta nueva etapa que comenzamos.<br>El regalo es opcional, aquí puedes encontrar algunas sugerencias.</p>
                <img class="liverpool" src="/img/liverpool.png" alt="">
                <p>Evento: 51507795.</p>
                <a href="https://mesaderegalos.liverpool.com.mx/milistaderegalos/51507795" target="_blank"><button>Mesa de regalos</button></a>
            </div>

            <div class="banner" id="banner4"></div>

            <audio id="audio" src="song.mp3"></audio>

            <button id="playButton"><i class="bi bi-music-note-beamed"></i><i class="bi bi-play-circle"></i></button>

        </main>
    </div>

    <script src="js/sidebar.js"></script>

    <script>
        var playButton = document.getElementById('playButton');
        var audio = document.getElementById('audio');
        var playIcon = '<i class="bi bi-music-note-beamed"></i><i class="bi bi-play-circle"></i>';
        var pauseIcon = '<i class="bi bi-music-note-beamed"></i><i class="bi bi-pause-circle"></i>';

        playButton.addEventListener('click', function() {
            if (audio.paused) {
                audio.play();
                playButton.innerHTML = pauseIcon;
            } else {
                audio.pause();
                playButton.innerHTML = playIcon;
            }
        });
    </script>

    <script>
        const fechaFin = new Date("November 16, 2024 00:00:00").getTime();

        const intervalo = setInterval(function() {
            const ahora = new Date().getTime();

            const diferencia = fechaFin - ahora;

            const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
            const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
            const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

            if (diferencia > 0) {
                document.getElementById("days").innerHTML = `${dias}`;
                document.getElementById("hours").innerHTML = `${horas}`;
                document.getElementById("minutes").innerHTML = `${minutos}`;
                document.getElementById("seconds").innerHTML = `${segundos}`;
            } else {
                clearInterval(intervalo);
                document.getElementById("cuenta-regresiva").innerHTML = "¡Evento iniciado!";
            }
        }, 1000);
    </script>
</body>
</html>