<?PHP
include "../core/panierC.php";
include "../core/produitpanierC.php";
$produit1C=new ProduitpanierC();
$panier1C=new PanierC();
$idUser=1;
$idPanier=$panier1C->dernierPanierDeUser($idUser);
foreach($idPanier as $row)
	{
		$idPanier=$row['idPanier'];
	}
	$produits=$produit1C->fetchProductsByIdPanier($idPanier);
//var_dump($listeEmployes->fetchAll());
?>
<table border="1">
<tr>
<td>idProduitPanier</td>
<td>idProduit</td>
<td>quantite</td>

<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($produits as $row){
	?>
	<tr>
	<td><?PHP echo $row['idProduitPanier']; ?></td>
	<td><?PHP echo $row['idProduit']; ?></td>
	<td><?PHP echo $row['quantite']; ?></td>

	<td><form method="POST" action="supprimerEmploye.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['idProduitPanier']; ?>" name="idProduitPanier">
	</form>
	</td>
	<td><a href="modifierEmploye.php?idProduitPanier=<?PHP echo $row['idProduitPanier']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
}
?>
</table>


