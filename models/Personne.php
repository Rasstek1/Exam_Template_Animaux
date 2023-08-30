<?php
require_once('Compte.php');
require_once('Chat.php');
require_once('Chien.php');

/**
 * Class Personne
 * Représente les gens, peu importe leur emploi
 * Les personnes ont un compte de banque et 0 à N animaux.
 */
class Personne
{
    private string $travail;
    private string $nom;
    private Compte $compte;
    private int $salaire;
    private array $animaux = [];

    public function __construct(string $nom, string $travail = "aucun", int $salaire = 1500)
    {
        $this->nom = $nom;
        $this->travail = $travail;
        $this->salaire = $salaire;
        $this->compte = new Compte();
    }

    /**
     * @return string
     */
    public function getTravail(): string
    {
        return $this->travail;
    }

    /**
     * @return int
     */
    public function getSalaire(): int
    {
        return $this->salaire;
    }

    public function __toString(): string
    {
        return "Je m'appelle $this->nom et je travaille comme $this->travail. J'ai " . count($this->animaux) . " animaux et " . $this->compte->getSolde() . " cents dans mon compte. \n";
    }

    /**
     * @param Animal $animal à adopter
     */
    public function adopterAnimal(Animal $animal): void
    {
        array_push($this->animaux, $animal);
    }

    /**
     * @param int $index le numéro de l'animal (ordre d'adoption)
     * @return Animal l'animal désigné par l'index
     */
    public function getAnimal(int $index): Animal
    {
        return $this->animaux[$index];
    }

    /**
     * @param string $nom le nom de l'animal
     * @return Animal|null l'animal désigné
     */
    public function getAnimalParNom(string $nom): ?Animal
    {
        foreach ($this->animaux as $animal) {
            if ($animal->nom === $nom) return $animal;
        }
        return null;
    }

    /**
     * @return array contenant les animaux de la personne
     * Les animaux sont des objets de type Animal
     */
    public function getAnimaux(): array
    {
        return $this->animaux;
    }

    /**
     * @return int
     */
    public function getCompte(): int
    {
        return $this->compte->getSolde();
    }

    /**
     * Méthode qui nourrit un animal s'il a faim
     * et que l'argent disponible dans le compte le permet
     *
     * @param Animal $animal qu'on veut nourrir
     * @return bool si l'animal a mangé (compte débité du montant de la nourriture)
     */
    public function nourrirAnimal(Animal $animal, DateTime $date): bool
    {
        $cout = $animal->getCoutNourriture();
        if ($cout <= $this->compte->getSolde() && $animal->mange($date)) {
            $this->compte->retrait($cout);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param int $heures travaillées par la personne
     * @return int le solde du compte après le travail
     */
    public function travailler(int $heures): int
    {
        $this->compte->depot($heures * $this->salaire);
        return $this->compte->getSolde();
    }
}