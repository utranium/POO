<?php

include("./TVA.php");

Class Depense
{  /**
    * désignation de la Depense
    */
    public $designationDepense;

    /**
    * dateDepense
    */
    public $dateDepense;

    /**
    * montantHTDepense
    */
    public $montantHTDepense;

    /**
    * montant TVA
    */
    public $montantTVADepense;

    /**
    * montantTTCDepense
    */
    public $montantTTCDepense;

    /**
    * remiseDepense sur le prix ttc
    */
    public $remiseDepense;
    
    /**
     *type de paiement utilisé
     */
    public $typePaiementDepense;



    /**
     * constructeur
     *
     * @param String $designationDepense
     * @param String $dateDepense
     * @param Float $montantHTDepense
     * @param String $montantTVADepense
     * @param Float $montantTTCDepense
     * @param Float $remiseDepense
     * @param String $typePaiementDepense
     */
    public function __construct(
        String $designationDepense,
		String $dateDepense,
		Float $montantHTDepense,
		TVA $montantTVADepense,
        //Float $montantTTCDepense,
        Float $remiseDepense,
        string $typePaiementDepense
		
    ){
        $this->designationDepense = $designationDepense;
		$this->dateDepense = $dateDepense;
		$this->montantHTDepense = $montantHTDepense;
		$this->montantTVADepense = $montantTVADepense->taux;
		//$this->montantTTCDepense = $montantTTCDepense;
        $this->remiseDepense = $remiseDepense;
        $this->typePaiementDepense = $typePaiementDepense;
    }

    
    public function addDepense()
    {
        $this->listeDepense[] = new Depense("irishCoffee", "27/01/2020", 8.5, "20",1,"sansContact");
    }




}


$tva55 = new TVA (5.5);
$tva155 = new TVA (15.5);
$tva20 = new TVA (20);

//on sort de la classe Depense


$listeDepense = [
    new Depense("palette coca", "25/01/2020", 1800, $tva55,175,"virement"),
    new Depense("futs biere", "25/01/2020", 550.25, $tva55,0,"a la livraison"),
    new Depense("palette biere bouteilles", "22/01/2020", 1235, $tva55,75,"virement"),
    new Depense("bouteilles vodka", "21/01/2020", 854, $tva55,25,"a la livraison"),
    new Depense("futs biere", "20/01/2020", 650.23, $tva55,125,"virement"),
    new Depense("palette coca", "18/01/2020", 1750, $tva55,130,"espece"),
    new Depense("palette orangina", "16/01/2020", 1950, $tva55,125,"a la livraison"),
    new Depense("palette jus de fruit", "04/01/2020", 2500, $tva55,232,"virement")

];


// echo("<pre>");
// echo("<code>");
//var_dump($listeDepense);
// echo("</code>");
// echo("</pre>");



?>