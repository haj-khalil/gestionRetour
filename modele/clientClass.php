
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

	function __construct(
		int $id_client = 0,
		string $nom = '',
		string $prenom = '',
		string $email = '',
		string $address = '',
		int $tel = 0,
		string $mdp = '',
		string $naissance = ''
	) {
		$this->id_client	    	= $id_client;
		$this->nom		= $nom;
		$this->prenom	= $prenom;
		$this->email	= $email;


		$this->address	= $address;
		$this->tel = $tel;
		$this->mdp	= $mdp;
		$this->naissance	= $naissance;
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
	function getTel(): int
	{
		return $this->tel;
	}
	function setTel(int $tel)
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
}
