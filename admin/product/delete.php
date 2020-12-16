<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql="";
if(isset($_POST['product'])) $sql="DELETE FROM product WHERE id=$_POST[product]";
elseif(isset($_POST['category'])) $sql="DELETE FROM category WHERE id=$_POST[category]";
elseif(isset($_POST['brand'])) $sql="DELETE FROM brand WHERE id=$_POST[brand]";
$rs = mysqli_query($conn, $sql);
echo "Delete Success"
?>