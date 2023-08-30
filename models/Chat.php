<?php
require_once('Animal.php');

/**
 * Class Chat
 * Représente le chat, un type spécifique d'animal.
 * Le chat fait Miaou
 */
class Chat extends Animal
{

    /**
     * Chat constructor.
     *
     *
     * @param string $nom le nom de l'animal
     */
    public function __construct(string $nom = "ton ami")
    {
        parent::__construct($nom, 500);
    }

    public function __toString():string
    {
        $message = "Je suis un chat. Je m'appelle $this->nom et";
        $aFaim = $this->aFaim ? $message." j'ai faim.\n" : $message." je n'ai pas faim.\n";
        $repas = $this->dernierRepas->format('d/m/Y h:i:s');
        return "$message $aFaim J'ai été nourri le $repas";
    }

    /**
     * @return string le son que fait le chat
     */
    public function parle(): string
    {
        return "Miaou \n";
    }
}