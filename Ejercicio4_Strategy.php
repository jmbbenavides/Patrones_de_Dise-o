<?php

// Patron Strategy Mostrar mensajes en distintos formatos 
interface EstrategiaSalida {
    public function mostrar($mensaje);
}

class SalidaConsola implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo "Consola: $mensaje" . PHP_EOL;
    }
}

class SalidaJSON implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo json_encode(["mensaje" => $mensaje]) . PHP_EOL;
    }
}

class SalidaArchivoTXT implements EstrategiaSalida {
    public function mostrar($mensaje) {
        file_put_contents("salida.txt", $mensaje);
        echo "Mensaje guardado en salida.txt" . PHP_EOL;
    }
}

class Mensaje {
    private $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrarMensaje($mensaje) {
        $this->estrategia->mostrar($mensaje);
    }
}

// Ejemplo de uso
$mensaje = new Mensaje(new SalidaConsola());
$mensaje->mostrarMensaje("Hola, mundo!");

$mensaje = new Mensaje(new SalidaJSON());
$mensaje->mostrarMensaje("Hola, mundo!");

$mensaje = new Mensaje(new SalidaArchivoTXT());
$mensaje->mostrarMensaje("Hola, mundo!");
?>