<?
include('conf.php');
$tmp=0;
if($_SESSION['iduser']!=0){
    $con = mysqli_connect("localhost", "root", "", "Aroma");
    $su = mysqli_query($con, "SELECT * FROM userlist WHERE id=$_SESSION[iduser]");
    $rsu = mysqli_fetch_assoc($su);
    if($rsu['class']==1) header("location: /code/midex/admin/product/");
}
include('menu.php');
?>
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center pt-5 mt-5">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                <a href="/code/midex/" class="btn btn-link">Back to Home</a>
            </div>
        </div>
    </div>
</div>
