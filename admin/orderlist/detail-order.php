<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql="UPDATE aromaorder SET stt=$_POST[status] WHERE id=$_POST[id]";
$rs = mysqli_query($conn, $sql);
?>