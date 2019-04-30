<?php
include_once "../config.php";

/**
 * 
 */
class ProduitpanierC
{
function rechercherProduit($item)
{
	$sql="SELECT idProduitPanier from panierproduit where idProduit=:item or idProduit = (SELECT idProduit from product where name=:item or price=:item ) ";
	$db = config::getConnexion();
	$stmt = $db->prepare($sql); 
	$stmt->bindValue(':item',$item);
	$stmt->execute(); 
	$row = $stmt->fetch();
	return $row;

}
	function ajouterProduitAuPanier($panierproduit){
		$sql="insert into panierproduit (idProduit,quantite,idPanier) values ( :idProduit,:quantite, :idPanier)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
     
        $idProduit=$panierproduit->getidProduit();
        $quantite=$panierproduit->getQuantite();
        $idPanier=$panierproduit->getidPanier();
		
		$req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':quantite',$quantite);
		$req->bindValue(':idPanier',$idPanier);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}


	function fetchPanierproduitProducts(){

		$sql="SElECT * From panierproduit";
		$db = config::getConnexion();
		try{
		$listeDesProduits=$db->query($sql);
		return $listeDesProduits;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

	function deleteFromPanierproduitById($idPanierProduit){
		$sql="DELETE FROM panierproduit where 	idProduitPanier= :idPanierProduit";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idPanierProduit',$idPanierProduit);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function getProductQte($idProduit,$idPanier)
	{
		$sql="SELECT quantite from panierproduit where (idProduit=$idProduit AND idPanier=$idPanier)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		foreach($liste as $row)
		{
			$qte=$row['quantite'] ;
		}
		return $qte;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function getProductDetailsByIdProduit($idProduit)
	{
		$sql="SELECT * from product where (id=$idProduit)";
		$db = config::getConnexion();
$stmt = $db->prepare($sql); 
$stmt->execute(); 
$row = $stmt->fetch();
return $row;
	}

	function updateQuantity($idProduit,$idPanier){
		$quantite=$this->getProductQte($idProduit,$idPanier);
		$sql="UPDATE panierproduit SET quantite=:quantite WHERE idProduit=:idProduit AND idPanier=:idPanier";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
		try
		{
        	$req=$db->prepare($sql);
        	$nQuantite=$quantite+1;

			$req->bindValue(':idProduit',$idProduit);
			$req->bindValue(':idPanier',$idPanier);
			$req->bindValue(':quantite',$nQuantite);

		
		
            	$s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e)
        {
       	    echo " Erreur ! ".$e->getMessage();
   			echo " Les datas : " ;
  			print_r($datas);
        }
		
	}


		function fetchProductsByIdPanier($idPanier)
		{
		$sql="SELECT * from panierproduit where idPanier=$idPanier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		}

		function modifierQuantite($idProduitPanier,$quantite)
		{
			$sql="UPDATE panierproduit SET quantite=:quantite WHERE idProduitPanier=:idProduitPanier";
		
		$db = config::getConnexion();

		try
		{
        	$req=$db->prepare($sql);
			$req->bindValue(':idProduitPanier',$idProduitPanier);
			$req->bindValue(':quantite',$quantite);
            	$s=$req->execute();
        }
        catch (Exception $e)
        {
       	    echo " Erreur ! ".$e->getMessage();

        }
		}
}




?>
