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
        Staff Dashboard
    </div>
    <nav class="nav flex-column">
        <a class="nav-link " href="staffdashboard.php">staff profile</a>
        <a class="nav-link active" href="staffpost.php">Post Announcement</a> 
        <a class="nav-link " href="logout.php">Logout</a> 
    </nav>
</div>

<!-- Content -->
<div class="content">
    <h2>Welcome, Staff</h2>

    <!-- Classes Section -->
    <div class="card my-4" id="classes-section">
        <div class="card-header">
            Classes
            <button class="btn btn-success float-center" data-bs-toggle="modal" data-bs-target="#addClassModal">Add Class</button>
        </div>
        <div class="card-body">
        <div class="container content">
        <h3>Post Announcement</h3>
        <form action="process.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="announcementTitle" class="form-label">Announcement Title</label>
                <input type="text" class="form-control" id="announcementTitle" name="announcementTitle" required>
            </div>
            <div class="mb-3">
                <label for="announcementCategory" class="form-label">Category</label>
                <select class="form-select" id="announcementCategory" name="announcementCategory" required>
                    <option selected>Select Category</option>
                    <?php foreach($categories as $data) { ?>
                    <option value="<?php echo $data['category_id'];?>"><?php echo $data['category_name'];?></option>
                  <?php } ?> 
                </select>
            </div>
            <div class="mb-3">
                <label for="attachment"  class="form-label">Upload Attachment</label>
                <input type="file" class="form-control" id="attachment" name="attachment" required>
            </div>
            <button type="submit" class="btn btn-success">Post Announcement</button>
        </form>
    </div>
        </div>
    </div>

    

        
                           
                       
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
