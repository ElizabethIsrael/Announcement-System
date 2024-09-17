
<?php
include "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        .student-fields, .staff-fields {
            display: none;
        }
        form {
            width: 25%;
            border: 2px solid aqua;
            border-radius: 5px;
            margin-left:500px;
            padding-left: 20px;
        }
    </style>
    <script>
        function toggleFields() {
            var studentFields = document.getElementById('studentFields');
            var staffFields = document.getElementById('staffFields');
            var studentRadio = document.getElementById('student');
            var staffRadio = document.getElementById('staff');

            if (studentRadio.checked) {
                studentFields.style.display = 'block';
                staffFields.style.display = 'none';
            } else if (staffRadio.checked) {
                studentFields.style.display = 'none';
                staffFields.style.display = 'block';
            }
        }
    </script>
</head>
<body >
<div class="container">
  <h2 style=" display:flex; justify-content:center" >Registration Form</h2>
  <form  action="process.php" method="post">
    <label>
        <input type="radio" id="student" name="userType" value="student" onclick="toggleFields()"> Student
    </label>
    <label>
        <input type="radio" id="staff" name="userType" value="staff" onclick="toggleFields()"> Staff
    </label>

    <!-- Student Fields -->
    <div id="studentFields" class="student-fields">
        <h3>Student Information</h3>
        <label>First Name: <input type="text" name="studentFirstName"></label><br><br>
        <label>Last Name: <input type="text" name="studentLastName"></label><br><br>
        <label>Email: <input type="email" name="studentEmail"></label><br><br>
        <label>Password: <input type="password" name="studentPassword"></label><br><br>
        <label>Date of Birth: <input type="date" name="studentDob"></label><br><br>
        <label>Phone Number: <input type="tel" name="studentPhone"></label><br><br>

        <label>Department:</label>
        <select name="studentDepartment">
            <?php foreach($query3Result as $dattta) { ?>
            <option   value="<?php echo $dattta['department_id']?>"><?php echo $dattta['department_name']?></option>
            <?php } ?>
        </select><br><br>

        <label>Course:</label>
        <select name="studentCourse">
            <?php foreach ($query1Result as $data) { ?>
            <option  value="<?php echo $data['course_id'];?>"><?php echo $data['course_name'];?></option>
            
            <?php } ?>
        </select><br><br>

        <label>Class:</label>
        <select name="studentClass">
           <?php foreach($query2Result as $datta)  { ?>
            <option  value="<?php echo $datta['class_id']?>"><?php echo $datta['class_name']?></option>
            <?php }?>
        </select><br><br>

      <br><input type="submit" value="Register">

    </div>

    <!-- Staff Fields -->
    <div id="staffFields" class="staff-fields">
        <h3>Staff Information</h3>
        <label>First Name: <input type="text" name="staffFirstName"></label><br><br>
        <label>Last Name: <input type="text" name="staffLastName"></label><br><br>
        <label>Date of Birth: <input type="date" name="staffDob"></label><br><br>
        <label>Phone Number: <input type="tel" name="staffPhone"></label><br><br>
        <label>Email: <input type="email" name="staffEmail"></label><br><br>
        <label>Password: <input type="password" name="staffPassword"></label><br><br>

        <label>Department:</label>
        <select name="staffDepartment" >
            <?php foreach($query3Result as $dattta) { ?>
            <option value="<?php echo $dattta['department_id']?>"><?php echo $dattta['department_name']?></option>
            <?php } ?>
        </select><br><br>

        <br><input type="submit" value="Register">
    
    </div>

</form>
 </div>
</body>
</html>
