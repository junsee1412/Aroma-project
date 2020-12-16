let amount1=0, amount2=0, string='', limit= $('#limit').val(), page = 0;


$( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 3000,
      values: [ 0, 3000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$ " + ui.values[ 0 ] + " - $ " + ui.values[ 1 ] );
        $( "#amount1" ).val(ui.values[ 0 ]);
        $( "#amount2" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val( "$ " + $( "#slider-range" ).slider( "values", 0 ) + " - $ " + $( "#slider-range" ).slider( "values", 1 ) );
    $( "#amount1" ).val($( "#slider-range" ).slider( "values", 0 ));
    $( "#amount2" ).val($( "#slider-range" ).slider( "values", 1 ));
});

$(document).ready(function(){
    string = $(this).val().replace(/\s/g, '+');
    amount1 = $("#amount1").val();
    amount2 = $("#amount2").val();
    $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
    $('#categoryls').load('category.php');
    $('#brandls').load('brand.php');
    $('#slider-range,#slider-range span').click(function(){
        amount1 = $("#amount1").val();
        amount2 = $("#amount2").val();
        $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
    });
    $("#search").on("keyup", function() {
        string = $(this).val().replace(/\s/g, '+');
        $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
    });
    $('#limit').on('change', function () {
        limit= $(this).val();
        $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
    });

    $('#edit-ad').hide();
    $('#addproduct').on('click', function(){
        $('#edit-ad').show();
        $('#formshow').load('add-product.php');
    });

    $('#add-category').on('click',function(){
        $('#edit-ad').show();
        let form_data = new FormData(); 
        let category_title = $('#category-title').val();
        form_data.append('category',category_title);
        add(form_data);
        setTimeout(function() {
            $('#edit-ad').hide();
            $('#categoryls').load('category.php');
        }, 500);
        $('#category-title').val('');
    });

    $('#add-brand').on('click',function(){
        $('#edit-ad').show();
        let form_data = new FormData(); 
        let brand_title = $('#brand-title').val();
        form_data.append('brand',brand_title);
        add(form_data);
        setTimeout(function() {
            $('#edit-ad').hide();
            $('#brandls').load('brand.php');
        }, 500);
        $('#brand-title').val('');
    });
});

function run(pag){
    page = pag;
    $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
}

function delproduct(id){
    let form_data = new FormData();   
    form_data.append('product', id);
    del(form_data);
    setTimeout(function() {
        $('#edit-ad').hide();
        $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
    }, 500);
}

function delcategory(id){
    let form_data = new FormData();   
    form_data.append('category', id);
    del(form_data);
    setTimeout(function() {
        $('#edit-ad').hide();
        $('#categoryls').load('category.php');
    }, 500);
}

function delbrand(id){
    let form_data = new FormData();   
    form_data.append('brand', id);
    del(form_data);
    setTimeout(function() {
        $('#edit-ad').hide();
        $('#brandls').load('brand.php');
    }, 500);
}

function del(form_data){
    $('#edit-ad').show();
    $.ajax({
        url: 'delete.php',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            $('#formshow').html(php_script_response);
        }
    });
}

function add(form_data){
    $('#edit-ad').show();
    $.ajax({
        url: 'add-brand-category.php',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post',
        success: function(php_script_response){
            $('#formshow').html(php_script_response);
        }
    });
}

function editcategory(idc){
    $('#edit-ad').show();
    $('#formshow').load('edit-brand-category.php?title=category&id='+idc);
}
function editbrand(idb){
    $('#edit-ad').show();
    $('#formshow').load('edit-brand-category.php?title=brand&id='+idb);
}