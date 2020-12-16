<?php 
empty($_GET['string']) ? $string = '' : $string = "WHERE username OR email LIKE '%$_GET[string]%'";
$limit = $_GET['limit'];
$page=$_GET['page'];

$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM userlist $string";
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
$ssql = "SELECT * FROM userlist $string ORDER BY id DESC LIMIT $start, $limit";
$result1 = mysqli_query($conn, $ssql);
if(!empty($result1))
while ($row = mysqli_fetch_assoc($result1)){
?>
<tr>
    <td class="py-1">
        <img src="<?echo $row['img'];?>" alt="image"/>
    </td>
    <td><?echo $row['username'];?></td>
    <td><?echo $row['email'];?></td>
    <td><button type="button" class="btn <?echo role($row['class'])['btn'];?> btn-rounded btn-icon btn-sm" onclick="changeclass(<?echo ''.$row['id'].','.$row['class'].'';?>)"><i class="<?echo role($row['class'])['icon'];?>"></i></button></td>
    <td>
        <button type="button" class="btn <?echo status($row['status'])['btn'];?> btn-rounded btn-icon btn-sm" onclick="changestatus(<?echo ''.$row['id'].','.$row['status'].'';?>)"><i class="<?echo status($row['status'])['icon'];?>"></i></button>
    </td>
    <td>
        <button type="button" class="btn btn-inverse-danger btn-rounded btn-icon btn-sm" onclick="deluser(<?echo $row['id'];?>)"><i class="ti-trash"></i></button>
    </td>
</tr>
<?
}
function role($bol){
    $clas;
    if($bol==0) {
        $clas['icon']="ti-user";
        $clas['btn']="btn-inverse-success";
    }
    else {
        $clas['icon']="ti-shield";
        $clas['btn']="btn-inverse-primary";
    }
    return $clas;
}
function status($bols){
    $status;
    if($bols==0) {
        $status['icon']="ti-unlock";
        $status['btn']="btn-inverse-success";
    }
    else {
        $status['icon']="ti-lock";
        $status['btn']="btn-inverse-warning";
    }
    return $status;
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