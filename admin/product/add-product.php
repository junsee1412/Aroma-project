<?$conn = mysqli_connect("localhost", "root", "", "Aroma");?>
<div class="col-8 offset-col-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Product</h4>
            <form class="forms-sample container-fluid">
                <div class="row">
                    <div class="form-group col-12">
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <select class="form-control" id="idcategory">
                            <option value="" selected disabled hidden>Category</option> 
                            <?
                            $sqlcat = "SELECT * FROM category";
                            $rscat = mysqli_query($conn, $sqlcat);
                            while ($rowcat = mysqli_fetch_assoc($rscat))
                            {
                                echo '<option value="'.$rowcat['id'].'">'.$rowcat['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <select class="form-control" id="idbrand">
                            <option value="" selected disabled hidden>Brand</option> 
                            <?
                            $sqlbrand = "SELECT * FROM brand";
                            $rsbrand = mysqli_query($conn, $sqlbrand);
                            while ($rowbrand = mysqli_fetch_assoc($rsbrand))
                            {
                                echo '<option value="'.$rowbrand['id'].'">'.$rowbrand['name'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-3">
                        <input type="number" class="form-control" id="price" placeholder="Price">
                    </div>
                    <div class="form-group col-3">
                        <input type="number" class="form-control" id="remain" placeholder="Remain">
                    </div>
                    <div class="form-group col-6">
                        <input type="file" name="img[]" class="file-upload-default" id="sortpicture">
                        <div class="input-group">
                            <input type="text" class="form-control file-upload-info" id="filename" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <textarea class="form-control" id="detail" rows="4" placeholder="Detail"></textarea>
                    </div>
                </div>
                <input type="button" class="btn btn-primary mr-2" id="add" value="Add">
                <input type="button" class="btn btn-light" id="cancel" value="Cancel">
            </form>
        </div>
    </div>
</div>
<script src="../js/file-upload.js"></script>
<script src="../js/products-event.js"></script>