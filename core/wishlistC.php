<?php
include_once "../config.php";

/**
 * 
 */
class WishListC
{
function rechercherWishlist($item)
{
	$sql="SELECT id from wishlist where idProduit=:item or idProduit = (SELECT idProduit from product where name=:item or price=:item ) ";
	$db = config::getConnexion();
	$stmt = $db->prepare($sql); 
	$stmt->bindValue(':item',$item);
	$stmt->execute(); 
	$row = $stmt->fetch();
	return $row;

}
function ajouterProduitToWishList($wishList)
{
	$sql="insert into wishList (idUser,idProduit) values ( :idUser,:idProduit)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $idUser=$wishList->getidUser();
        $idProduit=$wishList->getidProduit();


		$req->bindValue(':idUser',$idUser);
		$req->bindValue(':idProduit',$idProduit);	
           $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}

function totalProductInWishList($idUser)
{

	$total=0;
		$sql="SELECT * from wishlist where idUser=$idUser";
		$db = config::getConnexion();
		
		$liste1=$db->query($sql);
	foreach($liste1 as $row)
	{
		$total=$total+1;
	}

return $total;


}

function existanceProduitDansWishList($idProduit)
{
	$exist=0;
		$sql="SELECT * from wishlist";
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
function fetchWishList($idUser)
{
$sql="SELECT * from wishlist where idUser=$idUser";
$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}
function fetchWishListSearch($idUser,$id)
{
$sql="SELECT * from wishlist where idUser=$idUser and id=$id";
$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
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

function deleteFromWishListById($idProduit){
		$sql="DELETE FROM wishlist where 	idProduit= :idProduit";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idProduit',$idProduit);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function plusAjouter()
{
	
    $sql="SELECT       `idProduit`,
             COUNT(`idProduit`) AS `value_occurrence` 
    FROM     `wishlist`
    GROUP BY `idProduit`
    ORDER BY `value_occurrence` DESC
    LIMIT    1";
$db = config::getConnexion();
$stmt = $db->prepare($sql); 
$stmt->execute(); 
$row = $stmt->fetch();
return $row;
}
}
?>
