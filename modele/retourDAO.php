<?php
require_once("connexion.php");
require_once("articleClass.php");
require_once("RetourClass.php");
class RetourDAO
{
    private $bd;
    private $select;

    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = 'SELECT
		id_retour ,date_achat ,date_envoi  ,date_remboursement,  
		id_client  ,id_ens ,id_statut
		FROM retour ORDER BY id_retour';
    }
    function insert(array $Retour): void
    {
        $this->bd->execSQL(
            "INSERT INTO retour
		(id_client, id_statut, date_achat, id_ens, date_envoi)
        VALUES (:id_client,:id_statut,:date_achat,:id_ens,  
			:date_envoi)",
            [
                ":id_client" => $Retour[0],
                ":date_achat" => $Retour[1],
                ":date_envoi" => $Retour[2],
                ":id_ens" => $Retour[3],
                ":id_statut" => $Retour[4]
            ]
        );
    }

    function delete(string $id_retour): void
    {
        $this->bd->execSQL(
            "DELETE FROM retour WHERE id_retour = :id_retour",
            [':id_retour' => $id_retour]
        );
    }


    function update(array $Retour): void
    {
        $this->bd->execSQL(
            "UPDATE retour SET id_client=:id_client, date_achat=:date_achat, 
			date_envoi=:date_envoi, id_ens=:id_ens,
			id_statut=:id_statut
			WHERE id_retour=:id_retour",
            [
                ":id_client" => $Retour[0],
                ":date_achat" => $Retour[1],
                ":date_envoi" => $Retour[2],
                ":id_ens" => $Retour[3],
                ":id_statut" => $Retour[4]
            ]
        );
    }

    private function loadQuery(array $result): array
    {
        $Retours = [];
        foreach ($result as $row) {
            $Retour = new Retour();
            $Retour->setId_retour($row['id_retour']);
            $Retour->setDate_achat($row['date_achat']);
            $Retour->setDate_envoi($row['date_envoi']);
            $Retour->setDate_remboursement($row['date_remboursement']);
            $Retour->setId_client($row['id_client']);
            $Retour->setId_ens($row['id_ens']);
            $Retour->setId_statut($row['id_statut']);
            $Retours[] = $Retour;
        }
        return $Retours;
    }

    function getAll(): array
    {
        return ($this->loadQuery($this->bd->execSQL($this->select)));
    }

    function getById($id_retour): Retour
    {
        $unRetour = new Retour(); //

        $lesRetours = $this->loadQuery($this->bd->execSQL(
            "SELECT id_retour ,date_achat ,date_envoi  ,date_remboursement,  
			id_client  ,id_ens ,id_statut
			FROM retour WHERE
			id_retour= :id_retour",
            [
                ":id_retour" => $id_retour
            ]
        ));

        if (count($lesRetours) > 0) {
            $unRetour = $lesRetours[0];
        }
        return $unRetour;
    }


    function existe(int $id_retour): bool | null
    {
        $req     = "SELECT *  FROM  retour
				
				
					WHERE id_retour = :id_retour";
        $res     = ($this->loadQuery($this->bd->execSQL($req, [':id_retour' => $id_retour])));
        return ($res != []);
    }

    function insertRetour(
        int $id_ens,
        int $id_statut,
        int $id_client,
        string     $date_achat,
        string     $date_remb,
        string     $date_envoie

    ) {
        $this->bd->execSQL(
            "INSERT INTO retour
(date_achat,date_envoi,date_remboursement,id_client,id_ens,id_statut)
	VALUES (:date_achat,:date_envoi,:date_remboursement,  
:id_client,:id_ens,:id_statut)",
            [
                ':date_achat' => $date_achat,
                ':date_envoi' => $date_envoie,
                ':date_remboursement' => $date_remb,
                ':id_client' => $id_client,
                ':id_ens' => $id_ens,
                ':id_statut' => $id_statut

            ]
        );
    }

    function udateRetourStatut(int $id_statut, int $id_retour)
    {

        $this->bd->execSQL(
            "UPDATE retour SET  
		id_statut =:id_statut
		WHERE id_retour=:id_retour",
            [
                ":id_retour" => $id_retour,
                ":id_statut" => $id_statut
            ]
        );
    }
    function udateDateRemboursement(int $id_retour, string $date_remboursement)
    {
        $this->bd->execSQL(
            "UPDATE retour SET  
		date_remboursement =:date_remboursement
		WHERE id_retour=:id_retour",
            [
                ":id_retour" => $id_retour,
                ":date_remboursement" => $date_remboursement
            ]
        );
    }
}
