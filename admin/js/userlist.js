let string='', limit= $('#limit').val(), page = 0;

$(document).ready(function(){
    string = $(this).val().replace(/\s/g, '+');
    $('#list-user').load('list-user.php?string='+string+'&limit='+limit+'&page='+page);
    $('#edit-ad').hide();
    $("#search").on("keyup", function() {
        string = $(this).val().replace(/\s/g, '+');
        $('#list-user').load('list-user.php?string='+string+'&limit='+limit+'&page='+page);
    });
    $('#limit').on('change', function () {
        limit= $(this).val();
        $('#list-user').load('list-user.php?string='+string+'&limit='+limit+'&page='+page);
    });
});
function run(pag){
    page = pag;
    $('#list-user').load('list-user.php?string='+string+'&limit='+limit+'&page='+page);
}
function changeclass(id,clas){
    let form_data = new FormData();
    clas==0 ? clas=1 : clas=0;
    form_data.append('id', id);
    form_data.append('clas', clas);
    feature(form_data);
}
function changestatus(id,status){
    status==0 ? status=1 : status=0;
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('status', status);
    feature(form_data);
}
function deluser(id){
    let form_data = new FormData();
    form_data.append('id', id);
    form_data.append('del', 'DELETE');
    feature(form_data);
}
function feature(form_data){
    $.ajax({
        url: 'detail-user.php',
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
    $('#list-user').load('list-user.php?string='+string+'&limit='+limit+'&page='+page);
}