<?php
/**
 * 
 */
class Avis
{
	private $id;
	private $idProduit;
	private $idUser;
	private $date;
	private $comment;

	function __construct($id,$idProduit,$idUser,$date,$comment)
	{
		$this->id=$id;
		$this->idProduit = $idProduit;
		$this->idUser = $idUser;
		$this->date = $date;		
		$this->comment = $comment;
	}

	function getid()
	{
		return $this->id;
	}
	function getidProduit(){
		return $this->idProduit;
	}
	function getidUser(){
		return $this->idUser;
	}
	function getdate(){
		return $this->date;
	}
	function getcomment(){
		return $this->comment;		
	}



	function setidProduit($idProduit){
		$this->idProduit=$idProduit;
	}
	function setidUser($idUser){
		$this->idUser=$idUser;
	}
	function setdate($date){
		$this->date=$date;
	}
	function setcomment($comment){
		$this->comment=$comment;
	}

}

?>