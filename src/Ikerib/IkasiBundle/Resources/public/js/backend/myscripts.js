$(document).ready(function(){

    $("#btn-delete").on("click",function(){
        var myform = $('#form_question_delete');
        var resp = confirm("Are you sure?");
        if ( resp == true ) {
            $(myform).submit();
        }
    })

    $('#btn-save').on('click', function() {
        var myform = $('#form_question_edit');
        $(myform).submit();
    });

});