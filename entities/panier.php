<?php
/**
 * 
 */
class Produitpanier
{
	private $idPanier;
	private $idUser;
	private $datCreation;
	private $etat;

	function __construct($idPanier,$idUser,$datCreation,$etat)
	{
		$this->idPanier = $idPanier;
		$this->idUser = $idUser;
		$this->datCreation = $datCreation;		
		$this->etat = $etat;
	}

		
	function getidPanier(){
		return $this->idPanier;
	}
	function getidUser(){
		return $this->idUser;
	}
	function getdatCreation(){
		return $this->datCreation;
	}
	function getetat(){
		return $this->etat;		
	}



	function setidPanier($idPanier){
		$this->idPanier=$idPanier;
	}
	function setidUser($idUser){
		$this->idUser=$idUser;
	}
	function setQuntite($datCreation){
		$this->datCreation=$datCreation;
	}
	function setetat($etat){
		$this->etat=$etat;
	}

}

?>