<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql="";
if(isset($_POST['category'])) $sql="INSERT INTO category(name) VALUE('$_POST[category]')";
elseif(isset($_POST['brand'])) $sql="INSERT INTO brand(name) VALUE('$_POST[brand]')";
$rs = mysqli_query($conn, $sql);
echo "Add Success"
?>