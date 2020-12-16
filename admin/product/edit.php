<?php
$conn = mysqli_connect("localhost", "root", "", "Aroma");
if (empty($_POST['name']) || $_POST['idcategory']=='null' || $_POST['idbrand']=='null' || empty($_POST['price']) || empty($_POST['remain']) || empty($_POST['id'])) {
    echo 'Update Error';
}
else {
    $sql="UPDATE product SET name = '$_POST[name]', idcategory=".$_POST['idcategory'].", idbrand=".$_POST['idbrand'].",detail='".$_POST['detail']."', price=".$_POST['price'].", remain=".$_POST['remain']." WHERE id=$_POST[id]";
    $ketqua = mysqli_query($conn, $sql);
    echo 'Update Success';
}
?>