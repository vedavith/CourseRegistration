$(document).ready(function(){
    $(".registration-details").DataTable();

    $(document).on('click','.add-course',function(){
        htmlAppender = `<div class="row"><div class="col-md-8">`;
        htmlAppender += "<select class='form-control course'><option value='0' selected> Select Course </option>";
        htmlAppender +=  $.returnOptions(courseData);
        htmlAppender += "</select>";
        htmlAppender +=  `</div>
                            <div class="col-md-4">  
                            <button type="button" class="btn btn-sm btn-danger remove-course"> Remove Course </button>
                            </div></div><br>`;

        $(document).find('.course-appender').append(htmlAppender);                            
    });

    $(document).on('click','.submitChanges',function(){
        var getUrl = $(this).data('url');
        var courseArray = [];
        var student = $(document).find('.student').val();
        var flag = 1;
        var i = 0
        $('.course').each(function(){
            courseArray[i] = $(this).val();
            i++;
        })
        var payload = {
            student : student,
            course : courseArray,
            flagger : flag
        };

        $.ajax({
            url : getUrl,
            method : 'POST',
            data : payload,
            success : function(response){
                //location.reload();
            },
            error : function(response){
                console.error(response);
            }
        });
    });

});

$.appender = "";
$.returnOptions = function(courseData){
    $.each(courseData, function(key, value){
         $.appender += `<option value='${value.id}'> ${value.course} </option>`;
    });
    return $.appender;
};