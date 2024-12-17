<?php
namespace Videojuego\Decorator;

// Interfaz para los personajes
interface Personaje {
    public function obtenerDescripcion(): string;
    public function obtenerPoderAtaque(): int;
}

// Clase Peleador
class Peleador implements Personaje {
    public function obtenerDescripcion(): string {
        return "Guerrero básico";
    }

    public function obtenerPoderAtaque(): int {
        return 10;
    }
}

// Clase Emperador
class Emperador implements Personaje {
    public function obtenerDescripcion(): string {
        return "Mago básico";
    }

    public function obtenerPoderAtaque(): int {
        return 8;
    }
}

// Decorador base
abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion();
    }

    public function obtenerPoderAtaque(): int {
        return $this->personaje->obtenerPoderAtaque();
    }
}

// Decorador Escudo
class EscudoDecorator extends ArmaDecorator {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . ", escudo de batalla";
    }

    public function obtenerPoderAtaque(): int {
        return $this->personaje->obtenerPoderAtaque() + 15;
    }
}

// Decorador Espada
class EspadaDecorator extends ArmaDecorator {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . ", con espada de batalla";
    }

    public function obtenerPoderAtaque(): int {
        return $this->personaje->obtenerPoderAtaque() + 10;
    }
}

// Decorador  Lanza de batalla
class LanzaDecorator extends ArmaDecorator {
    public function obtenerDescripcion(): string {
        return $this->personaje->obtenerDescripcion() . ", con lanza de batalla";
    }

    public function obtenerPoderAtaque(): int {
        return $this->personaje->obtenerPoderAtaque() + 20;
    }
}

// Ejemplo de uso
use Videojuego\Decorator\Peleador;
use Videojuego\Decorator\Emperador;
use Videojuego\Decorator\EscudoDecorator;
use Videojuego\Decorator\EspadaDecorator;
use Videojuego\Decorator\LanzaDecorator;

// Crear Peleador con decoradores
$Peleador = new Peleador();
$PeleadorConEscudo = new EscudoDecorator($Peleador);
$PeleadorConArmas = new EspadaDecorator($PeleadorConEscudo);

// Crear Emperador con decorador
$Emperador = new Emperador();
$EmperadorConLanza = new LanzaDecorator($Emperador);

//Resultados
echo $PeleadorConArmas->obtenerDescripcion() . "\n";
echo "Poder de ataque: " . $PeleadorConArmas->obtenerPoderAtaque() . "\n\n";

echo $EmperadorConLanza->obtenerDescripcion() . "\n";
echo "Poder de ataque: " . $EmperadorConLanza->obtenerPoderAtaque() . "\n";
