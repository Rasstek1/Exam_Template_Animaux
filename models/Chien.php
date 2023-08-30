<?php
require_once('Animal.php');

/**
 * Class Chien
 * Représente le chien, un type spécifique d'animal.
 * Le chien fait Wouff.
 */
class Chien extends Animal
{
    public function __construct(string $nom = "ton ami")
    {
        parent::__construct($nom, 800, 8);
    }

    public function __toString():string
    {
        $message = "Je suis un chien. Je m'appelle $this->nom et";
        $aFaim = $this->aFaim ? $message." j'ai faim.\n" : $message." je n'ai pas faim.\n";
        $repas = $this->dernierRepas->format('d/m/Y h:i:s');
        return "$message $aFaim J'ai été nourri le $repas";
    }

    /**
     * @return string le son que fait le chien
     */
    public function parle(): string
    {
        return "Wouff \n";
    }
}