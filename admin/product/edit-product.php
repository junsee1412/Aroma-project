<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM product WHERE id=$_GET[id]";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="col-8 offset-col-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Product</h4>
            <form class="forms-sample container-fluid">
                <div class="row">
                    <div class="form-group col-12">
                        <input type="hidden" id="id" value="<?echo $row['id'];?>">
                        <input type="text" class="form-control" id="name" value="<?echo $row['name'];?>" placeholder="Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <select class="form-control" id="idcategory">
                            <?
                            $sqlcat = "SELECT * FROM category";
                            $rscat = mysqli_query($conn, $sqlcat);
                            while ($rowcat = mysqli_fetch_assoc($rscat))
                            {
                                $selected = '';
                                if ($rowcat['id']==$valu['idcategory']||$rowcat['id']==$_GET['idcategory']) $selected = "selected";
                                echo '<option value="'.$rowcat['id'].'" '.$selected.'>'.$rowcat['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <select class="form-control" id="idbrand">
                            <?
                            $sqlbrand = "SELECT * FROM brand";
                            $rsbrand = mysqli_query($conn, $sqlbrand);
                            while ($rowbrand = mysqli_fetch_assoc($rsbrand))
                            {
                                $selected = '';
                                if ($rowbrand['id']==$valu['idbrand']||$rowbrand['id']==$_GET['idbrand']) $selected = "selected";
                                echo '<option value="'.$rowbrand['id'].'" '.$selected.'>'.$rowbrand['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <input type="number" class="form-control" id="price" value="<?echo $row['price'];?>" placeholder="Price">
                    </div>
                    <div class="form-group col-6">
                        <input type="number" class="form-control" id="remain" value="<?echo $row['remain'];?>" placeholder="Remain">
                    </div>
                    <!-- <div class="form-group col-6">
                        <input type="file" name="img[]" class="file-upload-default" id="sortpicture">
                        <div class="input-group">
                            <input type="text" class="form-control file-upload-info" id="filename" value="<?echo str_replace('/code/midex/asset/img/', '',$row['img']);?>" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <textarea class="form-control" id="detail" rows="4" placeholder="Detail"><?echo $row['detail'];?></textarea>
                    </div>
                </div>
                <input type="button" class="btn btn-primary mr-2" id="edit" value="Edit">
                <input type="button" class="btn btn-light" id="cancel" value="Cancel">
            </form>
        </div>
    </div>
</div>
<script src="../js/file-upload.js"></script>
<script src="../js/products-event.js"></script>