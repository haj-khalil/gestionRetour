<?php
class Article
{
	private $id_article;
	private $nom_article;
	private $montant_piece;
	private $quantite;
	private $id_motif;
	private $id_retour;

	function __construct(
		string $id_article = '',
		string $nom_article = '',
		float $montant_piece = 0.00,
		int $quantite = 1,
		int $id_motif = 0,
		int $id_retour = 0,
	) {
		$this->id_article	    	= $id_article;
		$this->nom_article		= $nom_article;
		$this->montant_piece= $montant_piece;
		$this->quantite	= $quantite;
		$this->id_motif	= $id_motif;
		$this->id_retour	= $id_retour;
	}

	function getId_article(): string
	{
		return $this->id_article;
	}
	function setId_article(string $id_article)
	{
		$this->id_article = $id_article;
	}

	function getNom_article(): string
	{
		return $this->nom_article;
	}
	function setNom_article(string $nom_article)
	{
		$this->nom_article = $nom_article;
	}

	function getMontant_piece(): float
	{
		return $this->montant_piece;
	}
	function setMontant_piece(float $montant_piece)
	{
		$this->montant_piece = $montant_piece;
	}

	function getQuantite(): int
	{
		return $this->quantite;
	}
	function setQuantite(string $quantite)
	{
		$this->quantite = $quantite;
	}

	function getId_motif(): int
	{
		return $this->id_motif;
	}
	function setId_motif(int $id_motif)
	{
		$this->id_motif = $id_motif;
	}

	function getId_retour(): int
	{
		return $this->id_retour;
	}
	function setId_retour(int $id_retour)
	{
		$this->id_retour = $id_retour;
	}
}
