<?PHP
include "../core/avisC.php";
include "../entities/avis.php";
$avis1C=new AvisC();


if (isset($_POST["delete-comment"])){
	$id=$_POST['id'];
	$avis1C->supprimercommentaire($id);
header('Location: checkout.php?message=deleted');
}
if (isset($_POST["edit-comment"])) {
		$id=$_POST['id'];
		$date=$_POST['date'];
		$comment=$_POST['comment'];
		$idProduit=$_POST['idProduit'];
		$idUser=$_POST['idUser'];
		$s=new Avis($id,$idProduit,$idUser,$date,$comment);
		

		$avis1C->modifiercommentaire($s);
		header('Location: checkout.php?message=updated');
}
?>