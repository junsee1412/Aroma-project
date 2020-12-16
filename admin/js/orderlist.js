let filler=$('#filler').val(), limit= $('#limit').val(), page = 0;

$(document).ready(function(){
    $('#list-order').load('list-order.php?filler='+filler+'&limit='+limit+'&page='+page);
    $('#edit-ad').hide();
    $("#filler").on('change', function() {
        filler=$('#filler').val();
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
function changestatus(id,status){
    status==0 ? status=1 : status==1 ? status=2 : status=2;
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('status', status);
    feature(form_data);
}
function feature(form_data){
    $.ajax({
        url: 'detail-order.php',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'post'
        // ,
        // success: function(php_script_response){
        //     alert(php_script_response);
        // }
    });
    $('#list-order').load('list-order.php?filler='+filler+'&limit='+limit+'&page='+page);
}