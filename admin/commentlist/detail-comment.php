<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM product WHERE id=$_GET[idproduct]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
function brand($idbrand){
    $conn = mysqli_connect("localhost", "root", "", "Aroma");
    $sql = "SELECT * FROM brand WHERE id=$idbrand";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['name'];
}
?>
<input type="hidden" id="idcmt" value="<?echo $_GET['id'];?>">
<input type="hidden" id="idproduct" value="<?echo $row['id'];?>">
<div class="col-8 offset-col-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Comment Detail</h4>
            <div class="row">
                <div class="col-sm-7 list-wrapper">
                    <ul class="d-flex flex-column-reverse todo-list todo-list-custom" id="list-detail-comment">
											
                    </ul>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <img src="<?echo $row['img'];?>" class="col-8 offset-2">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h4 class="text-primary"><?echo $row['name'];?></h4>
                            <p>Brand: <?echo brand($row['idbrand']);?></p>
                        </div>
                        <div class="col-6">
                            <h5>$ <?echo number_format($row['price'],2);?></h5>
                            <p>In stock: <?echo $row['remain'];?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7">
                    <input type="text" class="form-control" id="content" placeholder="Comment">
                </div>
                <div class="col-sm-5">
                    <input type="button" class="btn btn-primary mr-2" id="add" value="Reply">
                    <input type="button" class="btn btn-light" onclick="$('#edit-ad').hide();" value="Exit">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    let idcmt = $('#idcmt').val();
    $('#list-detail-comment').load('list-detail-comment.php?id='+idcmt);
    
    $('#add').click(function(){
        let form_data = new FormData();
        let content = $('#content').val();
        let idproduct = $('#idproduct').val();
        let iduser = 3;

        form_data.append('idproduct', idproduct);
        form_data.append('content', content);
        form_data.append('iduser', iduser);
        form_data.append('idcmt', idcmt);
        $.ajax({
            url: 'add-comment-reply.php',
            dataType: 'text',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         
            type: 'post'
        });
        $('#list-detail-comment').load('list-detail-comment.php?id='+idcmt);
        $('#content').val('');
    });
});
</script>