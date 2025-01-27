<?php
class Jugador {
    public $id;
    public $mano = [];

    public function __construct($id) {
        $this->id = $id;
    }

    public function afegir_carta($carta) {
        $this->mano[] = $carta;
    }

    public function eliminar_carta($index) {
        foreach ($this->mano as $key => $carta) {
            if ($carta->index === $index) {
                unset($this->mano[$key]);
                break;
            }
        }
        $this->mano = array_values($this->mano);
    }

    public function mostrar_ma() {
        $output = '';
        foreach ($this->mano as $carta) {
            $output .= $carta->pinta_carta_link();
        }
        return $output;
    }
}
?>
