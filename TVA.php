<?php

class TVA{
    /**
     * 
     *
     * @var float
     */
    public $taux;
    
    /**
     * constructeur de mes objet taux de la tva utilisée
     *
     * @param TVA $taux
     */
    public function __construct(
        Float $taux
    ){
        $this->taux = $taux;
       
    }
    
}

?>
