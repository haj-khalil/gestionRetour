
<?php
	require_once("retourClass.php");
	require_once("articleClass.php");

    class RetourByArticle
	{
		private $id_article;
		private $id_retour;
		

		function __construct(Retour $id_retour=null, Article $id_article= null) {
			$this->id_retour=$id_retour;
			$this->id_article = $id_article;	

		}

		function getRetour	  () : Retour			    { return $this->id_retour;		        	}
		function setRetour	  (string $id_retour)			{ $this->id_retour=$id_retour;	        		}
		function getArticle 	() : Article			    { return $this->id_article; 			}
		function setArticle	(string $id_article)		{ $this->id_article=$id_article; 			}
			
		
		
	}
