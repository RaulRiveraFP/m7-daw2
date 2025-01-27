<?php
require_once 'baraja.class.php';
require_once 'jugador.class.php';

class Partida {
    public $numero_jugadores;
    public $numero_cartas;
    public $turno = 0;
    public $baraja;
    public $array_jugadores = [];
    public $carta_en_mesa;
    public $constante_sentido = 1; // 1: horari, -1: antihorari

    public function __construct($num_jugadors, $num_cartes) {
        $this->numero_jugadores = $num_jugadors;
        $this->numero_cartas = $num_cartes;
        $this->baraja = new Baraja();
        $this->baraja->crea_baraja();
        $this->baraja->mezcla();

        // Crear jugadors
        for ($i = 0; $i < $num_jugadors; $i++) {
            $jugador = new Jugador($i + 1);
            for ($j = 0; $j < $num_cartes; $j++) {
                $jugador->afegir_carta(array_pop($this->baraja->conjunto_cartas));
            }
            $this->array_jugadores[] = $jugador;
        }

        // Seleccionar la primera carta de la taula
        $this->carta_en_mesa = array_pop($this->baraja->conjunto_cartas);
    }

    public function jugar() {
        // Implementar lògica del joc
    }

    public function cambiar_turno() {
        $this->turno = ($this->turno + $this->constante_sentido) % $this->numero_jugadores;
        if ($this->turno < 0) {
            $this->turno += $this->numero_jugadores;
        }
    }

    public function cambiar_sentido() {
        $this->constante_sentido *= -1;
    }
}
?>
