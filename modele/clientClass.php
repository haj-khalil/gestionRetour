
<?php
class Client
{
	private $id_client;
	private $nom;
	private $prenom;
	private $email;
	private $address;
	private $tel;
	private $mdp;
	private $naissance;
    private $etat_client;

	function __construct(
		int $id_client = 0,
		string $nom = '',
		string $prenom = '',
		string $email = '',
		string $address = '',
		string $tel = "",
		string $mdp = '',
		string $naissance = '',
        string $etat_client='actif'
	) {
		$this->id_client	    	= $id_client;
		$this->nom		            = $nom;
		$this->prenom	            = $prenom;
		$this->email	            = $email;


		$this->address  	= $address;
		$this->tel          = $tel;
		$this->mdp     	    = $mdp;
		$this->naissance	= $naissance;
		$this->etat_client	= $etat_client;
	}

	function getId_client(): int
	{
		return $this->id_client;
	}
	function setId_client(int $id_client)
	{
		$this->id_client = $id_client;
	}

	function getNom(): string
	{
		return $this->nom;
	}
	function setNom(string $nom)
	{
		$this->nom = $nom;
	}

	function getPrenom(): string
	{
		return $this->prenom;
	}
	function setPrenom(string $prenom)
	{
		$this->prenom = $prenom;
	}

	function getEmail(): string
	{
		return $this->email;
	}
	function setEmail(string $email)
	{
		$this->email = $email;
	}

	function getAddress(): string
	{
		return $this->address;
	}
	function setAddress(string $address)
	{
		$this->address = $address;
	}
	function getTel(): string
	{
		return $this->tel;
	}
	function setTel(string $tel)
	{
		$this->tel = $tel;
	}

	function getMdp(): string
	{
		return $this->mdp;
	}
	function setMdp(string $mdp)
	{
		$this->mdp = $mdp;
	}

	function getNaissance(): string
	{
		return $this->naissance;
	}
	function setNaissance(string $naissance)
	{
		$this->naissance = $naissance;
	}
	function getEtat_client(): string
	{
		return $this->etat_client;
	}
	function setEtat_client(string $etat_client)
	{
		$this->etat_client = $etat_client;
	}
}
