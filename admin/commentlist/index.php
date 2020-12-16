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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Comment List</h4>
                                    <div class="row">
                                        <div class="col-md-11" id="ppa">
                                            <!-- <div class="input-group">
                                                <input type="text" class="form-control" id="search" placeholder="Search now" aria-label="search" aria-describedby="search">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="ti-search"></i>
                                                    </span>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <select class="form-control" id="limit">
                                                    <option value="3">3</option>
                                                    <option value="5" selected>5</option>
                                                    <option value="7">7</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">User</th>
                                                    <th colspan="2">Product</th>
                                                    <th>Comment</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody id="comment-user">
                                                <tr onclick="alert('haha')">
                                                    <td>Dave</td>
                                                    <td>Jacob</td>
                                                    <td>53275535</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
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
<script src="../js/list-comment.js"></script>