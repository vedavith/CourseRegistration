<script src="../assets/javascript/registration.js" defer></script>
<pre>
  <?php  
       $registrationData = $_SESSION['getData']['registrationData']; 
       $studentData = $_SESSION['getData']['studentData'];
       $courseData = $_SESSION['getData']['courseData'];
    ?>
</pre>
<main class="container mt-4" style="padding-top:2rem;">
    <section class="row modalHead">
        <div class="col-md-6 pull-left">
            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#courseModal">
               Student Course Registration 
            </button>
        </div>
    </section>
    <section class="table-body mt-4">
        <table class="table table-bordered registration-details">
            <thead>
                <tr align="center">
                    <td> Name </td>
                    <td> Course </td>
                </tr>
            </thead>
            <tbody class="registrationDeatils">
                <?php
                    foreach($registrationData as $data)
                    {
                ?>
                <tr
                    id = "registration_<?php echo $data['RegistrationID']; ?>"
                    data-firstname = "<?php echo $data['FirstName']; ?>"
                    data-lastname = "<?php echo $data['LastName'];?>"
                    data-course = "<?php echo $data['Course'];?>"
                    align="center"
                >
                    <td> <?php echo $data['FirstName']." ".$data['LastName']; ?> </td>
                    <td> <?php echo $data['Course']; ?> </td>
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
                    <select class="form-control student" id="student">
                        <option value="0" selected> Select Student </option>
                        <?php
                            foreach($studentData as $student)
                            {

                        ?>
                        <option value="<?php echo $student['id'] ?>"> <?php echo $student['first_name']." ".$student['last_name'] ?> </option>
                        <?php 
                            }
                        ?>
                    </select><br>
                    <select class="form-control course" id="course">
                        <option value="0" selected> Select Course </option>
                        <?php
                            foreach($courseData as $course)
                            {
                        ?>
                        <option value="<?php echo $course['id'] ?>"> <?php echo $course['course']; ?> </option>
                        <?php 
                            }
                        ?>
                    </select>
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