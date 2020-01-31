<?php

include("./recettesEtDepense.php");




Class bar
{   
    /**
    * nom du bar
    *
    * @var string
    */
    public $nombar;

    /**
     * adresse du bar
     *
     * @var string
     */
    public $adresse;

    /**
     * liste de toute les recettes du bar
     *
     * @var array
     */
    public $recetteGlobal;
    
    /**
     * liste des depenses global
     *
     * @var array
     */
    public $depenseGlobal;


    /**
     * construct
     *
     * @param array $recetteGlobal
     * @param array $depenseGlobal
     */
    public function __construct(
        array $recetteGlobal,
        array $depenseGlobal
    ) {
        $this->recetteGlobal = $recetteGlobal;
        $this->depenseGlobal = $depenseGlobal;
    }




    /**
     * addition d'une recette
     *
     * @param recette $recetteAdd
     * @return void
     */
    public function addRecette(recette $recetteAdd)
    {
        $this->recetteGlobal[] = $recetteAdd;
        return $this->recetteGlobal;
    }
    /**
     * addition d'une depense
     *
     * @param depense $depenseAdd
     * @return void
     */
    public function addDepense(depense $depenseAdd)
    {
        $this->depenseGlobal[] = $depenseAdd;
        return $this->depenseGlobal;
    }




    /**
     * soustraction d'une recette
     *
     * @param recette $recetteRemove
     * @return void
     */
    public function removeRecette(recette $recetteRemove)
    {
        unset($this->recetteGlobal[array_search($recetteRemove,$this->recetteGlobal)]);
        return $this->recetteGlobal;
    }

    /**
     * soustraction d'une dépense
     *
     * @param depense $depenseRemove
     * @return void
     */
    public function removeDepense(depense $depenseRemove)
    {
        unset($this->depenseGlobal[array_search($depenseRemove,$this->depenseGlobal)]);
        return $this->depenseGlobal;
    }





    /**
     * affiche la recette selectionnée
     *
     * @param index $numero
     * @return void
     */
    public function afficherRecette($numero) {
        $cherche = $this->recetteGlobal[$numero-1];
        return $cherche;
    }
    /**
     * affiche la depense selectionnée
     *
     * @param index $numero
     * @return void
     */
    public function afficherDepense($numero) {
        $cherche = $this->depenseGlobal[$numero-1];
        return $cherche;
    }






    /**
     * fonction qui calcul le prix TTC d'une recette avec les remises
     *
     * @param int $numero
     * @return void
     */
    public function calculRecette($numero){
        foreach ($this->recetteGlobal as $recette) {
                $TVARecette[] = $recette->montantTVA;
                $HTRecette[] = $recette->montantHT;
                $remiseRecette[] = $recette->remise;
                $TTCRecette[] = ((($recette->montantTVA/100)*$recette->montantHT)+$recette->montantHT-$recette->remise);
        }
        $calculTTC = array ($TVARecette[$numero]/100, $HTRecette[$numero],$remiseRecette[$numero], $TTCRecette[$numero]);
        echo ("La TVA est de ". $calculTTC[0]. "</br>");
        echo ("Soit un prix total de ".(($calculTTC[0]*$calculTTC[1])+$calculTTC[1])."</br>");
        echo ("La remise étant de ".$calculTTC[2]. "</br>");
        echo ("Soit un prix total de ".$calculTTC[3]."</br>");
        return $calculTTC;
        
    }
    /**
     * fonction qui calcul le prix TTC d'une depense avec les remises
     *
     * @param int $numero
     * @return void
     */
    public function calculdepense($numero){
        foreach ($this->depenseGlobal as $depense) {
                $TVADepense[] = $depense->montantTVADepense;
                $HTDepense[] = $depense->montantHTDepense;
                $remiseDepense[] = $depense->remiseDepense;
                $TTCDepense[] = ((($depense->montantTVADepense/100)*$depense->montantHTDepense)+$depense->montantHTDepense-$depense->remiseDepense);
        }
        $calculTTC = array ($TVADepense[$numero]/100, $HTDepense[$numero],$remiseDepense[$numero], $TTCDepense[$numero]);
        echo ("La TVA est de ". $calculTTC[0]) . "</br>";
        echo ("Soit un prix total de ".(($calculTTC[0]*$calculTTC[1])+$calculTTC[1])." \n");
        echo ("La remise étant de ".$calculTTC[2]. "</br>");
        echo ("Soit un prix total de ".$calculTTC[3]."</br>");
        return $calculTTC;
        
    }

    //calculer les recettes par periode choisie
    public function recettePeriode($dateReference){
        $totalRecette = 0;
        foreach ($this->recetteGlobal as $element){
            if ($element->dateRecette >= $dateReference){
                $totalRecette = ($totalRecette + (($element->montantTVA/100)*$element->montantHT)+$element->montantHT-$element->remise);
                echo("</br>".$totalRecette);
            }
        }
        return $totalRecette;
    }

    //calculer les depenses par periode choisie
    public function depensePeriode($dateReference){
        $totalDepense = 0;
        foreach ($this->depenseGlobal as $element){
            if ($element->dateDepense >= $dateReference){
                $totalDepense = ($totalDepense + (($element->montantTVADepense/100)*$element->montantHTDepense)+$element->montantHTDepense-$element->remiseDepense);
                echo("</br>".$totalDepense);
            }
        }
        return $totalDepense;
    }

}



//je creer mon bar objet avec ma liste des recettes et des dépenses.
$nibarsbar = new bar($listeRecette,$listeDepense);


//creation des recettes et depenses
//Je créé un nouvel objet recette
$recetteAdd =  new recette("irishCoffee", "27/01/2020", 8.5, $tva20,1,$sansContact);
//Je créé un nouvel objet depense
$depenseAdd =  new depense("futs de biere", "29/01/2020", 565, $tva55,52,$virement);




//ajout des objets recettes et depense dans mon objet nibarsbar
//j'applique la méthode d'addition d'une recette
$nibarsbar->addRecette($recetteAdd);
//j'applique la méthode d'addition d'une dépense
$nibarsbar->addDepense($depenseAdd);



//soustraction des recettes et des dépenses dans mon objet nibarsbar
//je spécifie quelle recette je souhaite supprimer en la transformant en objet
$recetteRemove = new recette("biere", "25/01/2020", 5, $tva20,0,$carte);
//je spécifie quelle recette je souhaite supprimer en la transformant en objet
$depenseRemove = new depense("palette coca", "18/01/2020", 1750, $tva55,130,$espece);




//var_dump($nibarsbar->removeRecette($recetteRemove));

// var_dump($nibarsbar->afficherRecette(18));

//var_dump($nibarsbar->calculRecette(18));

//var_dump($nibarsbar->removeDepense($depenseRemove));

//var_dump($nibarsbar->afficherDepense(8));

//var_dump($nibarsbar ->recetteGlobal);

//var_dump($nibarsbar->calculDepense(5));

var_dump($nibarsbar->recettePeriode("25/01/2020"));
var_dump($nibarsbar->depensePeriode("12/11/2019"));

echo(strtotime("now") . "<br>");
echo(strtotime("2015-11-12") . "<br>");



?>
