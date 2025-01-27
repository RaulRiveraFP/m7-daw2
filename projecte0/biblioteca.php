<?php
class Llibre {
    public $titol;
    public $autor;
    public $anyPublicacio;
    public $foto;

    public function __construct($titol, $autor, $anyPublicacio, $foto) {
        $this->titol = $titol;
        $this->autor = $autor;
        $this->anyPublicacio = $anyPublicacio;
        $this->foto = $foto;
    }

    public function obtenirDetalls() {
        return "{$this->titol} de {$this->autor} (Publicat l'any {$this->anyPublicacio})";
    }
}

class Biblioteca {
    private $llibres = [];

    public function afegirLlibre($llibre) {
        $this->llibres[] = $llibre;
    }

    public function mostrarLlibres() {
        return $this->llibres;
    }

    public function cercarLlibre($text) {
        $resultat = [];
        foreach ($this->llibres as $llibre) {
            if (stripos($llibre->titol, $text) !== false) {
                $resultat[] = $llibre;
            }
        }
        return $resultat;
    }
}
?>
