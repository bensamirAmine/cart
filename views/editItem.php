<?PHP
include "../core/produitpanierC.php";
$produit1C=new ProduitpanierC();

if (isset($_POST["delete-item"])){
	$idProduitPanier=$_POST['idProduitPanier'];
	$produit1C->deleteFromPanierproduitById($idProduitPanier);
header('Location: checkout.php?message=deleted');
}

if (isset($_POST["edit-quantite"])) {
		$idProduitPanier=$_POST['idProduitPanier'];
		$quantite=$_POST['quantite'];
		

		$produit1C->modifierQuantite($idProduitPanier,$quantite);
		header('Location: checkout.php?message=updated');
}
?>