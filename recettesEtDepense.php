<?php

include("./TVA.php");
include("./moyenDePaiement.php");

Class recette
{  /**
    * désignation de la recette
    */
    public $designation;

    /**
    * dateRecette
    */
    public $dateRecette;

    /**
    * montantHT
    */
    public $montantHT;

    /**
    * montant TVA
    */
    public $montantTVA;

    /**
    * montantTTC
    */
    public $montantTTC;

    /**
    * remise sur le prix ttc
    */
    public $remise;
    
    /**
     *type de paiement utilisé
     */
    public $typePaiement;



    /**
     * constructeur
     *
     * @param String $designation
     * @param String $dateRecette
     * @param Float $montantHT
     * @param TVA $pourcentageTVA
     * @param Float $montantTTC
     * @param Float $remise
     * @param moyenDePaiement $typePaiement
     */
    public function __construct(
        String $designation,
		String $dateRecette,
		Float $montantHT,
		TVA $montantTVA,
        //Float $montantTTC,
        Float $remise,
        moyenDePaiement $typePaiement
		
    ){
        $this->designation = $designation;
		$this->dateRecette = $dateRecette;
		$this->montantHT = $montantHT;
		//$this->montantTTC = $montantTTC;
        $this->remise = $remise;
        $this->typePaiement = $typePaiement->typeDePaiement;
        $this->montantTVA = $montantTVA->taux;
    }

    
    public function addRecette()
    {
        $this->listeRecette[] = new recette("irishCoffee", "27/01/2020", 8.5, $tva20,1,"sansContact");
    }

}

//on sort de la classe recette



//on creer la classe dépense
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
     * @param moyenDePaiement $typePaiementDepense
     */
    public function __construct(
        String $designationDepense,
		String $dateDepense,
		Float $montantHTDepense,
		TVA $montantTVADepense,
        //Float $montantTTCDepense,
        Float $remiseDepense,
        moyenDePaiement $typePaiementDepense
		
    ){
        $this->designationDepense = $designationDepense;
		$this->dateDepense = $dateDepense;
		$this->montantHTDepense = $montantHTDepense;
		$this->montantTVADepense = $montantTVADepense->taux;
		//$this->montantTTCDepense = $montantTTCDepense;
        $this->remiseDepense = $remiseDepense;
        $this->typePaiementDepense = $typePaiementDepense->typeDePaiement;
    }

}


//on sort de la classe Depense


$tva55 = new TVA (5.5);
$tva155 = new TVA (15.5);
$tva20 = new TVA (20);

$carte = new moyenDePaiement ("carte");
$sansContact = new moyenDePaiement ("sans contact");
$espece = new moyenDePaiement ("espece");
$virement = new moyenDePaiement ("virement");
$cheque = new moyenDePaiement ("chèque");
$livraison = new moyenDePaiement ("à la livraison");




$listeRecette = [
    new recette("coca", "25/01/2020", 3.20, $tva20 , 0.5,$sansContact),
    new recette("biere", "25/01/2020", 5, $tva55, 0,$carte),
    new recette("biere", "22/01/2020", 4.8, $tva55, 0.5,$sansContact),
    new recette("vodka", "21/01/2020", 5.6, $tva55, 0.25,$carte),
    new recette("biere", "20/01/2020", 5.5, $tva55, 2,$sansContact),
    new recette("coca", "18/01/2020", 3.20, $tva20, 0.25,$espece),
    new recette("orangina", "16/01/2020", 3.20, $tva20, 0.32,$carte),
    new recette("jus de fruit", "04/01/2020", 4.8, $tva155, 0.20,$sansContact),
    new recette("jus de fruit", "02/01/2020",4.8, $tva155, 0.20,$carte),
    new recette("coca", "25/12/2019", 3.20, $tva20, 1,$sansContact),
    new recette("biere", "24/12/2019", 5.8, $tva55, 0.25,$sansContact),
    new recette("café", "12/12/2019", 1.5, $tva55, 0,$espece),
    new recette("coca", "25/12/2019", 3.20, $tva20, 0.5,$sansContact),
    new recette("biere", "25/12/2019", 5, $tva55, 0,$carte),
    new recette("biere", "22/12/2019", 4.8, $tva55, 0.5,$sansContact),
    new recette("vodka", "21/12/2019", 5.6, $tva55, 0.25,$carte),
    new recette("biere", "20/12/2019", 5.5, $tva55, 2,$sansContact),
    new recette("coca", "18/12/2019", 3.20, $tva20, 0.25,$espece),
    new recette("orangina", "16/12/2019", 3.20, $tva20, 0.32,$carte),
    new recette("jus de fruit", "04/12/2019", 4.8, $tva155, 0.20,$sansContact),
    new recette("jus de fruit", "02/12/2019",4.8, $tva155, 0.20,$carte),
    new recette("coca", "25/12/2019", 3.20, $tva20, 1,$sansContact),
    new recette("biere", "25/11/2019", 5.8, $tva55, 0.5,$sansContact),
    new recette("café", "12/11/2019", 1.5, $tva20, 0,$espece)

];


$listeDepense = [
    new Depense("palette coca", "25/01/2020", 1800, $tva55,175,$virement),
    new Depense("futs biere", "25/01/2020", 550.25, $tva55,0,$livraison),
    new Depense("palette biere bouteilles", "22/01/2020", 1235, $tva55,75,$virement),
    new Depense("bouteilles vodka", "21/01/2020", 854, $tva55,25,$livraison),
    new Depense("futs biere", "20/01/2020", 650.23, $tva55,125,$virement),
    new Depense("palette coca", "18/01/2020", 1750, $tva55,130,$espece),
    new Depense("palette orangina", "16/01/2020", 1950, $tva55,125,$livraison),
    new Depense("palette jus de fruit", "04/01/2020", 2500, $tva55,232,$virement)

];



// echo("<pre>");
// echo("<code>");
// var_dump($listeRecette);
// echo("</code>");
// echo("</pre>");

// echo("<pre>");
// echo("<code>");
// var_dump($listeDepense);
// echo("</code>");
// echo("</pre>");

?>