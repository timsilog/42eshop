<?php
session_start();
?>
<html>
	<?php include 'includes/head.php';?>
	<body>
		<?php include 'includes/header.php';?>
		<div id="slider">
		<figure>
		<img src="img/corsair.jpeg" alt=""/>
		<img src="img/logitechmouse.png" alt=""/>
		<img src="img/uni.jpg" alt=""/>
		<img src="img/fish.jpg" alt="" />
		<img src="img/uni.jpg" alt="" />
		</figure>
		</div>
<?php 
$items = array('img/product_img/thumbs/k1.jpg',
	'img/product_img/thumbs/k2.jpg',
	'img/product_img/thumbs/k3.jpg',
	'img/product_img/thumbs/k4.jpg',
	'img/product_img/thumbs/h1.jpg',
	'img/product_img/thumbs/h2.jpg',
	'img/product_img/thumbs/h3.jpg',
	'img/product_img/thumbs/h4.jpg',
	'img/product_img/thumbs/m1.jpg',
	'img/product_img/thumbs/m2.jpeg',
	'img/product_img/thumbs/m3.jpg'
);
shuffle($items);
 ?>
		<div class="container">
			<div class="gallery cf">
				<?php $i = 0;foreach($items  as $prod): ?>
				<div class="gallery-item">
					<img src=<?php echo $prod?> alt="" />
					<br />
					<a href="add_to_cart.php">add_to cart</a>
					<?php if($i++ > 6) break; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</body>
</html>
