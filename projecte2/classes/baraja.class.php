<?php
require_once 'carta.class.php';

class Baraja {
    public $conjunto_cartas = [];

    public function crea_baraja() {
        foreach (['red', 'yellow', 'blue', 'green'] as $color) {
            for ($i = 1; $i <= 9; $i++) {
                $this->conjunto_cartas[] = new Carta($color, $i);
            }
            foreach (['reverse', 'skip', 'picker'] as $especial) {
                $this->conjunto_cartas[] = new Carta($color, $especial);
            }
        }
    }

    public function mezcla() {
        shuffle($this->conjunto_cartas);
    }

    public function pinta_baraja() {
        $output = '';
        foreach ($this->conjunto_cartas as $carta) {
            $output .= $carta->pinta_carta();
        }
        return $output;
    }

    public function pinta_baraja_girada() {
        $output = '';
        foreach ($this->conjunto_cartas as $carta) {
            $output .= $carta->pinta_carta_girada();
        }
        return $output;
    }
}
?>
