<script src="../assets/javascript/studentregisteration.js"></script>
<main class="container mt-4" style="padding-top:2rem;">
    <section class="row modalHead">
     <div class="col-md-6 pull-left">
     <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#studentModal">
        Create Student Details
    </button>
     </div>
    </section>
    <section class="table-body mt-4">
        <table class="table table-bordered student-details">
            <thead>
                <tr align="center">
                    <td> Name </td>
                    <td> DOB </td>
                    <td> Phone </td>
                    <td> Actions </td>
                </tr>
            </thead>
            <tbody class="studentDetails">
                <?php
                    foreach($_SESSION['getData'] as $data)
                    {
                ?>
                <tr
                    id = "student_<?php echo $data['id']; ?>"
                    data-firstname = "<?php echo $data['first_name']; ?>"
                    data-lastname = "<?php echo $data['last_name'];?>"
                    data-dob = "<?php echo $data['dob']?>"
                    data-contact = "<?php echo $data['contact'];?>"
                    align="center"
                >
                    <td> <?php echo $data['first_name']." ".$data['last_name']; ?> </td>
                    <td> <?php echo $data['dob']; ?> </td>
                    <td> <?php echo $data['contact']; ?> </td>
                    <td> 
                        <div class="row">
                            <div class="col-md-6" align="right"> <button type="button" class="btn btn-sm btn-primary editstudent" data-url = "<?php echo url()."controller/student.php"; ?>" data-update="<?php echo $data['id']; ?>"> Edit </button></div>
                            <div class="col-md-6" align="left"> <button type="button" class="btn btn-sm btn-danger deleteStudent" data-url = "<?php echo url()."controller/student.php"; ?>" data-delete="<?php echo $data['id']; ?>"> Delete </button> </div>
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
        <div class="modal fade studentModal" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- <form method="post" class="student_form"> -->
                <div class="modal-body">
                    <input class="form-control first_name" type="text" name="first_name" id="first_name" placeholder="First Name"><br>
                    <input class="form-control last_name" type="text" name="last_name" id="last_name" placeholder = "Last Name"><br>
                    <input class="form-control dob" type="date" name="dob" id="dob" placeholder="DOB"><br>
                    <input class="form-control phone" type="text" name="phone" id="phone" placeholder="Phone"><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submitChanges" data-url="<?php echo url()."controller/Student" ?>">Save changes</button>
                </div>
                <!-- </form> -->
                </div>
            </div>
        </div>
    </section>
</main>