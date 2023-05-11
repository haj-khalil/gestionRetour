<?php

    class Statut
	{
		private $id_statut;
		private $label;

		function __construct( int $id_statut=0,
		string $label='') {

			$this->id_statut	    	=$id_statut;
			$this->label		=$label;

		}

		function getId_statut	    	() : int			    { return $this->id_statut;		        	}
		function setId_statut	    	(int $id_statut)			{ $this->id_statut=$id_statut;	        		}
		
		function getLabel 	() : string			    { return $this->label; 			}
		function setLabel	(string $label)		{ $this->label=$label; 			}
		
			
	
	}
