<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql="";
if(isset($_POST['clas'])) $sql="UPDATE userlist SET class=$_POST[clas] WHERE id=$_POST[id]";
elseif(isset($_POST['status'])) $sql="UPDATE userlist SET status=$_POST[status] WHERE id=$_POST[id]";
elseif(isset($_POST['del'])) $sql="DELETE FROM userlist WHERE id=$_POST[id]";
$rs = mysqli_query($conn, $sql);
?>