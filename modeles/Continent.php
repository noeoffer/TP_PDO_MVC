<?php
class Continent {

    /**
     * numéro du continent
     * 
     * @var int
     */

    private $num;


        /**
         * libelle du continent
         *
         * @var string
         */
    private $libelle;

    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }

    /**
     * lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string
    {
        return $this->libelle;
    }

        /**
         * ecrit dans le libelle
         *
         * @param string $libelle
         * @return self
         */
    public function setLibelle(string $libelle) : self
    {
        $this->libelle = $libelle;

        return $this;
    }
}