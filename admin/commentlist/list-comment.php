<?php 
$limit = $_GET['limit'];
$page=$_GET['page'];

$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM comment WHERE idcmt=0";
$result = mysqli_query($conn, $sql);

$numofproduct = mysqli_num_rows($result);
$total_page = ceil($numofproduct/$limit);
if ($page > $total_page){
    $page = $total_page;
}
else if ($page < 1){
    $page = 1;
}
$start = ($page -1)* $limit;

$ssql = "SELECT * FROM comment WHERE idcmt=0 ORDER BY id DESC LIMIT $start, $limit";
$result1 = mysqli_query($conn, $ssql);
if(!empty($result1))
while ($row = mysqli_fetch_assoc($result1)){
?>
<tr onclick="$('#edit-ad').show();$('#formshow').load('detail-comment.php?<?echo 'id='.$row['id'].'&idproduct='.$row['idproduct'];?>')">
    <td class="py-1">
        <img src="<?echo user($row['iduser'])['img'];?>" alt="image"/>
    </td>
    <td><?echo user($row['iduser'])['username'];?></td>
    <td class="py-1">
        <img src="<?echo product($row['idproduct'])['img'];?>" alt="image"/>
    </td>
    <td><?echo product($row['idproduct'])['name'];?></td>
    <td><?echo $row['content'];?></td>
    <td><?echo date("F d, Y h:i:s", $row['timea']);?></td>
</tr>
<?
}
function user($id){
    $conn = mysqli_connect("localhost", "root", "", "Aroma");
    $sql = "SELECT * FROM userlist WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
function product($id){
    $conn = mysqli_connect("localhost", "root", "", "Aroma");
    $sql = "SELECT * FROM product WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}
?>
<input type="hidden" id="page" value="<?echo $page;?>">
<input type="hidden" id="total_page" value="<?echo $total_page;?>">
<script>
$(document).ready(function(){
    let total_page=$('#total_page').val(), pge=$('#page').val();
    let cout = 1, button = '', active = '';
    function count(){
        while(cout<=total_page){
            cout==pge ? active='btn-success' : active='btn-outline-success' ;
            button +='<button style="margin:1.5px;" type="button" class="btn btn-sm '+active+'" onclick="run('+cout+')">'+cout+'</button>';
            cout++;
        }
        return button;
        alert(cout);
    }
    $('#ppa').html(count());
});
</script>