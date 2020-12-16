<?
session_start();
$filler = '';
$limit = $_GET['limit'];
$page = $_GET['page'];
if($_GET['filler']==1) $filler='';
elseif($_GET['filler']==2) $filler=' AND stt=0';
elseif($_GET['filler']==3) $filler=' AND stt=1';
else $filler=' AND stt=2';

$conn = mysqli_connect("localhost", "root", "", "Aroma");
$sql = "SELECT * FROM aromaorder WHERE iduser=$_SESSION[iduser] $filler ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
$numofproduct = mysqli_num_rows($result);
$total_page = ceil($numofproduct/$limit);
if ($page > $total_page){
    $page = $total_page;
}
else if ($page < 1){
    $page = 1;
}
echo $page;
$start = ($page -1)* $limit;

$ssql = "SELECT * FROM aromaorder WHERE iduser=$_SESSION[iduser] $filler ORDER BY id DESC LIMIT $start, $limit";
$result1 = mysqli_query($conn, $ssql);
if(mysqli_num_rows($result1)>0)
while($row = mysqli_fetch_assoc($result1)){
?>
<tr>
    <td>
        <p><?echo date("F d, Y", $row['ngay']);?></p>
    </td>
    <td>
        <p>$ <?echo number_format($row['totalprice'],2);?></p>
    </td>
    <td>
        <p>
            <? 
            $status = "";
            if($row['stt']==0) $status = "Confirm" ;
            elseif($row['stt']==1) $status = "Transport" ;
            else $status = "Delivered";
            echo $status;
            ?>
        </p>
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
            cout==pge ? active='act' : active='' ;
            button +='<span style="margin-top:9px;"><a class="linkpr '+active+'" href="#'+cout+'" onclick="run('+cout+')">'+cout+'&nbsp;&nbsp;</a></span>';
            cout++;
        }
        return button;
    }
    $('#ppa').html(count());
});
</script>