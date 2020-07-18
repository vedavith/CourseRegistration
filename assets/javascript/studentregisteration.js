$(document).ready(function(){
    $(".student-details").DataTable();

    $.id = 0;

    $(document).on('click','.submitChanges', function(){
        if($.id != 0)
        {
         var id = $.id;
        }
        else
        {
            var id = 0;
        }

        var fname = $(document).find('.first_name').val();
        var lname = $(document).find('.last_name').val();
        var birthday = $(document).find('.dob').val();
        var phone = $(document).find('.phone').val();
        var flag = 1;
        var getUrl = $(this).data('url');
        $.ajax({
            url : getUrl,
            method : 'POST',
            data :{
                id : id,
                first_name  : fname,
                last_name : lname,
                dob : birthday,
                contact : phone,
                flagger : flag
            },
            success : function(response){
               // if(response != null) location.reload();
            },
            error : function(response){
                console.error(response);
            }
        });
    });

    $(document).on('click','.deleteStudent', function(){
        var getUrl = $(this).data('url');
        var id = $(this).data('delete');
        $.ajax({
            url : getUrl,
            method : 'POST',
            data :{
                delete : id,
                flagger : 2
            },
            success : function(response){
               // if(response != null) location.reload();
            },
            error : function(response){
                console.error(response);
            }
        });
    });

    
    $(document).on('click','.editstudent', function(){
       
        var studentData = $('#student_' + $(this).data("update"));

        $(document).find('.first_name').val(studentData.data('firstname'));
        $(document).find('.last_name').val(studentData.data('lastname'));
        $(document).find('.dob').val(studentData.data('dob'));
        $(document).find('.phone').val(studentData.data('contact'));
       
        $(document).find('#studentModal').modal('show');
    });
});