

<?php

class Connexion {
	private $db;

	function __construct() {
	
        $db_config['SGBD']		= 'mysql';
		$db_config['HOST']		= '127.0.0.2:3307';
		$db_config['DB_NAME']	= 'sae4';
		$db_config['USER']		= 'root';
		$db_config['PASSWORD']	= '';
        /*  $db_config['SGBD']		= 'mysql';
		$db_config['HOST']		= 'devbdd.iutmetz.univ-lorraine.fr';
		$db_config['DB_NAME']	= 'hajkhali1u_sae4';
		$db_config['USER']		= 'hajkhali1u_appli';
		$db_config['PASSWORD']	= '32219666'; */
		try
		{
			$this->db = new PDO($db_config['SGBD'] .':host='. $db_config['HOST'] .';dbname='. $db_config['DB_NAME'],
								$db_config['USER'],	$db_config['PASSWORD'],
								array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
								// permet d’afficher les caractères utf8 si la BdD est définie en utf8 (accents...)						
			unset($db_config);
		}
		catch( Exception $exception )
		{
			
			die($exception->getMessage()) ;
		}
	}

	function execSQL(string $req, array $valeurs=[]) : array {
		try
		{	
			$sql=$this->db->prepare($req); 
			$sql->execute($valeurs);
			return $sql->fetchAll(PDO::FETCH_ASSOC);// retourne uniquement chaque ligne sous forme d'un tableau associatif (clé) sinon retourne chaque ligne avec double colonne : indice et clé
		}
		catch( Exception $exception )
		{
			die($exception->getMessage()) ;
			$sql=[];
		}
		return $sql;
	}
    

    
}


?>


