<?php
$conn = mysqli_connect("localhost", "root", "", "Aroma");
if (empty($_POST['name']) || $_POST['idcategory']=='null' || $_POST['idbrand']=='null' || empty($_POST['price']) || empty($_POST['remain'])) {
    echo 'Upload Error';
}
else {
    move_uploaded_file($_FILES['file']['tmp_name'], '../asset/img/' . $_FILES['file']['name']);
    $sql = "INSERT INTO product(name,idcategory,idbrand,img,detail,price,remain) VALUES('$_POST[name]',".$_POST['idcategory'].",".$_POST['idbrand'].",'/code/midex/asset/img/".$_FILES['file']['name']."','".$_POST['detail']."',".$_POST['price'].",".$_POST['remain'].")";
    $ketqua = mysqli_query($conn, $sql);
    echo 'Upload Success';
}
?>