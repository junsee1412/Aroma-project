<?php
include('conf.php');
?>
<body>
<?php
include('menu.php');
$idpr=$_GET['id'];
$sql="SELECT * FROM product WHERE id=$idpr";
$resultbrand = mysqli_query($conn, $sql);
$show = mysqli_fetch_assoc($resultbrand);
function catid($getidcat){
    $prod = mysqli_connect("localhost", "root", "", "Aroma");
    $showcat="SELECT * FROM brand WHERE id=$getidcat";
    $resultcat = mysqli_query($prod, $showcat);
    $shownamecat = mysqli_fetch_assoc($resultcat);
    return $shownamecat['name'];
}
?>
<title><? echo $show['name'];?></title>
    <div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="owl-carousel owl-theme s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo $show['img'];?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $show['name'];?></h3>
						<h2>$ <?php echo number_format($show['price'],2);?></h2>
						<ul class="list">
							<li><span>Category</span> : <?php echo catid($show['idcategory']);?></li>
						</ul>
						<p><?php echo $show['detail'];?></p>
						<div class="product_count">
							<form action="product.php" method="post">
								<label for="qty">Quantity:</label>
								<input type="text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
								<span class="input-group-append">
									<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;" class="increase items-count" style="margin-top:3px" type="button"><i class="ti-angle-up"></i></button>
									<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false; "class="increase items-count" style="margin-top:16px" type="button"><i class="ti-angle-down"></i></button>
								</span>
							</form>
							<a class="button primary-btn" <? if($_SESSION['iduser'] != 0 )if($show['remain']!=0) echo 'onclick="addcart()"';?>><? $render=''; $show['remain']==0 ? $render="Out of Stock":$render="Add to Cart"; echo $render;?></a>              
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<div class="nav nav-tabs">
				<h2>Comment</h2>
            </div>
			<div class="row" style="margin-top:12px">
				<div class="col-lg-8">
					<div class="comment_list">
						<!-- <span>comment</span> -->
					</div>
				</div>
				<div class="col-lg-4">
					<div class="review_box">
						<h4>Post a comment</h4>
						<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12">
								<div class="form-group">
									<textarea class="form-control" name="message" id="message" rows="6" placeholder="Message"></textarea>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<button type="button" value="submit" class="btn primary-btn" id="btncmt">Submit Now</button>
							</div>
						</form>
					</div>
				</div>
            </div>
		</div>
	</section>
	<!--================End Product Description Area =================-->
<?php
include('footer.php');
echo $_SESSION['iduser'];
?>
</body>
<script>
	let idproduct = <?php echo $idpr;?>;
	let iduser = <?php echo $_SESSION['iduser'];?>;
	let content = '';
	$(document).ready(function(){
		$(".comment_list").load('commentlist.php?idproduct='+idproduct+'&iduser='+iduser+'&content='+content);
		$("#btncmt").click(function(){
			content = $("#message").val();
			$(".comment_list").load('commentlist.php?idproduct='+idproduct+'&iduser='+iduser+'&content='+content);
			$("#message").val('');
		});
	});
	function addcart(){
		sl = $(".qty").val();
		document.location = 'addcart.php?item='+idproduct+'&sl='+sl;
	}
</script>