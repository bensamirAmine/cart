<?PHP
include "../core/produitpanierC.php";
$produitpanierC=new ProduitpanierC();
if (isset($_POST["delete-item"])){
	$idPanierProduit=$_POST['idPanierProduit'];
	$produitpanierC->deleteFromPanierproduitById($idPanierProduit);
	header('Location: checkout.php');
}

?>