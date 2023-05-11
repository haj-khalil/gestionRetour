<?php

    class Enseigne
	{
		private $id_ens;
		private $nom_ens;

		function __construct( int $id_ens=0,
		string $nom_ens='') {

			$this->id_ens	    	=$id_ens;
			$this->nom_ens		=$nom_ens;

		}

		function setId_ens	    	(int  $id_ens)			{ $this->id_ens=$id_ens;	        		}
		function getId_ens	    	() : int			    { return $this->id_ens;		        	}
		
		function setNom_ens	(string $nom_ens)		{ $this->nom_ens=$nom_ens; 			}
		function getNom_ens 	() : string			    { return $this->nom_ens; 			}
		
			
	
	}
