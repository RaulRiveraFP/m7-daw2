<?php
class Carta {
    public $palo;  // Color de la carta
    public $numero; // Valor o tipus especial (1-9, reverse, skip, +2)
    public $index; // Identificador únic

    public function __construct($palo, $numero) {
        $this->palo = $palo;
        $this->numero = $numero;
        $this->index = uniqid();
    }

    public function pinta_carta() {
        return "<img src='cartas_uno/{$this->numero}_{$this->palo}.png' alt='{$this->palo} {$this->numero}' />";
    }

    public function pinta_carta_link() {
        return "<a href='?play={$this->index}'>" . $this->pinta_carta() . "</a>";
    }

    public function pinta_carta_girada() {
        return "<img src='cartas_uno/carta_girada.png' alt='Carta girada' />";
    }
}
?>
