<?php
include_once "../config.php";

/**
 * 
 */
class AvisC
{

function ajouterCommentaire($avis)
{
		$sql="insert into avis (idProduit,idUser,comment, date) values ( :idProduit,:idUser, :comment, :date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
     
        $idProduit=$avis->getidProduit();
        $idUser=$avis->getidUser();
        $comment=$avis->getcomment();
		$date=$avis->getdate();
		$req->bindValue(':idProduit',$idProduit);
		$req->bindValue(':idUser',$idUser);
		$req->bindValue(':comment',$comment);
		$req->bindValue(':date',$date);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
	
}
function fetchComments(){
		
$sql="SElECT * From avis";
		$db = config::getConnexion();
		try{
		$comments=$db->query($sql);
		return $comments;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}


	function supprimercommentaire($id){
		$sql="DELETE FROM avis where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifiercommentaire($s){
		$sql="UPDATE avis SET date=:date,comment=:comment WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);


		$id=$s->getid();
        $commentaire=$s->getcomment();
        $date = $s->getdate();


		$req->bindValue(':id',$id);
		$req->bindValue(':comment',$commentaire);
		$req->bindValue(':date',$date);
		
		echo $id;
		echo $commentaire;
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
        }
		
	}
	function recuperercommentaire($id){
		$sql="SELECT * from avis where id=$id";
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
