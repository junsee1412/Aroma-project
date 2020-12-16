$(document).ready(function(){
    $('#cancel').on('click', function(){
        $('#edit-ad').hide();
    });
    $('#add').on('click', function() {
        let form_data = new FormData();//{file: file_data};//   

        let name = $('#name').val();          
        form_data.append('name', name);
        
        let idcategory = ($('#idcategory').val());          
        form_data.append('idcategory', idcategory);
        
        let idbrand = ($('#idbrand').val());
        form_data.append('idbrand', idbrand);
        
        let price = $('#price').val();
        form_data.append('price', price);
        
        let remain = $('#remain').val();
        form_data.append('remain', remain);
        
        let file_data = $('#sortpicture').prop('files')[0];  
        form_data.append('file', file_data);
        
        let detail = $('#detail').val();                  
        form_data.append('detail', detail);    
        let url = 'upload.php';                     
        pst(url,form_data);
        setTimeout(function() {
            $('#edit-ad').hide();
            $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
        }, 800);
    });
    $('#edit').on('click', function(){
        let form_data = new FormData();

        let id = $('#id').val();          
        form_data.append('id', id);

        let name = $('#name').val();          
        form_data.append('name', name);
        
        let idcategory = ($('#idcategory').val());          
        form_data.append('idcategory', idcategory);
        
        let idbrand = ($('#idbrand').val());
        form_data.append('idbrand', idbrand);
        
        let price = $('#price').val();
        form_data.append('price', price);
        
        let remain = $('#remain').val();
        form_data.append('remain', remain);

        let detail = $('#detail').val();                  
        form_data.append('detail', detail);
        let url = 'edit.php'; 
        pst(url,form_data);
        setTimeout(function() {
            $('#edit-ad').hide();
            $('#productsls').load('products.php?string='+string+'&limit='+limit+'&min='+amount1+'&max='+amount2+'&page='+page);
        }, 800);
    });
    $('#editbc').on('click',function(){
        let form_data = new FormData();
        let table_name = $('#table').val(), id = $('#idhidden').val(), namebc = $('#namebc').val(), url = 'edit-bc.php';
                      
        form_data.append('table', table_name);
        form_data.append('id', id);
        form_data.append('name', namebc);

        pst(url,form_data);
        setTimeout(function() {
            $('#edit-ad').hide();
            $('#categoryls').load('category.php');
            $('#brandls').load('brand.php');
        }, 800);
    });
});
function pst(url,form_data){
    $.ajax({
        url: url,
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