<script src="../assets/javascript/courseregistration.js" defer></script>
<main class="container mt-4" style="padding-top:2rem;">
    <section class="row modalHead">
        <div class="col-md-6 pull-left">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#courseModal">
                Create Course 
            </button>
        </div>
    </section>
    <section class="table-body mt-4">
        <table class="table table-bordered course-details">
            <thead>
                <tr align="center">
                    <td> Name </td>
                    <td> Course Details </td>
                    <td> Actions </td>
                </tr>
            </thead>
            <tbody class="courseDetails">
                <?php
                    foreach($_SESSION['getData'] as $data)
                    {
                ?>
                <tr
                    id = "course_<?php echo $data['id']; ?>"
                    data-course = "<?php echo $data['course']; ?>"
                    data-description = "<?php echo $data['description'];?>"
                    align="center"
                >
                    <td> <?php echo $data['course']; ?> </td>
                    <td> <?php echo $data['description']; ?> </td>
                    <td> 
                        <div class="row">
                            <div class="col-md-6" align="right"> <button type="button" class="btn btn-sm btn-primary editCourse" data-url = "<?php echo url()."controller/course.php"; ?>" data-update="<?php echo $data['id']; ?>"> Edit </button></div>
                            <div class="col-md-6" align="left"> <button type="button" class="btn btn-sm btn-danger deleteCourse" data-url = "<?php echo url()."controller/course.php"; ?>" data-delete="<?php echo $data['id']; ?>"> Delete </button> </div>
                        </div> 
                    </td>
                </tr>
                <?php        
                    }
                ?>
            </tbody>
        </table>
    </section>
    <!-- Student Details -->
    <section class="detailsModal">
        <div class="modal fade courseModal" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Course Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <form method="post" class="course_form"> -->
                <div class="modal-body">
                    <input class="form-control id" type="hidden" value="0">
                    <input class="form-control course" type="text" name="course" id="course" placeholder="Course Title"><br>
                    <textarea class="form-control description" name="description" id="description" placeholder = "Course Details"></textarea><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitChanges" data-url="<?php echo url()."controller/Course" ?>">Save changes</button>
                </div>
                <!-- </form> -->
                </div>
            </div>
        </div>
    </section>
</main>