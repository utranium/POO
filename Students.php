<?php

// Créating student class
Class Student 
{
    /**
    *Student first name
    */
    public $firstName;

    /**
     * Student last name
     */
    public $lastName;

    /***
     * Student birthdate
     */
    private $birthDate;

    /**
     * Student sex
     */
    public $sex;

    /**
     * Student speciality (DEV-OPS)
     */
    public $speciality;

    /**
     * Student marks
     */
    public $marks;

    /**
     * Student marksAverage
     */
    public $marksAverage;

    /**
     * Student age
     */
    public $age;

    // Définir un constructeur
    /**
     * Constructeur
     *
     * @param String $firstName
     * @param String $lastName
     * @param String $birthDate
     * @param String $sex
     * @param String $speciality
     * @param Array $marks
     */
    public function __construct (
        String $firstName,
        String $lastName,
        String $birthDate,
        String $sex,
        String $speciality,
        Array $marks
    ){
        // on demande d'afficher la valeur de la variable "fisrtName" passée
        // en paramètre, a l'attribut "firstName" de la classe. Le "$this" permet
        // de faire référence a la classe courante (et donc un élément qui
        // s'y trouve)
        $this->firstName = $firstName;
        // on fait la meme chose pour tout les paramettre
        $this->lastName = $lastName;
        $this->birthDate = $birthDate;
        $this->sex = $sex;
        $this->speciality = $speciality;
        $this->marks = $marks;
        $this->age = $this->getAge();
        // On calcul ici la moyenne de l'étudiant, et on l'affecte a
        // l'attribut "marksAverage" pour ne pas a avoir a la recalculer
        $this->average(); 

    }
    

    // méthode qui renvoie la moyenne des notes
    /**
     * Method which calculate the average of the Student Marks
     * based on the "marks" attribute and set 
     *
     * @return void
     */
    public function average(): void
    {
        $this->marksAverage = array_sum($this->marks) / count($this->marks);
    }

    // méthode pour ajouter les notes
    /**
     * Method which add mark to the "marks" attribute array
     * 
     * @param int  $markToAdd
     * @return void
     */
    public function addMark(int $markToAdd): void
    {
        // on ajoute la nouvelle note au tableau "marks"
        $this->marks[] = $markToAdd;
        // on met a jour la moyenne
        $this->average();
    }

    // méthode pour modifier les notes
    /**
     * updtaemark
     *
     * @param integer $index
     * @param integer $newMark
     * @return void
     */
    public function updateMark(int $index, int $newMark) {
        if ($this->checkIndex($index)) {
            // on modifie la note
            $this->marks[index] = $newMark;
            //on recalcul la moyenne
            $this->Average();
        }
    }
    
    // méthode pour supprimer les notes
    /**
     * Method which remove mark to the "marks" attribute array
     * 
     *  @param int  $markToAdd
     *  @return void
     */
    public function removeMark(int $markRemove): void
    {
        unset($this->marks[$markRemove]);
        $this->marks = $array = array_values($this->marks);
        // on met a jour la moyenne
        $this->average();
    }

    /**
     * Method which returns whether an index exists in the marks array
     *
     * @param integer $index
     * @return Boolean
     */
    private function checkIndex(int $index): Bool
    {
        if (isset($this->marks[$index])){
            return True;
        }
        return False;
    }

    //@TODO
    // méthode pour qui renvoie l'age de l'etudiant
    public function getAge()
    {
        // $birthDate
        $currentDate = new DateTime();
        $dateOfBirth = date_create_from_format("d/m/Y", $this->birthDate);
        $age = $dateOfBirth->diff($currentDate)->y;
        return $age;
    }



}

// Test Ici :

// Students 1
$st1 = new Student("kevin", "niel", "01/01/2000", "H", "DEV", [0, 0, 1, 0]);


// Students 2
$st2 = new Student("Olivier", "Quillet", "25/04/1980", "H", "DEV", [16, 20, 17, 18]);

?>