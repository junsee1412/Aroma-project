<?php include('../conf.php');?>
<link rel="stylesheet" href="../css/jquery-ui.css">
<link rel="stylesheet" href="../css/products.css">
<body>
    <div class="container-scroller">
        <?include('../partials/navbar.php');?>
        <div class="container-fluid page-body-wrapper">
            <?include('../partials/sidebar.php');?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
						<div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order List</h4>
                                    <p class="card-description"></p>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control" id="filler">
                                                    <option value="1" selected>All</option>
                                                    <option value="2">Confirm</option>
                                                    <option value="3">Transport</option>
                                                    <option value="4">Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <select class="form-control" id="limit">
                                                    <option value="1">1</option>
                                                    <option value="3" selected>3</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" id="ppa">
                
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan=2>User</th>
                                                    <th>Order</th>
                                                    <th>Total price</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list-order">

                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
            <div class="edit-add" id="edit-ad">
                <div id="formshow" class="row justify-content-md-center pt-4">
                    
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/orderlist.js"></script>