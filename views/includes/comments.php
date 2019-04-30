<?php 
include_once "../core/avisC.php";
include_once "../entities/avis.php";

$avis1C = new AvisC();
$comments = $avis1C->fetchComments();

 ?>

<div class="container">
<?PHP

foreach($comments as $row)
{
if($idUser== $row['idUser'])
{
	?>

    	<div class="cart-header comment-container" style="height: 100px !important;">
    		
    		<form method="post" action="editComment.php">
    			<input type="hidden" name="delete-comment">
    			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    				</form>
				 <div class="close1"> <input type="submit" name="delete-item" style=" width:28px; color: transparent; background-color: transparent; border-color: transparent; cursor: pointer;"></div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc comment-item">
							 <img class="comment-img" src="images/person_2.jpg" class="img-responsive" alt="">
						</div>
					   <div id="<?php echo $row['id']; ?>" class="cart-item-info">
						<h3><a href="#"><?PHP echo $row['id']; ?></a><span><?php echo $row['comment']; ?></span></h3>
						<button class="btn" onclick="myFunction(<?php echo $row['id']; ?>)">modifier</button>		
				  		</div>
					   <div id="<?PHP echo $row['id'].'l'; ?>"  class="cart-item-info myDIV1">
					   	<form action="editComment.php" method="post">
					   		<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					   		<input type="hidden" name="date" value="<?php echo date("Y-m-d"); ?>">
					   		<input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
					   		<input type="hidden" name="idProduit" value="<?php echo $row['idProduit']; ?>">

						<h3><input class="new-comment" type="text" placeholder="donnez votre avis!" name="comment" value="<?php echo $row['comment']; ?>">	<input type="submit" name="edit-comment" class="btn btn-info">
						</h3></form>		
				  		</div>
				  <div class="clearfix"></div>
			 </div>
    	</div>   	
<?php
}else{
?>
<div class="cart-header comment-container" style="height: 100px !important;">
    		
    		<form method="post" action="editComment.php">
				 
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc comment-item">
							 <img class="comment-img" src="images/person_2.jpg" class="img-responsive" alt="">
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"><?PHP echo $row['id']; ?></a><span><?php echo $row['comment']; ?></span></h3>
						</li>
						</ul>					
				  </div>
				  <div class="clearfix"></div>
			 </div>
			</form>
    	</div>   	

<?php
}
?>

	<?PHP
}
?>
<div class="cart-header comment-container" style="height: 100px !important;">
    		<?php 
    		$date = date("Y-m-d");
    		$idProduit=2;
    		 ?>
    		<form method="post" action="addComment.php">
				 <input type="hidden" name="idUser" value="<?php echo $idUser; ?>">
				 <input type="hidden" name="idProd" value="<?php echo $idProduit; ?>">
				 <input type="hidden" name="date" value="<?php echo $date; ?>">
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc comment-item">
							 
						</div>
					   <div class="cart-item-info">
						
						</li>
						</ul>	
						<input class="new-comment" type="text" placeholder="donnez votre avis!" name="comment">	<input type="submit" name="submit-comment" class="btn btn-danger">
		
				  </div>


				  <div class="clearfix"></div>
			 </div>
			</form>
    	</div>   	
</div>
<script type="text/javascript">
	
	function myFunction(idl) {
  var x = document.getElementById(idl);
  var y = document.getElementById(idl+"l");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";

  } else {
    x.style.display = "none";
    y.style.display = "block";
  }
}

</script>