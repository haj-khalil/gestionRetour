<?php
require_once("connexion.php");
require_once("retourByArticleClass.php");
require_once("retourDAO.php");
require_once("articleDAO.php");
class RetourByArticleDAO
{
    private $bd;
    private $select;

    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = 'SELECT id_retour,e.nom_ens ,date_achat, s.label ,date_envoi  , c.nom , c.prenom ,s.id_statut        from retour r ,   enseigne e ,statut s , client c 
        where r.id_ens =e.id_ens 
        and r.id_statut = s.id_statut
        and r.id_client=c.id_client';
    }

    function getAll(): array
    {
        return ($this->bd->execSQL($this->select));
    }

    function infoRetour(string $email)
    {

        return ($this->bd->execSQL(" SELECT id_retour,e.nom_ens ,date_achat, s.label ,date_envoi  , c.nom , c.prenom ,s.id_statut
        from retour r ,   enseigne e ,statut s , client c  
        where r.id_ens =e.id_ens 
        and r.id_statut = s.id_statut
        and r.id_client=c.id_client
        and c.email= :email ", [':email' => $email]));
    }

    function getAllArticleByIdRetour(int $id_retour)
    {
        return ($this->bd->execSQL(
            "  SELECT  id_article , nom_article , montant_piece , quantite ,motif   
        from article   
        inner join motif  on motif.id_motif = article.id_motif
        and id_retour = :id_retour;",
            [':id_retour' => $id_retour]
        ));
    }

    function montantTotaleRetour(int $id_retour)
    {

        return ($this->bd->execSQL("SELECT sum(montant_piece*quantite) as total
    from article 
    where id_retour= :id_retour", [':id_retour' => $id_retour]));
    }

    function deleteRetourByIdRetour(int $id_retour)
    {
        $this->bd->execSQL("DELETE from retour 
        where id_retour= :id_retour", [':id_retour' => $id_retour]);
    }

    function getMontantRetoursById_clientEtLabel(int $id_client, string $label)
    {
        $req = "SELECT sum(a.montant_piece*a.quantite) as total
        from retour r 
        inner join article a on  r.id_retour=a.id_retour
        inner join statut s on r.id_statut =s.id_statut
        where r.id_client=:id_client
        and s.label=:label";

        return $this->bd->execSQL($req, [':id_client' => $id_client, ':label' => $label]);
    }
    function getMontantRetoursById_clientEtLabelEnAttente(int $id_client, string $label)
    {
        $req = "SELECT sum(a.montant_piece*a.quantite) as total
        from retour r 
        inner join article a on  r.id_retour=a.id_retour
        inner join statut s on r.id_statut =s.id_statut
        where r.id_client=:id_client
        and s.label!=:label";

        return $this->bd->execSQL($req, [':id_client' => $id_client, ':label' => $label]);
    }
    function getHistoire()
    {
        $this->select = "SELECT id_changement ,user_id,time_date,table_affecte,event_nom,detaille
        from audit";

        return (($this->bd->execSQL($this->select)));
    }
}
