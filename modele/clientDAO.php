<?php
require_once("clientClass.php");
require_once("connexion.php");

class ClientDAO
{
	private $bd;
	private $select;

	function __construct()
	{
		$this->bd = new Connexion();
		$this->select = 'SELECT
		id_client ,nom ,prenom  ,email,  
		address  ,tel ,mdp,naissance ,etat_client
		FROM client 
        ORDER BY id_client';
	}

	function insert(Client $Client): void
	{
		
			$req="INSERT INTO client
		(prenom,nom,email,address,tel,mdp,naissance,etat_client)
            VALUE (:nom, :prenom, :email, :address, :tel, :mdp, :naissance, :etat_client)";

        $this->bd->execSQL($req ,
			[
                ":prenom" => $Client->getPrenom(),
				":nom" => $Client->getNom(),
				":email" => $Client->getEmail(),
				":address" => $Client->getAddress(),
				":tel" => $Client->getTel(),
				":mdp" => $Client->getMdp(),
				":naissance" => $Client->getNaissance(),
				":etat_client" => $Client->getEtat_client()
			]
		);
	}

	function delete(string $id_client): void
	{
		$this->bd->execSQL(
			"DELETE FROM client WHERE id_client = :id_client",
			[':id_client' => $id_client]
		);
	}
    // desactiver le client 
	function desactiver(string $id_client): void
	{
		$this->bd->execSQL(
			"UPDATE  client
            set etat_client='inactif'
            WHERE id_client = :id_client",
			[':id_client' => $id_client]
		);
	}
    // activer le client 
	function activer(string $id_client): void
	{
		$this->bd->execSQL(
			"UPDATE  client
            set etat_client='actif'
            WHERE id_client = :id_client",
			[':id_client' => $id_client]
		);
	}

	function update(Client $Client): void
	{
		$this->bd->execSQL(
			"UPDATE client SET  
			nom,prenom,email,address,tel,mdp,naissance
			WHERE id_client=:id_client",
			[
				":nom" => $Client->getNom(),
				":prenom" => $Client->getPrenom(),
				":email" => $Client->getEmail(),
				":address" => $Client->getAddress(),
				":tel" => $Client->getTel(),
				":mdp" => $Client->getMdp(),
				":naissance" => $Client->getNaissance(),
				":etat_client" => $Client->getEtat_client()
			]
		);
	}

	private function loadQuery(array $result): array
	{
		$Clients = [];
		foreach ($result as $row) {
			$Client = new Client();

			$Client->setId_client($row['id_client']);
			$Client->setNom($row['nom']);
			$Client->setPrenom($row['prenom']);
			$Client->setEmail($row['email']);
			$Client->setAddress($row['address']);
			$Client->setTel($row['tel']);
			$Client->setMdp($row['mdp']);
			$Client->setNaissance($row['naissance']);
			$Client->setEtat_client($row['etat_client']);

			$Clients[] = $Client;
		}
		return $Clients;
	}

	function getAll(): array
	{
		return ($this->loadQuery($this->bd->execSQL($this->select)));
	}


	function existeTel(string $tel): bool 
	{
		$req 	= "SELECT *  FROM  client
				
				
					WHERE tel = :tel";
		$res 	= ($this->loadQuery($this->bd->execSQL($req, [':tel' => $tel])));
		return ($res != []);
	
	}
	function existeEmail(string $email): bool 
	{
		$req 	= "SELECT *  FROM  client
				
				
					WHERE email = :email";
		$res 	= ($this->loadQuery($this->bd->execSQL($req, [':email' => $email])));
		return ($res != []);
	}


}

