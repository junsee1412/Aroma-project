<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM $_GET[title] WHERE id=$_GET[id]";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="col-8 offset-col-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit <?echo $_GET['title'];?></h4>
            <form class="forms-sample container-fluid">
                <div class="form-group">
                    <input type="hidden" id="table" value="<?echo $_GET['title'];?>">
                    <input type="hidden" id="idhidden" value="<?echo $row['id'];?>">
                    <input type="text" class="form-control" id="namebc" value="<?echo $row['name'];?>" placeholder="Name">
                </div>
                <input type="button" class="btn btn-primary mr-2" id="editbc" value="Edit">
                <input type="button" class="btn btn-light" id="cancel" value="Cancel">
            </form>
        </div>
    </div>
</div>
<script src="../js/products-event.js"></script>