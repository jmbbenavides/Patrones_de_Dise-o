<?php

// Patron FactoryCrear personajes segun nivel del juego
interface Personaje {
    public function atacar();
    public function velocidad();
}

class Esqueleto implements Personaje {
    public function atacar() {
        return "Esqueleto ataca con arco.";
    }
    public function velocidad() {
        return "Esqueleto tiene velocidad media.";
    }
}

class Zombi implements Personaje {
    public function atacar() {
        return "Zombi ataca con mordida.";
    }
    public function velocidad() {
        return "Zombi tiene velocidad baja.";
    }
}

class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        if ($nivel === "facil") {
            return new Esqueleto();
        } elseif ($nivel === "dificil") {
            return new Zombi();
        } else {
            throw new Exception("Nivel desconocido.");
        }
    }
}

// Ejemplo de uso
$nivel = "facil"; // Cambiar a "dificil" para probar
$personaje = PersonajeFactory::crearPersonaje($nivel);
echo $personaje->atacar() . PHP_EOL;
echo $personaje->velocidad() . PHP_EOL;
?>