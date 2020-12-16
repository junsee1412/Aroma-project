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
<? include('conf.php');?>
<?
include('menu.php');
?>
<title>Aroma Shop - Order</title>
<section class="section-margin--small mb-5">
	<div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select id="limit">
                            <option value="1">1</option>
                            <option value="6">6</option>
                            <option value="9" selected>9</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="sorting">
                        <select id="filler">
                            <option value="1" selected>All</option>
                            <option value="2">Confirm</option>
                            <option value="3">Transport</option>
                            <option value="4">Delivered</option>
                        </select>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <div id="ppa">

                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="filter-bar">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"><h5>Time</h5></th>
                                    <th scope="col"><h5>Price</h5></th>
                                    <th scope="col"><h5>Status</h5></th>
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
</section>
<script>
let filler=$('#filler').val(), limit= $('#limit').val(), page = 0;

$(document).ready(function(){
    $('#list-order').load('list-order.php?filler='+filler+'&limit='+limit+'&page='+page);
    $("#filler").on("change", function() {
        filler=$('#filler').val()
        $('#list-order').load('list-order.php?filler='+filler+'&limit='+limit+'&page='+page);
    });
    $('#limit').on('change', function () {
        limit= $(this).val();
        $('#list-order').load('list-order.php?filler='+filler+'&limit='+limit+'&page='+page);
    });
});
function run(pag){
    page = pag;
    $('#list-order').load('list-order.php?filler='+filler+'&limit='+limit+'&page='+page);
}
</script>
<? include('footer.php')?>