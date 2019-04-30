<?PHP
session_start();
include "../core/panierC.php";
include "../core/produitpanierC.php";
include "../entities/panier.php";
include "includes/header1.php";
$panier1C= new  PanierC();
$Discount=0;
$dilevery=0;
$idUser=1;
$total=$panier1C->totalProductInCart($idUser);
$totalPrix=$panier1C->totalPriceInCart($idUser);
$produit1C=new ProduitpanierC();
$panier1C=new PanierC();
$_SESSION['idPanier']=$panier1C->dernierPanierDeUser($idUser);;
$idPanier=$_SESSION['idPanier'];
foreach($idPanier as $row)
	{
		$idPanier=$row['idPanier'];
	}
	$produits=$produit1C->fetchProductsByIdPanier($idPanier);

//include "includes/navbar.php";
?>

    <div class="container">
    <div class="cart-content col-md-9 cart-items ">
    	


<?PHP

foreach($produits as $row){
		$idProduit=$row['idProduit'];
		$infoProduit=$panier1C->fetchProductDetails($idProduit);
	?>

    	<div class="cart-header">
    		
    		<form method="post" action="editItem.php">
    			<input type="hidden" name="idProduitPanier" value="<?php echo $row['idProduitPanier'] ?>">
				 <div class="close1" onclick="mySnack()"> <input type="submit" name="delete-item" style=" width:28px; color: transparent; background-color: transparent; border-color: transparent; cursor: pointer;"></div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/<?PHP echo $infoProduit['image']; ?>" class="img-responsive" alt="<?PHP echo $infoProduit['name']; ?>">
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"><?PHP echo $infoProduit['name']; ?></a><span>Model No: <?PHP echo $infoProduit['id']; ?></span></h3>
						<ul class="qty">
							<li><p>price : <?PHP echo $infoProduit['price']; ?> Dt</p></li>
							<li><span>Qty : </span><input class="input-qte" type="number" min="1" name="quantite" value="<?PHP echo $row['quantite']; ?>"><input type="submit" name="edit-quantite" value="confirmer"></li>
						</ul>					
				  </div>
				  <div class="clearfix"></div>
			 </div>
			</form>
    	</div>   	


	<?PHP
}
?>
<?php 
    	if ($total == 0) 
    	{
    			echo "Votre Panier est Vide!";
  		}

?>


</div>

    		 <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1"><?php echo $totalPrix; ?></span>
				 <span>Discount</span>
				 <span class="total1"> <?php echo $Discount; ?> </span>
				 <span>Delivery Charges</span>
				 <span class="total1"><?php echo $dilevery; ?></span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?php $totalPrix=$totalPrix-$Discount+$dilevery; echo $totalPrix; ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="#">Place Order</a>
			 
			</div>
   </div>


   <?php   
   if (isset($_GET['message'])) {
   	
	 echo '<div id="snackbar">Item ';
	 echo $_GET['message'];
	 echo " Successfully ! </div>";
	 
   }
   ?>
  

   <script type="text/javascript">
   	function mySnack() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
   </script>
   <?php 
   	include "includes/comments.php";
   ?>
</body>
</html>		
