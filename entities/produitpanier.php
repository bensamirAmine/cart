<?php
/**
 * 
 */
class ProduitPanier1
{
	private $idProduitPanier;
	private $idProduit;
	private $quantite;
	private $idPanier;

	function __construct($idProduitPanier,$idProduit,$quantite,$idPanier)
	{
		$this->idProduitPanier = $idProduitPanier;
		$this->idProduit = $idProduit;
		$this->quantite = $quantite;		
		$this->idPanier = $idPanier;
	}


	function getidProduitPanier(){
		return $this->idProduitPanier;
	}
	function getidProduit(){
		return $this->idProduit;
	}
	function getQuantite(){
		return $this->quantite;
	}
	function getidPanier(){
		return $this->idPanier;		
	}



	function setidProduitPanier($idProduitPanier){
		$this->idProduitPanier=$idProduitPanier;
	}
	function setIdProduit($idProduit){
		$this->idProduit=$idProduit;
	}
	function setQuntite($quantite){
		$this->quantite=$quantite;
	}
	function setIdPanier($idPanier){
		$this->idPanier=$idPanier;
	}

}

?>