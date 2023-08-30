<?php

/**
 * Class Compte
 * Représente le compte de banque des personnes.
 * Toutes les transactions se font en cents
 */
class Compte
{
    private int $solde = 0;

    /**
     * Compte constructor.
     * @param int $solde le solde initial (en cents)
     */
    public function __construct(int $solde=0)
    {
        $this->solde = $solde;
    }

    /**
     * @return string le solde du compte en cents
     */
    public function __toString():string
    {
        return "$this->solde cents";
    }


    /**
     * Méthode qui retourne le solde du compte en cents
     * @return int le solde du compte en cents
     */
    public function getSolde(): int
    {
        return $this->solde;
    }

    /**
     * Méthode qui permet de faire un dépôt dans le compte
     * @param int $montant à déposer (en cents)
     * @return int le nouveau solde du compte (en cents)
     */
    public function depot(int $montant): int
    {
        $this->solde += $montant;
        return $this->solde;
    }

    /**
     * Méthode qui permet de faire un retrait dans le compte
     * @param int $montant à retirer (en cents)
     * @return int le nouveau solde du compte (en cents)
     */
    public function retrait(int $montant):int {
        # On peut écrire en une ligne
        return $this->solde -= $montant;
    }

}