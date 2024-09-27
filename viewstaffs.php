<?php
include "process.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #343a40;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding: 20px;
            overflow-y: auto;
            transition: width 0.3s;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
        }
        .sidebar .sidebar-header {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        /* Responsive Sidebar */
        @media (max-width: 992px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                overflow-y: visible;
            }
            .content {
                margin-left: 0;
            }
        }
        /* Longer Sidebar for Better Visibility */
        .sidebar {
            height: calc(100vh - 20px);
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        Admin Dashboard
    </div>
    <nav class="nav flex-column">
        <a class="nav-link" href="viewstudents.php">Students</a>
        <a class="nav-link active" href="viewstaffs.php">Staffs</a>
        <a class="nav-link" href="viewusers.php">Users</a>
        <a class="nav-link" href="viewcourse.php">Courses</a>
        <a class="nav-link" href="viewdepartment.php">Departments</a>
        <a class="nav-link" href="viewclass.php">Classes</a>
        <a class="nav-link" href="viewclass.php">Logout</a>
        <a class="nav-link" href="viewstaffpost.php">View Post </a>
    </nav>
</div>

<!-- Content -->
<div class="content">
    <h2>Welcome, Admin</h2>

    <!-- Students Section -->
    <div class="card my-4" id="courses-section">
        <div class="card-header">
           Staffs
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addStaffModal">Add Staff</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th> Firstname</th>
                        <th> Last name</th>
                        <th> Dob </th>
                        <th>Phonenumber</th>
                        <th> Email</th>
                         <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Course Row -->
                   
                    <?php
                      $i=1;
                     foreach($staffs as $staff) {?>
                    <tr>
                        <td><?php echo $i++; //$student['staff_id']; ?></td>
                        <td><?php echo $staff['first_name']; ?></td>
                        <td><?php echo $staff['last_name']; ?></td>
                        <td><?php echo $staff['dob'] ;?></td>
                        <td><?php echo $staff['phonenumber'] ;?></td>
                        <td><?php echo $staff['email']; ?></td>
                        <td><?php echo $staff['department_id']; ?></td>
                        
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>

   

<!-- Add Staffs Modal -->
<div class="modal fade" id="addStaffModal" tabindex="-1" aria-labelledby="addStaffModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStaffModalLabel">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="POST">
                <h3>Add Staff Information</h3>
        <label>First Name: <input type="text" name="staffFirstName"></label><br><br>
        <label>Last Name: <input type="text" name="staffLastName"></label><br><br>
        <label>Date of Birth: <input type="date" name="staffDob"></label><br><br>
        <label>Phone Number: <input type="tel" name="staffPhone"></label><br><br>
        <label>Email: <input type="email" name="staffEmail"></label><br><br>

        <label>Department:</label>
        <select name="staffDepartment" >
            <?php foreach($query3Result as $dattta) { ?>
            <option value="<?php echo $dattta['department_id']?>"><?php echo $dattta['department_name']?></option>
            <?php } ?>
        </select><br><br>

        <br><input type="submit" value="Register">
    
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
