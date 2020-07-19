$(document).ready(function(){
    $(".course-details").DataTable();

    $(document).on('click','.submitChanges', function(){
        var courseTitle = $(document).find('.course').val();
        var courseDescription = $(document).find('.description').val();
        var getId = $(document).find('.id').val(); 
        var flag = 1; 
        var getUrl = $(this).data('url');

        $.ajax({
            url : getUrl,
            method : 'POST',
            data :{
                id : getId,
                course  : courseTitle,
                description : courseDescription,
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

    $(document).on('click','.deleteCourse', function(){
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

    $(document).on('click','.editCourse', function(){
       
        var courseData = $('#course_' + $(this).data("update"));

        $(document).find('.id').val($(this).data("update"));
        $(document).find('.course').val (courseData.data('course'));
        $(document).find('.description').val(courseData.data('description'));
       
        $(document).find('#courseModal').modal('show');
    });

});