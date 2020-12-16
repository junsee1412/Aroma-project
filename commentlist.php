<?php
$timestamp = time();
$getcmtls = mysqli_connect("localhost", "root", "", "Aroma");
$idproduct=$_GET['idproduct'];
$idusers=$_GET['iduser'];
$noidungs=$_GET['content'];
if(!empty($noidungs)&&$idusers!=0){ 
    $sendcmtuser = mysqli_connect("localhost", "root", "", "Aroma");
    $sqlsendcmt = "INSERT INTO comment (idproduct, content, timea, iduser) VALUE ($idproduct, '$noidungs', $timestamp, $idusers)";
    $sendcmt = mysqli_query($sendcmtuser, $sqlsendcmt);
}

$sqlcmt = "SELECT * FROM comment WHERE idproduct=$idproduct AND idcmt=0 ORDER BY id DESC";
$resultcmt = mysqli_query($getcmtls, $sqlcmt);
function user($iduser){
    $getuser = mysqli_connect("localhost", "root", "", "Aroma");
    $showuser="SELECT * FROM userlist WHERE id=$iduser";
    $resultuser = mysqli_query($getuser, $showuser);
    $showfulluser = mysqli_fetch_assoc($resultuser);
    return $showfulluser;
}
if(mysqli_num_rows($resultcmt)>0)
    while($comment = mysqli_fetch_assoc($resultcmt))
    {
    ?>
    <div class="review_item">
        <div class="media">
            <div class="d-flex">
                <img src="<? echo user($comment['iduser'])['img'];?>" style="border-radius: 50%;">
            </div>
            <div class="media-body">
                <h4><? echo user($comment['iduser'])['username'];?></h4>
                <h5><? echo (date("M d, Y h:i:s", $comment['timea']));?></h5>
				<!-- <button class="reply_btn">Reply</button> -->
            </div>
        </div>
        <p><? echo $comment['content'];?></p>
        <hr  width="100%" align="center" />
    </div>
<?  
        reply($comment['id']);
    }
function reply($idcmt){
    $conn = mysqli_connect("localhost", "root", "", "Aroma");
    $sql = "SELECT * FROM comment WHERE idcmt=$idcmt";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0)
    while($row=mysqli_fetch_assoc($result)){
    ?>
    <div class="review_item reply">
        <div class="media">
            <div class="d-flex">
                <img src="<? echo user($row['iduser'])['img'];?>" style="border-radius: 50%;">
            </div>
            <div class="media-body">
                <h4><? echo user($row['iduser'])['username'];?></h4>
                <h5><? echo (date("M d, Y h:i:s", $row['timea']));?></h5>
				<!-- <button class="reply_btn">Reply</button> -->
            </div>
        </div>
        <p><? echo $row['content'];?></p>
        <hr  width="100%" align="center" />
    </div>
    <?
    }
}
?>