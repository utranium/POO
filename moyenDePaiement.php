<?php

class moyenDePaiement{
    /**
     * 
     *
     * @var string
     */
    public $typeDePaiement;
    
    /**
     * constructeur de mes objet taux de la tva utilisée
     *
     * @param string $typeDePaiement
     */
    public function __construct(
        string $typeDePaiement
    ){
        $this->typeDePaiement = $typeDePaiement;
       
    }   
}

?>
