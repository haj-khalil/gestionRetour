<?php
require_once("connexion.php");
require_once("enseigneClass.php");

class EnseigneDAO
{
	private $bd;
	private $select;

	function __construct()
	{
		$this->bd = new Connexion();
		$this->select = 'SELECT 
		id_ens ,nom_ens 
		FROM enseigne ORDER BY id_ens';
	}

	function insert(string $Enseigne): void /////** 
	{
		$this->bd->execSQL(
			"INSERT INTO enseigne (nom_ens )
            VALUES (:nom_ens)",
			[
				":nom_ens" => $Enseigne
			]
		);
	}

	function delete(int $id_ens): void
	{
		$this->bd->execSQL(
			"DELETE FROM enseigne WHERE id_ens = :id_ens",
			[':id_ens' => $id_ens]
		);
	}



	private function loadQuery(array $result): array
	{
		$Enseignes = [];
		foreach ($result as $row) {
			$Enseigne = new Enseigne();
			$Enseigne->setId_ens($row['id_ens']);
			$Enseigne->setNom_ens($row['nom_ens']);
			
			$Enseignes[] = $Enseigne;
		}
		return $Enseignes;
	}


	function getAll(): array
	{
		return ($this->loadQuery($this->bd->execSQL($this->select)));
	}


	function getById($id_ens)
	{
		$uneEnseigne = new Enseigne();

		$lesEnseignes = $this->loadQuery($this->bd->execSQL(
			"SELECT id_ens ,nom_ens
			FROM enseigne WHERE
			id_ens= :id_ens",
			[
				":id_ens" => $id_ens
			]
		));

	return $lesEnseignes;
    }
	function existeByNom_ens(string $nom_ens): bool ///////**
	{
		$req = "SELECT *  FROM  enseigne
			WHERE nom_ens = :nom_ens";
		$res = ($this->loadQuery($this->bd->execSQL($req, [':nom_ens' => $nom_ens])));
		return ($res != []);
	}
}
