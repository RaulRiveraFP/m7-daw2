<?php
require_once 'classes/baraja.class.php';
require_once 'classes/jugador.class.php';
require_once 'classes/partida.class.php';

// Configuració inicial del joc
session_start();

if (isset($_GET['jugadors']) && isset($_GET['cartes'])) {
    $num_jugadors = intval($_GET['jugadors']);
    $num_cartes = intval($_GET['cartes']);
    
    // Crear una nova partida
    $_SESSION['partida'] = new Partida($num_jugadors, $num_cartes);
}

// Carregar la partida desada a la sessió
$partida = isset($_SESSION['partida']) ? $_SESSION['partida'] : null;

// Gestionar accions del jugador (tirar carta, robar, etc.)
if (isset($_GET['play']) && $partida) {
    $index_carta = $_GET['play'];
    $jugador_actual = $partida->array_jugadores[$partida->turno];

    // Trobar la carta i jugar-la
    foreach ($jugador_actual->mano as $carta) {
        if ($carta->index === $index_carta) {
            // Canvia la carta sobre la taula
            $partida->carta_en_mesa = $carta;
            $jugador_actual->eliminar_carta($index_carta);

            // Verificar efectes especials
            if ($carta->numero === 'reverse') {
                $partida->cambiar_sentido();
            } elseif ($carta->numero === 'skip') {
                $partida->cambiar_turno(); // Saltar el següent torn
            } elseif ($carta->numero === 'picker') {
                $partida->cambiar_turno();
                $següent_jugador = $partida->array_jugadores[$partida->turno];
                for ($i = 0; $i < 2; $i++) {
                    $següent_jugador->afegir_carta(array_pop($partida->baraja->conjunto_cartas));
                }
            }

            // Passar el torn
            $partida->cambiar_turno();
            break;
        }
    }
}

// Robar carta
if (isset($_GET['robar']) && $partida) {
    $jugador_actual = $partida->array_jugadores[$partida->turno];
    $jugador_actual->afegir_carta(array_pop($partida->baraja->conjunto_cartas));

    // Passar el torn
    $partida->cambiar_turno();
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joc del UNO</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow-x: hidden;
        }

        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Situa el vídeo darrere del contingut */
        }

        .container {
            position: relative;
            z-index: 1; /* Contingut per sobre del vídeo */
            color: white;
            text-align: center;
            padding: 20px;
        }

        .taula, .jugadors, .accions {
            margin-bottom: 20px;
        }

        .jugador-actual {
            border: 2px solid yellow;
            padding: 10px;
        }
    </style>
</head>
<body>
    <!-- Vídeo de fons -->
    <video id="video-background" autoplay muted loop>
        <source src="cartas_uno/video_fondo_uno.mp4" type="video/mp4">
        El teu navegador no suporta vídeos.
    </video>

    <!-- Contingut -->
    <div class="container">
        <h1>Joc del UNO</h1>

        <?php if ($partida): ?>
            <div class="taula">
                <h2>Carta a la taula:</h2>
                <div class="carta-mesa">
                    <?= $partida->carta_en_mesa->pinta_carta(); ?>
                </div>
            </div>

            <div class="jugadors">
                <h2>Jugadors</h2>
                <?php foreach ($partida->array_jugadores as $jugador): ?>
                    <div class="jugador <?= $jugador->id === $partida->turno + 1 ? 'jugador-actual' : ''; ?>">
                        <h3>Jugador <?= $jugador->id; ?></h3>
                        <div class="cartes">
                            <?= $jugador->mostrar_ma(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="accions">
                <h2>Accions</h2>
                <form action="index.php" method="GET">
                    <button type="submit" name="robar" value="true">Robar Carta</button>
                </form>
            </div>
        <?php else: ?>
            <p>Inicia una nova partida des del formulari principal.</p>
            <a href="formulario_uno.php">Tornar al formulari</a>
        <?php endif; ?>
    </div>
</body>
</html>
