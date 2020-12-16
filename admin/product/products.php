<?php 
empty($_GET['string']) ? $string = '' : $string = "name LIKE '%$_GET[string]%' AND";
$limit = $_GET['limit'];
$min = $_GET['min'];
$max = $_GET['max'];
$page=$_GET['page'];

$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM product WHERE $string price BETWEEN $min AND $max";
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
$ssql = "SELECT * FROM product WHERE $string price BETWEEN $min AND $max ORDER BY id DESC LIMIT $start, $limit";
$result1 = mysqli_query($conn, $ssql);
if(!empty($result1))
while ($row = mysqli_fetch_assoc($result1)){
?>
<tr>
    <td class="py-1">
        <img src="<?echo $row['img'];?>" alt="image"/>
    </td>
    <td><?echo $row['name'];?></td>
    <td><?echo $row['remain'];?></td>
    <td><?echo number_format($row['price'],2);?> $</td>
    <td>
        <button type="button" class="btn btn-inverse-info btn-fw btn-sm baa" onclick="$('#edit-ad').show();$('#formshow').load('edit-product.php?id=<?echo $row['id'];?>');"><i class="ti-pencil"></i></button>
    </td>
    <td>
        <button type="button" class="btn btn-inverse-danger btn-fw btn-sm baa" onclick="delproduct(<?echo $row['id'];?>)"><i class="ti-trash"></i></button>
    </td>
</tr>
<?
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