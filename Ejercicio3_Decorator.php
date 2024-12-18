<?php

// Patron Decorator Añadir armas a personajess
interface Personaje {
    public function obtenerHabilidades();
}

class Guerrero implements Personaje {
    public function obtenerHabilidades() {
        return "Habilidades básicas de guerrero.";
    }
}

class Mago implements Personaje {
    public function obtenerHabilidades() {
        return "Habilidades básicas de mago.";
    }
}

abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }
}

class Espada extends ArmaDecorator {
    public function obtenerHabilidades() {
        return $this->personaje->obtenerHabilidades() . " Añade: Ataque con espada.";
    }
}

class BastonMagico extends ArmaDecorator {
    public function obtenerHabilidades() {
        return $this->personaje->obtenerHabilidades() . " Añade: Ataque con bastón mágico.";
    }
}

// Ejemplo de uso
$guerrero = new Guerrero();
$guerreroConEspada = new Espada($guerrero);
echo $guerreroConEspada->obtenerHabilidades() . PHP_EOL;

$mago = new Mago();
$magoConBaston = new BastonMagico($mago);
echo $magoConBaston->obtenerHabilidades() . PHP_EOL;
?>