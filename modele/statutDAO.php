<?php
require_once("connexion.php");
require_once("statutClass.php");

class StatutDAO
{
	private $bd;
	private $select;

	function __construct()
	{
		$this->bd = new Connexion();
		$this->select = 'SELECT 
		id_statut ,label 
		FROM statut ORDER BY id_statut';
	}

	function insert(string $nomStatut): void
	{
		$this->bd->execSQL(
			"INSERT INTO statut (label )
            VALUES (:label)",
			[
				":label" => $nomStatut
			]
		);
	}

	function delete(string $id_statut): void
	{
		$this->bd->execSQL(
			"DELETE FROM statut WHERE id_statut = :id_statut",
			[':id_statut' => $id_statut]
		);
	}



	private function loadQuery(array $result): array
	{
		$Statuts = [];
		foreach ($result as $row) {
			$Statut = new Statut();
			$Statut->setId_statut($row['id_statut']);
			$Statut->setLabel($row['label']);
			
			$Statuts[] = $Statut;
		}
		return $Statuts;
	}


	function getAll(): array
	{
		return ($this->loadQuery($this->bd->execSQL($this->select)));
	}


	function getById($id_statut)
	{
		$uneStatut = new Statut();

		$lesStatuts = $this->loadQuery($this->bd->execSQL(
			"SELECT id_statut ,label
			FROM statut WHERE
			id_statut= :id_statut",
			[
				":id_statut" => $id_statut
			]
		));

	return $lesStatuts;
    }

	function existeByLabel(string $label): bool | null
	{
		$req 	= "SELECT *  FROM  statut
			WHERE label = :label";
		$res 	= ($this->loadQuery($this->bd->execSQL($req, [':label' => $label])));
		return ($res != []);
	}
}
