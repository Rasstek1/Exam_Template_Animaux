<?php

/**
 * Class Animal
 * Classe abstraite qui regroupe toutes les propriétés et méthodes communes à tous les animaux.
 * @author Valérie
 */
abstract class Animal
{
    public string $nom;
    public DateTimeImmutable $dernierRepas;

    protected bool $aFaim = true;
    protected int $intervalleRepas;
    protected int $coutNourriture;

    public function __construct(string $nom = "Mon ami", int $coutNourriture = 0, int $intervalleRepas = 10)
    {
        $this->nom = $nom;
        $this->coutNourriture = $coutNourriture;
        $this->intervalleRepas = $intervalleRepas;
        $this->dernierRepas = new DateTimeImmutable();
    }

    /**
     * @return bool
     */
    public function isAFaim(DateTime $date = new DateTime()): bool
    {
        $diff = $this->dernierRepas->diff($date);
        $this->aFaim = ($diff->h + $diff->d * 24) >= $this->intervalleRepas;
        return $this->aFaim;
    }

    /**
     * @return int
     */
    public function getCoutNourriture(): int
    {
        return $this->coutNourriture;
    }


    /**
     * Si l'animal a faim et que le délai entre les repas est respecté, il mange, sinon il ne mange pas
     * Si l'animal mange, il n'a plus faim.
     * @param DateTime $date date et heure à laquelle on tente de nourrir l'animal
     * @return bool retourne si l'animal a mangé ou pas
     */
    public function mange(DateTime $date): bool
    {
        $diff = $this->dernierRepas->diff($date);
        if ($this->aFaim && ($diff->h + $diff->d * 24) >= $this->intervalleRepas) {
            $this->aFaim = false;
            $this->dernierRepas = DateTimeImmutable::createFromMutable($date);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string le son que l'animal fait
     */
    abstract public function parle(): string;
}