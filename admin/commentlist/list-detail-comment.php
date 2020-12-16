<?
$conn = mysqli_connect("localhost", "root", "", "Aroma");
function user($iduser){
    $conn = mysqli_connect("localhost", "root", "", "Aroma");
    $sql = "SELECT * FROM userlist WHERE id=$iduser";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
$sql_rep = "SELECT * FROM comment WHERE idcmt=$_GET[id]";
$result_rep = mysqli_query($conn, $sql_rep);
if(mysqli_num_rows($result_rep)>0)
while($row_rep = mysqli_fetch_assoc($result_rep)){
?>
<li>
	<div class="row">
        <div class="col-2"></div>
        <div class="col-10">
            <div class="row">
                <div class="col-4">
                    <img src="<?echo user($row_rep['iduser'])['img'];?>">
                </div>
                <div class="col-8">
                    <h5><?echo user($row_rep['iduser'])['username'];?></h5>
                    <p class="px-3"><?echo $row_rep['content'];?></p>
                    <small>
                        <?echo date("M d, Y h:i:s", $row_rep['timea']);?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</li>
<?
}

$sql = "SELECT * FROM comment WHERE id=$_GET[id]";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<li>
	<div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <img src="<?echo user($row['iduser'])['img'];?>">
                </div>
                <div class="col-8">
                    <h5><?echo user($row['iduser'])['username'];?></h5>
                    <p class="px-3"><?echo $row['content'];?></p>
                    <small>
                        <?echo date("M d, Y h:i:s", $row['timea']);?>
                    </small>
                </div>
            </div>
        </div>
    </div>
</li>
