
<?php 
include "process.php";


// Check if the user is logged in and has a role of student (role_id = 1)
if (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1) {
    header("Location: login.php");
    exit();
}

// Retrieve the logged-in student's profile data from the database
$user_Id = $_SESSION['user_id']; 

$sql = "SELECT students.first_name, students.last_name, students.dob,students.phonenumber,students.email, departments.department_name, classes.class_name, courses.course_name FROM students JOIN departments ON students.department_id = departments.department_id JOIN classes ON students.class_id = classes.class_id JOIN courses ON students.course_id = courses.course_id WHERE students.user_id = '$user_Id'";
$profiles = mysqli_query($conn,$sql);

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
            max-width: calc(100% - 270px); /* Adjusts the width so it doesn't extend into the sidebar */
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
                max-width: 100%; /* Ensures full width when sidebar collapses */
            }
        }
        /* Longer Sidebar for Better Visibility */
        .sidebar {
            height: calc(100vh - 20px);
        }
        /* Ensure that the card doesn't stretch into the sidebar */
        .card {
            max-width: 100%; /* Prevents card from extending beyond the available content area */
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        Student Dashboard
    </div>
    <nav class="nav flex-column">
        
        <a class="nav-link" href="viewstudents.php">Students</a>
        <a class="nav-link" href="viewstaffpost.php"> View Post</a>
        <a class="nav-link " href="logout.php">Logout</a>
       
    </nav>
</div>

<!-- Content -->
<div class="content">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

    <!-- Classes Section -->
    <div class="card my-4" id="classes-section">
        <div class="card-header">
           Student
            
        <div class="card-body">
      <div class="container content">
        <h3>View Profile</h3>
        <?php foreach ($profiles as $profile) {?>
            <p><strong>First Name:</strong> <?php echo $profile['first_name'] ;?></p>
            <p><strong>Last Name:</strong> <?php echo $profile['last_name'];?></p>
            <p><strong>Email:</strong> <?php echo $profile['email'] ;?></p>
            <p><strong>Phonenumber:</strong> <?php echo $profile['phonenumber'] ; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $profile['dob']; ?></p>
            <p><strong>Course:</strong>  <?php echo $profile['course_name'] ; ?></p>
            <p><strong>Class:</strong> <?php echo $profile['class_name'] ; ?></p>
            <p><strong>Department:</strong><?php echo $profile['department_name'] ;?></p>
            <?php } ?>
    </div>
        </div>
    </div>

    

        
                           
                       
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
