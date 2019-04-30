<?php
include "../config.php";

/**
 * 
 */
class PanierC
{
function dernierPanierDeUser($idUser)
		{
		$sql="SELECT * FROM panier WHERE idPanier=(
    SELECT max(idPanier) FROM panier WHERE idUser= $idUser )";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
		}
function ajouterPanier($idUser)
{
	$etat=1;
	$idPanier=1;
	$liste=$this->dernierPanierDeUser($idUser);
	foreach($liste as $row)
	{
		$idPanier=$row['idPanier'];
		$etat=$row['etat'];
		$dateCreation=$row['dateCreation'];
	}
	if($etat==1)
	{
		$sql="insert into panier (idUser,dateCreation,etat) values (:idUser,:dateCreation, :etat)";
			$db = config::getConnexion();
			try
			{
	        $req=$db->prepare($sql);
	        $idUser=$idUser;
	        $dateCreation=date('Y-m-d');
	        $etat=0;
			$req->bindValue(':idUser',$idUser);
			$req->bindValue(':dateCreation',$dateCreation);
			$req->bindValue(':etat',$etat);
			
	            $req->execute();
	        }       
	     catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

        return $idPanier+1;
	}
	 return $idPanier;

}

function totalProductInCart($idUser)
{
	$idPanier=1;
	$total=0;
	$liste=$this->dernierPanierDeUser($idUser);
	foreach($liste as $row)
	{
		$idPanier=$row['idPanier'];
	}

		$sql="SELECT * from panierproduit where idPanier=$idPanier";
		$db = config::getConnexion();
		
		$liste1=$db->query($sql);
	foreach($liste1 as $row)
	{
		$total=$total+1;
	}

return $total;


}

function getProductPrice($idProduit)
{
	
		$sql="SELECT price from product where id=$idProduit";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }


	/*$sql1="SELECT price from product where id=$idProduit";
	$db = config::getConnexion();
	$prix=$db->query($sql1);
	return $prix;*/
}
function totalPriceInCart($idUser)
{
	$idPanier=1;
	$totalPrix=0;
	$liste=$this->dernierPanierDeUser($idUser);
	foreach($liste as $row)
	{
		$idPanier=$row['idPanier'];
	}

		$sql="SELECT * from panierproduit where idPanier=$idPanier";
		$db = config::getConnexion();
		
		$liste1=$db->query($sql);
	foreach($liste1 as $row)
	{
		$idProduit=$row['idProduit'];
		$quantite=$row['quantite'];
		$result=$this->getProductPrice($idProduit);
		
		foreach($result as $row)
		{
		$prix=$row['price']*$quantite;
		$totalPrix=$totalPrix+$prix;
		}
		
	}

return $totalPrix;


}
function updateSomme($idUser)
{
	$somme = $this->totalPriceInCart($idUser);
	$liste=$this->dernierPanierDeUser($idUser);
	foreach($liste as $row)
	{
		$idPanier=$row['idPanier'];
	}
	$sql="UPDATE panier SET somme=:somme WHERE idPanier=:idPanier";
	$db = config::getConnexion();
		try
		{
        	$req=$db->prepare($sql);
			$req->bindValue(':idPanier',$idPanier);
			$req->bindValue(':somme',$somme);
            $req->execute();
        }
        catch (Exception $e)
        {
       	    echo " Erreur ! ".$e->getMessage();
        }

}

function totalPriceInCartByidPanier($idPanier)
{
	$totalPrix=0;


		$sql="SELECT * from panierproduit where idPanier=$idPanier";
		$db = config::getConnexion();
		
		$liste1=$db->query($sql);
	foreach($liste1 as $row)
	{
		$idProduit=$row['idProduit'];
		$quantite=$row['quantite'];
		$result=$this->getProductPrice($idProduit);
		
		foreach($result as $row)
		{
		$prix=$row['price']*$quantite;
		$totalPrix=$totalPrix+$prix;
		}
		
	}

return $totalPrix;
}

function plusAjouter()
{
	
    $sql="SELECT       `idProduit`,
             COUNT(`idProduit`) AS `value_occurrence` 
    FROM     `panierproduit`
    GROUP BY `idProduit`
    ORDER BY `value_occurrence` DESC
    LIMIT    1";
$db = config::getConnexion();
$stmt = $db->prepare($sql); 
$stmt->execute(); 
$row = $stmt->fetch();
return $row;
}
function existanceProduitDansPanier($idPanier,$idProduit)
{
	$exist=0;
		$sql="SELECT * from panierproduit where idPanier=$idPanier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		foreach($liste as $row)
		{
			if ($row['idProduit'] == $idProduit)
			{
				$exist =1;		
			}
		}
		return $exist;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}

function fetchProductDetails($idProduit)
{
$sql="SELECT * from product where id=$idProduit";
$db = config::getConnexion();
$stmt = $db->prepare($sql); 
$stmt->execute(); 
$row = $stmt->fetch();
return $row;
}
function afficherpaniers(){
		
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

}
?>
