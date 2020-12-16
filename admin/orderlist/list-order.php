<?php 
$limit = $_GET['limit'];
$page=$_GET['page'];
$filler ='';
if($_GET['filler']==1) $filler='';
elseif($_GET['filler']==2) $filler='WHERE stt=0';
elseif($_GET['filler']==3) $filler='WHERE stt=1';
else $filler='WHERE stt=2';

$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM aromaorder $filler";
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
$ssql = "SELECT * FROM aromaorder $filler ORDER BY id DESC LIMIT $start, $limit";
$result1 = mysqli_query($conn, $ssql);
if(!empty($result1))
while ($row = mysqli_fetch_assoc($result1)){
?>
<tr>
    <td class="py-1">
        <img src="<?echo user($row['iduser'])['img'];?>" alt="image"/>
    </td>
    <td><?echo user($row['iduser'])['username'];?></td>
    <td><?echo date("M d, Y", $row['ngay']);?></td>
    <td>$ <?echo number_format($row['totalprice'],2);?></td>
    <td>
        <button type="button" class="btn <?echo status($row['stt'])['btn'];?> btn-rounded btn-icon btn-sm" onclick="changestatus(<?echo ''.$row['id'].','.$row['stt'].'';?>)"><i class="<?echo status($row['stt'])['icon'];?>"></i></button>
    </td>
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
function status($bol){
    $clas;
    if($bol==0) {
        $clas['icon']="ti-package";
        $clas['btn']="btn-inverse-info";
    }
    elseif($bol==1) {
        $clas['icon']="ti-truck";
        $clas['btn']="btn-inverse-warning";
    }
    else {
        $clas['icon']="ti-check";
        $clas['btn']="btn-inverse-success";
    }
    return $clas;
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
    }
    $('#ppa').html(count());
});
</script>