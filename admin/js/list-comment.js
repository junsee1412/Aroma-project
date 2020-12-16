let limit= $('#limit').val(), page = 0;

$(document).ready(function(){
    string = $(this).val().replace(/\s/g, '+');
    $('#comment-user').load('list-comment.php?limit='+limit+'&page='+page);
    $('#edit-ad').hide();
    $('#limit').on('change', function () {
        limit= $(this).val();
        $('#comment-user').load('list-comment.php?limit='+limit+'&page='+page);
    });
});
function run(pag){
    page = pag;
    $('#comment-user').load('list-comment.php?limit='+limit+'&page='+page);
}