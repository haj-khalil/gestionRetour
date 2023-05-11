<?php
require_once("../modele/connexion.php");
require_once("../modele/articleClass.php");
class ArticleDAO
{
	private $bd; 
	private $select;
	function __construct()
	{
        $this->bd = new Connexion();
        
		$this->select = 'SELECT id_article, nom_article, montant_piece,
		quantite ,id_motif,id_retour
		
		FROM article ';
	}

	function insert(Article $Article): void
	{
		$this->bd->execSQL(
			"INSERT INTO article ( nom_article, montant_piece,
			quantite ,id_motif,id_retour)

			VALUES (:nom_article, :montant_piece,:quantite, :id_motif, :id_retour)",
			[':nom_article' => $Article->getNom_article(),
			':montant_piece' => $Article->getMontant_piece(),
			':quantite' => $Article->getQuantite(),
			':id_motif' => $Article->getId_motif(),
			':id_retour' => $Article->getId_retour()]
		);
	}
	

	function delete(string $id_article): void
	{
		$this->bd->execSQL(
			"DELETE FROM article WHERE id_article = :id_article",
			[':id_article' => $id_article]
		);
	}
// update article par un autre article 
	function update(Article $Article): void
	{
		$this->bd->execSQL(
			"UPDATE article SET nom_article=:nom_article, montant_piece=:montant_piece ,
			quantite=:quantite, id_motif=:id_motif, id_retour=:id_retour,

			WHERE id_article=:id_article",

			[':nom_article'     => $Article->getNom_article(),
			':montant_piece'    => $Article->getMontant_piece(),
			':quantite'         => $Article->getQuantite(),
			':id_motif'         => $Article->getId_motif(),
			':id_retour'        => $Article->getId_retour()]
		);
	}
	

	private function loadQuery(array $result): array
	{
		$Articles = [];
		foreach ($result as $row) {
			$Article = new Article();
			$Article->setId_article($row['id_article']);
			$Article->setNom_article($row['nom_article']);
			$Article->setMontant_piece($row['montant_piece']);
			$Article->setQuantite($row['quantite']);	
			$Article->setId_motif($row['id_motif']);	
			$Article->setId_retour($row['id_retour']);
			$Articles[] = $Article;
		}
		return $Articles;
	}

	function getAll(): array
	{
		return ($this->loadQuery($this->bd->execSQL($this->select)));
	}


	function getByIdArticle($id_article): Article
	{
		$unArticle = new Article();
		$lesArticles = $this->loadQuery($this->bd->execSQL($this->select .
		" WHERE id_article=:id_article", [':id_article' => $id_article]));
		if (count($lesArticles) > 0) {
			$unArticle = $lesArticles[0];
		}
		return $unArticle;
	}

	function existe(string $id_article): bool
	{
		$req 	= "SELECT *  FROM  article
					WHERE id_article = :id_article";
		$res 	= ($this->loadQuery($this->bd->execSQL($req, [':id_article' => $id_article])));
		return ($res != []);
	}

	
	function deleteArticle( $id_article){
        $this->bd->execSQL(" DELETE from article 
        where  id_article=:id_article"
        ,[':id_article' => $id_article]);
    }



}
	


