
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
        <a class="nav-link " href="viewstaffs.php">Staffs</a>
        <a class="nav-link" href="viewusers.php">Users</a>
        <a class="nav-link active" href="viewcourse.php">Courses</a>
        <a class="nav-link" href="viewdepartment.php">Departments</a>
        <a class="nav-link" href="viewclass.php">Classes</a>
        <a class="nav-link" href="viewstaffpost.php">View Post </a>
        <a class="nav-link" href="viewclass.php">Logout</a>
    </nav>
</div>

<!-- Content -->
<div class="content">
    <h2>Welcome, Admin</h2>

    <!-- Courses Section -->
    <div class="card my-4" id="courses-section">
        <div class="card-header">
            Courses
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addCourseModal">Add Course</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Course Name</th>
                        <th>Department Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Course Row -->
                    <?php
                    $i =1;
                    foreach($query1Result as $data) { ?>
                     
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['course_name']; ?></td>
                        <td><?php echo $data['department_id']; ?></td>
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

    

   
<!-- Modals -->
<!-- Add Course Modal -->
<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCourseModalLabel">Add Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="process.php" method="POST">
                    <div class="mb-3">
                  
                    <label>Course:</label>
                        <select name="studentCourse">
                            <?php foreach ($query1Result as $data) { ?>
                            <option  value="<?php echo $data['course_id'];?>"><?php echo $data['course_name'];?></option>
                            
                            <?php } ?>
                        </select><br><br>
                        <label>Department:</label>
                        <select name="studentDepartment">
                            <?php foreach($query3Result as $dattta) { ?>
                            <option   value="<?php echo $dattta['department_id']?>"><?php echo $dattta['department_name']?></option>
                            <?php } ?>
                        </select><br><br>

                        
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>




<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
