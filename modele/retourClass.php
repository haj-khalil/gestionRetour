<?php
    if(!class_exists('Retour')){
		class Retour
	{
		private $id_retour;
		private $date_achat;
		private $date_envoi;
        private $date_remboursement;
        private $id_client;
        private $id_ens;
        private $id_statut;

		function __construct( $id_retour=0,
		$date_achat='',  $date_envoi='', 
		$date_remboursement='',  $id_client = '', 
		$id_ens = '',  $id_statut = '') {

			$this->id_retour	    	=$id_retour;
			$this->date_achat		=$date_achat;

			$this->date_envoi	=$date_envoi;
            $this->date_remboursement	=$date_remboursement;
            $this->id_client	=$id_client;
            $this->id_ens	=$id_ens;
            $this->id_statut	=$id_statut;
            
		}

		function getId_retour	    	() 			    { return $this->id_retour;		        	}
		function setId_retour	    	( $id_retour)			{ $this->id_retour=$id_retour;	        		}
		
		function getDate_achat 	()			    { return $this->date_achat; 			}
		function setDate_achat	($date_achat)		{ $this->date_achat=$date_achat; 			}
		
		function getDate_envoi	()			{ return $this->date_envoi; 		}   
		function setDate_envoi	( $date_envoi)	{ $this->date_envoi=$date_envoi;  }		
        
		function getDate_remboursement	(){ return $this->date_remboursement; 		}   
		function setDate_remboursement	( $date_remboursement)
		{ $this->date_remboursement=$date_remboursement;  }		
		
		function getId_client	() 				{ return $this->id_client; 		}   
		function setId_client	( $id_client)	{ $this->id_client=$id_client;  }
				
		function getId_ens	() 				{ return $this->id_ens; 		}   
		function setId_ens	( $id_ens)	{ $this->id_ens=$id_ens;  }		
		
		function getId_statut	()				{ return $this->id_statut; 		}   
		function setId_statut	( $id_statut)	{ $this->id_statut=$id_statut;  }
	   function toArray()
		 {
			return array(
				'id_client' => $this->id_client,
				'id_statut' => $this->id_statut,
				'date_achat' => $this->date_achat,
				'date_envoi' => $this->date_envoi
			);
		}		
	
	}
}
?>