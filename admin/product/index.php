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
                                    <h4 class="card-title">Products</h4>
                                    <p class="card-description"></p>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="ti-search"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" id="search" placeholder="Search now" aria-label="search" aria-describedby="search">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class="form-control" id="limit">
                                                    <option value="6">6</option>
                                                    <option value="9" selected>9</option>
                                                    <option value="12">12</option>
                                                    <option value="15">15</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="hidden" id="amount1">
                                            <input type="hidden" id="amount2">
                                            <input type="text" id="amount" readonly style="border:0; color:#000;">
                                            <div id="slider-range"></div>
                                        </div>
                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-inverse-info btn-icon" id="addproduct" onclcik="addedit()">
                                                <i class="ti-file"></i>
                                            </button>
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
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>In Stock</th>
                                                    <th>Price</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="productsls">

                                            </tbody>
                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Category</p>
                                    <div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom" id="categoryls">
											
                                        </ul>
									</div>
                                    <div class="add-items d-flex mb-0 mt-4">
										<input type="text" id="category-title" class="form-control todo-list-input mr-2"  placeholder="Add new category">
										<button id="add-category" class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-angle-double-right"></i></button>
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Brand</p>
                                    <div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom" id="brandls">
											
                                        </ul>
									</div>
                                    <div class="add-items d-flex mb-0 mt-4">
                                    	<input type="text" id="brand-title" class="form-control todo-list-input mr-2"  placeholder="Add new brand">
										<button id="add-brand" class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="ti-angle-double-right"></i></button>
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
<script src="../js/products.js"></script>
<!-- <script src="../js/jquery-1.12.4.js"></script> -->
<script src="../js/jquery-ui.js"></script>