
<?PHP
include "../core/avisC.php";
$avis1C=new AvisC();

if (isset($_POST["delete-comment"])){
	$id=$_POST['id'];
	$avis1C->supprimercommentaire($id);
header('Location: listeComments.php');
}