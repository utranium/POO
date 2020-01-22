<?php
/**
 * Class Student
 * 
 * @author Kévin NIEL
 */

/**
 * Creating student class
 */
Class Student
{
	/**
	 * Student first name
	 */
	public $firstName;

	/**
	 * Student last name
	 */
	public $lastName;

	/**
	 * Student birth date
	 */
	private $birthDate;

	/**
	 * student sex
	 */
	public $sex;

	/**
	 * student wishing speciality (DEV/OPS)
	 */
	public $speciality;

	/**
	 * Student marks
	 */
	public $marks;

	/**
	 * Student marks average
	 */
	public $marksAverage;

	/**
	 * Student age
	 */
	public $age;

	/**
	 * Constructor
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
	) {
		// on demande d'affecter la valeur de la variable "firstName" passée
		// en paramètre, à l'attribut "firstName" de la classe. Le "$this" permet
		// de faire référence à la classe courante (et donc un élément qui
		// s'y trouve)
		$this->firstName = $firstName;
		// on fait la même chose pour tous les paramètres
		$this->lastName = $lastName;
		$this->birthDate = $birthDate;
		$this->sex = $sex;
		$this->speciality = $speciality;
		$this->marks = $marks;
		// On calcul ici la moyenne de l'étudiant, et on l'affecte à
		// l'attribut "marksAverage" pour ne pas avoir à refaire le calcul
		// de la moyenne plusieurs fois
		$this->average();
		// On définit l'age de l'étudiant grâce à sa date de naissance
		$this->age = $this->getAge();
	}

	/**
	 * Method which calculate the average of the Student Marks
	 * based on the "marks" attribute and set it to the marksAverage
	 * attribute
	 *
	 * @return void
	 */
	public function average(): void
	{
		$this->marksAverage = array_sum($this->marks) / count($this->marks);
	}

	/**
	 * Method which add a mark to the "marks" attribute array
	 *
	 * @param int $markToAdd
	 * @return void
	 */
	public function addMark(int $markToAdd): void
	{
		// on ajoute la nouvelle note au tableau "marks"
		$this->marks[] = $markToAdd;
		// on met à jour la moyenne
		$this->average();
	}

	/**
	 * Method which remove a mark in the array marks attribute
	 *
	 * @param integer $index
	 * @return void
	 */
	public function removeMark(int $index): void
	{
		if ($this->checkIndex($index)) {
			// on supprime l'index du tableau
			unset($this->marks[$index]);
			// On remet en forme les index du tableau
			$this->marks = array_values($this->marks);
			// On recalcul la moyenne
			$this->Average();
		}
	}

	/**
	 * Method which update a mark based on the index in the 
	 * mars array attribute
	 *
	 * @param integer $index
	 * @param integer $newMark
	 * @return void
	 */
	public function updateMark(int $index, int $newMark): void
	{
		if ($this->checkIndex($index)) {
			// on modifie la note
			$this->marks[$index] = $newMark;
			// On recalcul la moyenne
			$this->Average();
		}
	}

	/**
	 * Method which returns whether an index exists in the 
	 * marks array
	 *
	 * @param integer $index
	 * @return bool
	 */
	private function checkIndex(int $index): bool
	{
		if (isset($this->marks[$index])
			&& !empty($this->marks[$index])
			&& !is_null($this->marks[$index])
		) {
			return True;
		}
		return False;
	}

	/**
	 * Method which returns the age of the student basing
	 * on his birthdate
	 *
	 * @return integer
	 */
	public function getAge(): int
	{
		$currentDate = new DateTime();
		$dateOfBirth = date_create_from_format("d/m/Y", $this->birthDate);
		$age = $dateOfBirth->diff($currentDate)->y;
		return $age;
	}

	/**
	 * Method returning true if the current student
	 * is a male. False if the student is a woman
	 *
	 * @return bool
	 */
	public function isMale(): bool
	{
		if ($this->sex == 'H') {
			return True;
		}
		return False;
	}

	/**
	 * Method returning true if the current student
	 * is a DEV. False if the student is an OPS
	 *
	 * @return bool
	 */
	public function isDev(): bool
	{
		if ($this->speciality == 'DEV') {
			return True;
		}
		return False;
	}

}

// On fait nos tests ici
// $st1 = new Student("kevin", "niel", "22/01/2000", "H", "DEV", [0, 0, 1, 0]);
// echo("<pre>");
// echo("<code>");
// var_dump($st1);
// echo("</code>");
// echo("</pre>");

// afficher uniquement le prénom de l'étudiant
// echo $st1->firstName;

// Afficher la moyenne des notes
// echo("<br>");
// echo $st1->average();

// ajout d'une note et affichage du tableau de notes
// $st1->addMark(10);
// echo("<pre>");
// echo("<code>");
// var_dump($st1);
// echo("</code>");
// echo("</pre>");

// Suppression d'une note a l'index 2
// $st1->removeMark(2);

// Modification d'une note (changement de l'index 1 en la note "15")
// $st1->updateMark(1, 15);

// On veut afficher l'âge de l'étudiant
// var_dump($st1->age);

// echo("<pre>");
// echo("<code>");
// var_dump($st1->marks);
// echo("</code>");
// echo("</pre>");