<?php
include_once "includes/header1.php";
include_once "includes/navbar.php";
include_once "../core/panierC.php";
include_once "../core/produitpanierC.php";
include_once "../entities/panier.php";
include_once "../core/wishlistC.php";
$idUser=1;
$panier1C= new  PanierC();
$produit1C=new ProduitpanierC();
$panier1C=new PanierC();
$wishlist1C=new WishListC();
if (isset($_GET['search'])) {
  $item=$_GET['search'];
  $searching=$wishlist1C->rechercherWishlist($item);
  $wishListContent = $wishlist1C->fetchWishListSearch($idUser,$searching['id']);

}else
{
$wishListContent = $wishlist1C->fetchWishList($idUser);
}

?>
		<section class="ftco-section bg-light">
		
    	<div class="container-fluid">
    		<div class="row">
<?php  
foreach ($wishListContent as $row)
 {
 	$productDetails=$wishlist1C->fetchProductDetails($row['idProduit']);

$name = $productDetails['name'];
$image= $productDetails['image'];
$price= $productDetails['price'];

?>
    			
    			<div class="col-sm col-md-6 col-lg-3 ftco-animate">
    				<form action="addtocart.php?idUser=1" method="post">
    					<input type="hidden" name="idProduit" value="<?php echo $row['idProduit'] ?>">
  <input type="hidden" name="quantite" value="1">
    					<input type="hidden" name="prod" value="produit2">
    					<input type="hidden" name="price" value="<?php $productDetails['price'] ?>">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="images/<?php echo $image; ?>" alt="Colorlib Template">
    						<span class="status">30%</span>
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#"><?php echo $name; ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="price-sale"><?php echo $price; ?></span></p>
		    					</div>
		    					<div class="rating">
	    							<p class="text-right">
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    								<span class="ion-ios-star-outline"></span>
	    							</p>
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							  <input class="add-to-cart" type="submit" name="submit" value="add to cart  +">
  								  <a class="ml-auto" href="deletefrmwishlist.php?idProduit=<?php echo $row['idProduit']; ?>"><span><i class="ion-ios-close"></i></span></a>
    							
    							
    						</p>
    					</div>
    				</div>
    					</form>
    			</div>
<?php
}
?>
    	    	
    			</div>
    	
    			
    		</div>
    	</section>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>


<?php
include_once "includes/footer.php";

?>