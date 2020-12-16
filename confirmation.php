<? include('conf.php');?>
<title>Aroma Shop - Confirmation</title>
<?
include('menu.php');
?>
    <section class="order_details section-margin--small">
        <div class="container">
            <p class="text-center billing-alert">Thank you. Your order has been received.</p>
            <div class="order_details_table">
                <h2>Order Details</h2>
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
                            $sqlitem = "SELECT * FROM aromaorderdetail WHERE idorder=$_GET[id]";
                            $getitem = mysqli_query($conn,$sqlitem);
                            function product($idpr){
                                $pr = mysqli_connect("localhost", "root", "", "Aroma");
                                $sqlpr = "SELECT * FROM product WHERE id=$idpr";
                                $getpr = mysqli_query($pr,$sqlpr);
                                return $showpr = mysqli_fetch_assoc($getpr);
                            }
                            while($numofitem=mysqli_fetch_assoc($getitem)){
                            ?>
                            <tr>
                                <td>
                                    <p><? echo product($numofitem['idproduct'])['name'];?></p>
                                </td>
                                <td>
                                    <h5>x<? echo $numofitem['amount'];?></h5>
                                </td>
                                <td>
                                    <p>$<? echo number_format($numofitem['price'],2);?></p>
                                </td>
                            </tr>
                            <?
                            }
                            ?>
                            <tr>
                                <td>
                                    <h4>Time</h4>
                                    <?
                                        $sqlcart = "SELECT * FROM aromaorder WHERE id=$_GET[id]";
                                        $getodercart = mysqli_query($conn,$sqlcart);
                                        $showosercart = mysqli_fetch_assoc($getodercart);
                                    ?>
                                </td>
                                <td colspan="2">
                                    <p><?echo date("F d, Y", $showosercart['ngay']);?></p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Total</h4>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <h4>$<?echo number_format($showosercart['totalprice'],2);?></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<? include('footer.php')?>