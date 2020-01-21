<?php

include 'Students.php';

Class Promotion
{
    /**
    *Students
    */
    public $students;

    /**
    *Number Students
    */
    public $numberStudents;

    //constructeur
    // Définir un constructeur
    /**
     * Constructeur
     *
     * @param Array $students
     * 
     */
    public function __construct (
        Array $students,
        int $countMen
    ){

        $this->countMen = $countMen;
        $this->students = $students;
        $this->numberStudents = $this->countStudentsNumber();
    }


    //nombre d'élève dans la promo
    public function countStudentsNumber()
    {
        $numberStudents = count($this->students);
        return $numberStudents;
    }

    //compter le nombre d'hommes
    public function countMen() {
        foreach ($this->students as $student)
        var_dump ($students->sex);
    }


    //nombre de femmes

    //nombre d'hommes

    //pourcentage hommes

    //pourcentage femmes

    //nombre d'étudiant pour chaque spécialité

    //pourcentage de chaque spécialité

    //moyenne de la classe

    //plus mauvais élève
    
    //meilleur élève

    //moyenne age

    //age minimun

    //age maximum

    //classer les élève par ordre alphabétique

    //nombre d'élèves ayant un nom OU un prenom contenant la lettre "a"

    //nombre d'élèves ayant uniquement le prenom contenant la lettre "u"

    //nombre d'élève nés avant 1999

    //nombre d'élève nés apres 2001
}

$prom1 = new Promotion([$st1,$st2]);

var_dump ($prom1);

echo $countMen;

?>