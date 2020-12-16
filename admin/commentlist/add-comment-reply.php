<?
$timestamp = time();
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql="INSERT INTO comment (idproduct, content, timea, iduser, idcmt) VALUE ($_POST[idproduct], '$_POST[content]', $timestamp, $_POST[iduser], $_POST[idcmt])";
$rs = mysqli_query($conn, $sql);
echo "Done";
?>