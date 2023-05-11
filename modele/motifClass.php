<?php

    class Motif
	{
		private $id_motif;
		private $motif;

		function __construct( int $id_motif=0,
		string $motif='') {

			$this->id_motif	    	=$id_motif;
			$this->motif		=$motif;

		}

        function setId_motif	   (int $id_motif)			{ $this->id_motif=$id_motif;	        		}
        function getId_motif	   () : int			    { return $this->id_motif;		        	}
		
		function getMotif 	       () : string			    { return $this->motif; 			}
		function setMotif	       (string $motif)		{ $this->motif=$motif; 			}
		
			
	
	}
