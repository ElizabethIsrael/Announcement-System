
<?php
include "process.php";


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcements</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
    background-color: #f8f9fa;
}

.sidebar {
    height: 100vh;
    width: 250px; /* Fixed width for sidebar */
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

/* Content section accounting for the sidebar */
.container {
    margin-left: 270px; /* Adjusts to prevent overlap with sidebar */
    margin-top: 50px;
    transition: margin-left 0.3s;
}

.announcement-card {
    margin-bottom: 20px;
}

/* Adjust layout on smaller screens */
@media (max-width: 992px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
    .container {
        margin-left: 0; /* No left margin on small screens */
        margin-top: 20px;
    }
}
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-header">
        Admin Dashboard
    </div>
    <nav class="nav flex-column">
        <a class="nav-link" href="staffdashboard.php">Staff profile</a>
        <a class="nav-link" href="viewstaffpost.php">View Post </a>
        <a class="nav-link" href="viewclass.php">Logout</a>
    </nav>
</div>

    <div class="container">
        <h2>Announcements</h2>

        <!-- Sample Announcement Cards (Replace with dynamic content) -->
        

        <div class="card announcement-card">
            <div class="card-body">
                <?php foreach  ($announcements as $data) { ?>
                <h5 class="card-title"><?php echo $data['announcement_title'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo['category_name'];?></h6>
                <p class="card-text"><small class="text-muted"><?php echo $data['PostedByName'];?>/small></p>
                <p class="card-text"><?php echo $data['created_at'];?></p>
                <a href="<?php echo $data['attachment_path']; ?>" class="card-link" target="_blank">View Attachment</a>
                
                <?php } ?>
            </div>
        </div>

        <!-- Add more announcements as needed -->
        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
