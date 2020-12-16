<?php
include('conf.php');
?>
<title>Aroma Shop - Check out</title>
<body>
<?php
include('menu.php');
$timestamp = time();
$total=0;
?>
    <section class="order_details section-margin--small">
        <div class="container">
            <p class="text-center billing-alert">Thank you. Your order has been received.</p>
            <div class="order_details_table">
                <h2>Your Order</h2>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
                            foreach($_SESSION['carts'] as $key=>$value)
                            {
                                $item[]=$key;
                            }
                            $str=implode(",",$item);
                            $sqlc="SELECT * FROM product WHERE id IN ($str)";
                            $queryc=mysqli_query($conn,$sqlc);
                            while($rowc=mysqli_fetch_assoc($queryc)){
                            ?>
                            <tr>
                                <td>
                                    <p><?echo $rowc['name']?></p>
                                </td>
                                <td>
                                    <h5><?echo $_SESSION['carts'][$rowc['id']];?></h5>
                                </td>
                                <td>
                                    <p>$ <?echo number_format($_SESSION['carts'][$rowc['id']]*$rowc['price'],2);?></p>
                                </td>
                            </tr>
                            <?
                                $total+=$_SESSION['carts'][$rowc['id']]*$rowc['price'];
                            }
                            ?>
                            <tr>
                                <td colspan=2>
                                    <h5>Subtotal:</h5>
                                </td>
                                <td>
                                    <p>$ <?echo number_format($total,2); $totalprice=$total;?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=2>
                                    <h5>Total:</h5>
                                </td>
                                <td>
                                    <p>$ <?echo number_format($total,2);?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=3>
                                    <form action="" method="post">
                                        <button class="button button-paypal" type="submit">Pay</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php
function price($id,$numof){
    $conn = mysqli_connect("localhost", "root", "", "Aroma");
    $sql="SELECT * FROM product WHERE id=$id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $sum=$row['price']*$numof;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $insertorder = "INSERT INTO aromaorder(iduser,ngay,stt,totalprice) VALUES($_SESSION[iduser],$timestamp,0,$totalprice)";
    $insertorderquerq = mysqli_query($conn,$insertorder);
    $orderid = $conn->insert_id;
    $insertorderdetail = "";
    foreach ($_SESSION['carts'] as $key=>$value) {
        $insertorderdetail .= "($orderid,$key,".(int)$_SESSION['carts'][$key].",".price($key,(int)$_SESSION['carts'][$key]).")";
        if ($key != count($_SESSION['carts']) - 1) {
            $insertorderdetail .= ",";
        }
    }
    $detailod = "INSERT INTO aromaorderdetail(idorder,idproduct,amount,price) VALUES ".rtrim($insertorderdetail,",").";";
    $insertorderdetailquery = mysqli_query($conn,$detailod);
    echo $insertorder;
    echo rtrim($insertorderdetail,",");
    unset($_SESSION['carts']);
    echo "<script type='text/javascript'> document.location = 'confirmation.php?id=$orderid'; </script>";
}
include('footer.php');
?>
</body>
