<?PHP
include "../core/avisC.php";
include "../entities/avis.php";


if (isset($_POST["comment"]) and isset($_POST['idUser']) and isset($_POST['idProd']) and isset($_POST['date'])){
	$avis1= new Avis(0,,$_POST['idProduit'],$_POST['idUser'],$_POST['date'],$_POST['comment']);
	$avis1C=new AvisC();
	$avis1C->ajouterCommentaire($avis1)
}

?>