<?php

// Patron Adapter  Compatibilidad entre Windows 7 y Windows 10
interface Archivo {
    public function abrir();
}

class ArchivoWord implements Archivo {
    public function abrir() {
        return "Abriendo archivo Word.";
    }
}

class ArchivoExcel implements Archivo {
    public function abrir() {
        return "Abriendo archivo Excel.";
    }
}

class Windows10 {
    public function abrirArchivo(Archivo $archivo) {
        return $archivo->abrir();
    }
}

class Windows7Adapter implements Archivo {
    private $archivo7;

    public function __construct($archivo7) {
        $this->archivo7 = $archivo7;
    }

    public function abrir() {
        return "Adaptando archivo para Windows 10: " . $this->archivo7->abrir();
    }
}

// Ejemplo de uso
$archivoWord = new ArchivoWord();
$windows10 = new Windows10();
echo $windows10->abrirArchivo($archivoWord) . PHP_EOL;

$archivoWord7 = new ArchivoWord();
$archivoAdaptado = new Windows7Adapter($archivoWord7);
echo $windows10->abrirArchivo($archivoAdaptado) . PHP_EOL;
?>