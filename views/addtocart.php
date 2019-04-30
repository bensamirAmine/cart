<?PHP
session_start();
include "../entities/panier.php";
include "../core/panierC.php";
include "../entities/produitpanier.php";
include "../core/produitpanierC.php";
include "../entities/wishList.php";
include "../core/wishListC.php";
if ( isset($_POST['submit']))
{
if ( isset($_POST['idProduit']) and isset($_POST['quantite']))
{
$panier1C= new  PanierC();

$is_available = 0;

$idUser=$_GET['idUser'];
$_SESSION['idPanier']=$panier1C->ajouterPanier($idUser);
$idPanier=$_SESSION['idPanier'];
	echo $idPanier;
	echo "fou9";
$produitpanier1=new ProduitPanier1(0,$_POST['idProduit'],$_POST['quantite'],$idPanier);
//Partie2
/*
var_dump($produitpanier1);
}
*/
//Partie3
$idProduit=$_POST['idProduit'];
$Produitpanier1C=new ProduitpanierC();
$is_available =$panier1C->existanceProduitDansPanier($idPanier,$idProduit);
echo "is_available";
echo $is_available;
if ($is_available == 0) {
	$Produitpanier1C->ajouterProduitAuPanier($produitpanier1);
	$panier1C->updateSomme($idUser);
}else{
	$Produitpanier1C->updateQuantity($idProduit,$idPanier);
	$panier1C->updateSomme($idUser);
}

header('Location: index.php');

}else{
	echo "vérifier les champs";
}
//*/
}

if (isset($_POST['add-to-wishlist'])) {
	

if (isset($_GET['idUser']) and isset($_POST['idProduit'])){
$wishList1=new wishList(0,$_GET['idUser'],$_POST['idProduit']);
//Partie2
/*
var_dump($wishList1);
}
*/
//Partie3
$wishList1C=new wishListC();
$is_available =$wishList1C->existanceProduitDansWishList($_POST['idProduit']);
if ($is_available == 0) {
	$wishList1C->ajouterProduitToWishList($wishList1);
}

header('Location: index.php');
	
}else{
	echo "vérifier les champs";
}
}
?>