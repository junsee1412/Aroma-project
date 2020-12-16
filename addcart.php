<?php
session_start();
$id=$_GET['item'];
$sl=1;
if($_GET['sl']>0) $sl = $_GET['sl'];
if(isset($_SESSION['carts'][$id]))
{
    $qty = $_SESSION['carts'][$id] + $sl;
}
else
{
    $qty=$sl;
}
$_SESSION['carts'][$id]=$qty;
header("location:cart.php");
exit();
?>