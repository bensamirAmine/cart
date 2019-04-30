<?php
/**
 * 
 */
class WishList
{
	private $id;
	private $idUser;
	private $idProduit;


	function __construct($id,$idUser,$idProduit)
	{
		$this->id = $id;
		$this->idUser = $idUser;
		$this->idProduit = $idProduit;		

	}

		
	function getid(){
		return $this->id;
	}
	function getidUser(){
		return $this->idUser;
	}
	function getidProduit(){
		return $this->idProduit;
	}




	function setid($id){
		$this->id=$id;
	}
	function setidUser($idUser){
		$this->idUser=$idUser;
	}
	function setQuntite($idProduit){
		$this->idProduit=$idProduit;
	}

}

?>