<?php
include('conf.php');
?>
<title>Aroma Shop - Cart</title>
<body>
<?php
include('menu.php');
$total=0;
if(isset($_POST['submit']))
{
    foreach($_POST['qty'] as $key=>$value)
    {
        if( ($value == 0) and (is_numeric($value)))
        {
            unset ($_SESSION['carts'][$key]);
        }
        else if(($value > 0) and (is_numeric($value)))
        {
            $_SESSION['carts'][$key]=$value;
        }
    }
    header("location:cart.php");
}
?>
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th></th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
<?
$ok=1;
if(isset($_SESSION['carts']))
{
    foreach($_SESSION['carts'] as $k => $v)
    {
        if(isset($k))
        {
            $ok=2;
        }
    }
}
if($ok == 2)
{
    echo "<form action='cart.php' method='post'>";
    foreach($_SESSION['carts'] as $key=>$value)
    {
        $item[]=$key;
    }
    $str=implode(",",$item);
    $sqlc="SELECT * FROM product WHERE id IN ($str)";
    $queryc=mysqli_query($conn,$sqlc);
    while($rowc=mysqli_fetch_array($queryc))
    {
        echo "<tr>";
        echo "<td><div class='media'>";
        echo "<div class='d-flex'><img src='$rowc[img]' style='width:100px; height:auto;'></div>";
        echo "<div class='media-body'><p>$rowc[name]</p></div>";
        echo "</div></td>";
        echo "<td><a href='delcart.php?productid=$rowc[id]'>Delete</a></td>";
        echo "<td><h5>$".number_format($rowc['price'],2)."</h5></td>";
        echo "<td><div class='product_count'><input type='text' name='qty[$rowc[id]]' maxlength='12' value='{$_SESSION['carts'][$rowc['id']]}' title='Quantity:' class='input-text qty'></div></td>";
        echo "<td><h5>$".number_format($_SESSION['carts'][$rowc['id']]*$rowc['price'],2)."</h5></td>";
        echo "</tr>";
        $total+=$_SESSION['carts'][$rowc['id']]*$rowc['price'];
    }
    echo "<tr class='bottom_button'>";
    echo "<td><button class='button' name='submit' type='submit'>Update Cart</button></td>";
    echo "<td></td><td></td><td></td><td></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td></td><td></td><td></td>";
    echo "<td><h5>Subtotal</h5></td>";
    echo "<td><h5>$".number_format($total,2)."</h5></td>";
    echo "</tr>";
    echo "<tr class='out_button_area'>";
    echo "<td class='d-none-l'></td>";
    echo "<td class=''></td>";
    echo "<td></td>";
    echo "<td>";
    echo "<div class='checkout_btn_inner d-flex align-items-center'>";
    echo "<a class='gray_btn ml-2' href='shop.php'>Shopping</a>";
    echo "<a class='gray_btn ml-2'href='delcart.php?productid=0'>Delete</a>";
    echo "<a class='primary-btn ml-2' href='checkout.php'>Checkout</a>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
    echo "</form>";
}
else
{
    echo "<td colspan='5'>";
    echo "<p align='center'>No items in the shopping cart<br /><a href='shop.php'>Shop Now</a></p>";
    echo "</td>";
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php
include('footer.php');
?>
</body>