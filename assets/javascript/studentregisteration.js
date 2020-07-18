$(document).ready(function(){
    $(".student-details").DataTable();

    $(document).on('click','.submitChanges', function(){
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
            method : 'GET',
            data :{
                delete : id,
            },
           // dataType : JSON,
            success : function(response){
                //if(response != null) location.reload();
            },
            error : function(response){
                console.error(response);
            }
        });
    });
});