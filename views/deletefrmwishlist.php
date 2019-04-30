<?php

include_once "../core/wishlistC.php";
$wish1C=new WishListC();

if (isset($_GET["idProduit"])){
	$idProduit=$_GET['idProduit'];
	$wish1C->deleteFromWishListById($idProduit);
header('Location: afficherwishlist.php');
}

?>