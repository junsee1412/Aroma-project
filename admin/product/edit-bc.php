<?php
$conn = mysqli_connect("localhost", "root", "", "Aroma");
if (empty($_POST['name'])) {
    echo 'Update Error';
}
else {
    $sql="UPDATE $_POST[table] SET name = '$_POST[name]' WHERE id=$_POST[id]";
    $ketqua = mysqli_query($conn, $sql);
    echo 'Update Success';
}
?>