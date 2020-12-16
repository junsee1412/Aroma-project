<?php
session_start();
$where=$and=$smeo=$sbar=$sstring='';
$meo=$_GET['idcategory'];
$bar=$_GET['idbrand'];
$min=$_GET['mini'];
$max=$_GET['maxi'];
$string=$_GET['string'];
$sort=$_GET['sort'];
$page=$_GET['page'];
$where="WHERE";
if($meo!=0 || $bar!=0 || !empty($string)){
    if($meo==0 && $bar==0 && !empty($string)) $sstring="name like '%$string%' and";
    elseif($meo!=0 && $bar==0 && empty($string)) $smeo="idcategory=$meo and";
    elseif($meo==0 && $bar!=0 && empty($string)) $sbar="idbrand=$bar and";
    elseif($meo!=0 && $bar!=0 && empty($string)){/*ko nhap tim kiem*/
        $sstring="";
        $smeo="idcategory=$meo and";
        $sbar="idbrand=$bar and";
    }
    elseif($meo!=0 && $bar==0 && !empty($string)){/*brand == all*/
        $sstring="name like '%$string%' and";
        $smeo="idcategory=$meo and";
        $sbar="";
    }
    elseif($meo==0 && $bar!=0 && !empty($string)){/*category == all*/
        $sstring="name like '%$string%' and";
        $smeo="";
        $sbar="idbrand=$bar and";
    }
    elseif($meo!=0 && $bar!=0 && !empty($string)){/*nhap tim kiem && chon cat && chon brand*/
        $sstring="name like '%$string%' and";
        $smeo="idcategory=$meo and";
        $sbar="idbrand=$bar and";
    }
}
$prod = mysqli_connect("localhost", "root", "", "Aroma");
$getprodnum = "SELECT * FROM product $where $sstring $smeo $sbar price BETWEEN $min AND $max";
$kq = mysqli_query($prod,$getprodnum);
$limit = $_GET['limit'];
$numofproduct = mysqli_num_rows($kq);
$total_page = ceil($numofproduct/$limit);
if ($page > $total_page){
    $page = $total_page;
}
else if ($page < 1){
    $page = 1;
}
$start = ($page -1)* $limit;
$ssql = "SELECT * FROM product $where $sstring $smeo $sbar price BETWEEN $min AND $max LIMIT $start, $limit";
$resut = mysqli_query($prod, $ssql);
if(!empty($resut))
    while($prk = mysqli_fetch_assoc($resut)){
        abc($prk);
    }
function brandid($getidbrand){
    $prod = mysqli_connect("localhost", "root", "", "Aroma");
    $showbrand="SELECT * FROM brand WHERE id=$getidbrand";
    $resultbrand = mysqli_query($prod, $showbrand);
    $shownamebrand = mysqli_fetch_assoc($resultbrand);
    return $shownamebrand['name'];
}
function abc($abs){
    $link='';
    if($abs['remain']==0) $link='#';
    if($_SESSION['iduser'] == 0) $link='#';
    echo '<div data-sid="'.$abs['price'].'" class="col-md-6 col-lg-4"><div class="card text-center card-product"><div class="card-product__img">';
    echo '<img class="card-img" src="'.$abs['img'].'">';
    echo '<ul class="card-product__imgOverlay">';
    echo '<li><a href="product.php?id='.$abs['id'].'"><button><i class="ti-search"></i></button></a></li>';
    echo '<li><a href="'.$link.'addcart.php?item='.$abs['id'].'"><button><i class="ti-shopping-cart"></i></button></a></li>';
    echo '</ul></div><div class="card-body">';
    echo '<p>'.brandid($abs['idbrand']).'</p>';
    echo '<h4 class="card-product__title">'.$abs['name'].'</h4>';
    if($abs['remain']==0) echo '<p class="card-product__price">Out of stock</p>';
    else echo '<p class="card-product__price">$'.number_format($abs['price'],2).'</p>';
    echo '</div></div></div>';
}
?>
<script>
<?php echo"var al=$total_page; var pac=$page;";?>
var co=1;
var phantrang='';
var act='';
$(document).ready(function(){
    function count(){
        while(co<=al){
            co==pac ? act='act' : act='' ;
            phantrang +='<span style="margin-top:9px;"><a class="linkpr '+act+'" href="#'+co+'" onclick="runrun('+co+')">'+co+'&nbsp;&nbsp;</a></span>';
            co++;
        }
        return phantrang;
    }
    $('#ppap').html(count());
});
</script>