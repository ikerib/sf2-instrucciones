$(document).ready(function(){$("#btn-delete").on("click",function(){var b=$("#form_question_delete");var a=confirm("Are you sure?");if(a==true){$(b).submit()}});$("#btn-save").on("click",function(){var a=$("#form_question_edit");$(a).submit()})});