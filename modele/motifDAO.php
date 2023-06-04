<?php
require_once("connexion.php");
require_once("motifClass.php");

class MotifDAO
{
	private $bd;
	private $select;

	function __construct()
	{
		$this->bd = new Connexion();
		$this->select = 'SELECT 
		id_motif ,motif
		FROM motif 
        where etat_motif="actif"
        ORDER BY motif';
	}

	function insert(string $nomMotif): void
	{
		$this->bd->execSQL(
			"INSERT INTO motif (motif)
            VALUES (:motif)",
			[
				":motif" => $nomMotif
			]
		);
	}
    // activer un motif
    function activerMotif(string $nomMotif): void
    {
        $this->bd->execSQL(
            "UPDATE motif SET etat_motif='actif'
                WHERE motif = :nomMotif",
            [':nomMotif' => $nomMotif]
        );
    }
	function delete(string $id_motif): void
	{
		$this->bd->execSQL(
			"DELETE FROM motif WHERE id_motif = :id_motif",
			[':id_motif' => $id_motif]
		);
	}



	private function loadQuery(array $result): array
	{
		$Motifs = [];
		foreach ($result as $row) {
			$Motif = new Motif();
			$Motif->setId_motif($row['id_motif']);
			$Motif->setMotif($row['motif']);
			
			$Motifs[] = $Motif;
		}
		return $Motifs;
	}


	function getAll(): array
	{
		return ($this->loadQuery($this->bd->execSQL($this->select)));
	}


	function getById($id_motif)
	{
		$unMotif = new Motif();

		$lesMotifs = $this->loadQuery($this->bd->execSQL(
			"SELECT id_motif ,motif
			FROM motif WHERE
			id_motif= :id_motif",
			[
				":id_motif" => $id_motif
			]
		));

	return $lesMotifs;
    }

	function existeByMotif(string $motif): bool 
	{
		$req 	= "SELECT *  FROM  motif
			WHERE motif  = :motif";
		$res 	= ($this->loadQuery($this->bd->execSQL($req, [':motif' => $motif])));
		return ($res != []);
	}
    // vérifier si motif existe mais not actif 
	function existeMotifNotActif(string $motif): bool | null
	{
		$req 	= "SELECT *  FROM  motif
			WHERE etat_motif='inactif'
            and motif = :motif"
            ;
		$res 	= ($this->loadQuery($this->bd->execSQL($req, [':motif' => $motif])));
		return ($res != []);
	}
    
    // desactiver un statut
    function desactiverMotif(string $id_motif): void
    {
        $this->bd->execSQL(
            "UPDATE motif SET etat_motif='inactif'
                WHERE id_motif = :id_motif",
            [':id_motif' => $id_motif]
        );
    }
}
