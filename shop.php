<script src="../js/jquery-ui.js"></script>
<head>
    <title>Aroma Shop - Shop</title>
    <style>
    .filter-bar .linkpr{
        color:#777;
    }
    .filter-bar .act{
        color:#384AEB;
    }


    *:after, *:before {
    box-sizing: border-box;
    }
    .clearfix:after, .textinputs:after {
    content: " ";
    display: table;
    clear: both;
    }

    .filters {
    padding: 5rem 2rem;
    background-color: #fff;
    }
    .filters .ui-slider-handle {
    width: 3rem;
    height: 3rem;
    top: -1.2rem;
    border: 0.6rem solid #fc047c;
    border-radius: 50%;
    -webkit-transform: translateX(-0.9rem);
            transform: translateX(-0.9rem);
    }
    .filters .ui-slider-handle:focus, .filters .ui-slider-handle:active {
    outline: none;
    background: #fff;
    }

    .controls #price-range {
    border: none;
    background: #bfbfbf;
    border-radius: 0;
    }
    .controls #price-range .ui-slider-range {
    background: #fc047c;
    }

    .textinputs {
    padding: 1.5rem 0;
    }
    .textinputs input {
    width: 4rem;
    display: block;
    float: left;
    }
    .textinputs input:last-child {
    float: right;
    }
    </style>
</head>
<?php
include('conf.php');
$pg=2;
?>
<body>
<?php
include('menu.php');
?>
<section class="section-margin--small mb-5">
	<div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head" id="chosecategory" style="cursor: pointer;">Browse Categories</div>
                    <div class="main-categories" id="main-categories" style="overflow: scroll; overflow-x: hidden; height: 230px; display: none;">
                        <form action="shop.php" method="POST">
                            <ul class="common-filter">
                                <?php
                                $cat = "SELECT * FROM category";
                                $resultcat = mysqli_query($conn, $cat);
                                echo '<li class="filter-list"><input class="pixel-radio category" type="radio" id="cAll" name="category" value="0" checked><label for="cAll">All</label></li>';
                                while ($rowcat = mysqli_fetch_assoc($resultcat)){
                                    echo '<li class="filter-list"><input class="pixel-radio category" type="radio" id="'.$rowcat['name'].'" name="category" value="'.$rowcat['id'].'"><label for="'.$rowcat['name'].'">'.$rowcat['name'].'</label></li>';
                                }
                                ?>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="sidebar-filter">
                    <div class="top-filter-head" id="chosebrand" style="cursor: pointer;">Browse Brands</div>
                    <div class="common-filter" id="main-brand" style="overflow: scroll; overflow-x: hidden; height: 210px; display: none;">
                        <form action="#">
                            <ul>
                                <?php
                                $brand = "SELECT * FROM brand";
                                $resultbrand = mysqli_query($conn, $brand);
                                echo '<li class="filter-list"><input class="pixel-radio brand" type="radio" id="bAll" name="brand" value="0" checked><label for="bAll">All</label></li>';
                                while ($rowbrand = mysqli_fetch_assoc($resultbrand)){
                                    echo '<li class="filter-list"><input class="pixel-radio brand" type="radio" id="'.$rowbrand['name'].'" name="brand" value="'.$rowbrand['id'].'"><label for="'.$rowbrand['name'].'">'.$rowbrand['name'].'</label></li>';
                                }
                                ?>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="sidebar-filter">
                    <div class="top-filter-head" id="choseprice" style="cursor: pointer;">Price</div>
                    <div class="common-filter" id="main-price" style="display: block;">
                        <div class="prices" style="padding-top:10px; margin-left:10px">
                            <label for="mini">Min:</label>
                            <input type="number" id="mini" style="width:30%;" value=10>
                            <label for="mini">Max:</label>
                            <input type="number" id="maxi" style="width:30%;" value=4000>
                        </div>
                        <div id="range"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <!-- <div class="sorting">
                        <select id="sort" onchange="sorting(this)">
                            <option value="0">Default</option>
                            <option value="1">Low to High</option>
                            <option value="2">High to Low</option>
                            <option value="3">A to Z</option>
                            <option value="4">Z to A</option>
                        </select>
                    </div> -->
                    <div class="sorting mr-auto">
                        <select id="limit" onchange="choice(this)">
                            <option value="6">6</option>
                            <option value="9" selected>9</option>
                            <option value="12">12</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div>
                        <div class="input-group filter-bar-search">
                            <input type="text" placeholder="Search" id="search">
                        </div>
                    </div>
                    <script>
                    let category = 0;
                    let brand = 0;
                    let mini = $('#mini').val();
                    let maxi = $('#maxi').val();
                    let string = '';
                    let page = 1;
                    let sort = $('#sort').val();
                    let limit = $('#limit').val();
                    $(document).ready(function(){
                        $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                        $('.category').click(function(){
                            category = $("input[name='category']:checked").val();
                            $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                        });
                        $('.brand').click(function(){
                            brand = $("input[name='brand']:checked").val();
                            $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                        });
                        $("#search").on("keyup", function() {
                            string = $(this).val().replace(/\s/g, '+');;
                            $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                        });
                        $("#mini").on("keyup", function() {
                            mini = $(this).val();
                            $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                        });
                        $("#maxi").on("keyup", function() {
                            maxi = $(this).val();
                            $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                        });
                        $("#chosecategory").click(function(){
                            $("#main-categories").slideDown("slow");
                            $("#main-brand").slideUp("slow");
                            $("#main-price").slideUp("slow");
                        });
                        $("#chosebrand").click(function(){
                            $("#main-categories").slideUp("slow");
                            $("#main-brand").slideDown("slow");
                            $("#main-price").slideUp("slow");
                        });
                        $("#choseprice").click(function(){
                            $("#main-categories").slideUp("slow");
                            $("#main-brand").slideUp("slow");
                            $("#main-price").slideDown("slow");
                        });
                    });
                    function choice(select){
                        limit = select.options[select.selectedIndex].text;
                        $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                    }
                    function sorting(sort){
                        sort = select.options[select.selectedIndex].text;
                        $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                    }
                    function runrun(page){
                        $("#loadpr").load('loadproduct.php?idcategory='+category+'&idbrand='+brand+'&string='+string+'&page='+page+'&limit='+limit+'&mini='+mini+'&maxi='+maxi+'&sort='+sort);
                    }

                    </script>
                </div>
                <!-- End Filter Bar -->
                
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row" id="loadpr" ></div>
                    <div class="filter-bar d-flex flex-wrap align-items-center" id="ppap"></div>
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
</section>
    <!-- ================ category section end ================= -->
<?php
include('footer.php');
?>
</body>
