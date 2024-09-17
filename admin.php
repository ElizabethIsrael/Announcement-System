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
        <a class="nav-link active" href="#">Dashboard</a>
        <a class="nav-link" href="viewstudents.php">Students</a>
        <a class="nav-link" href="viewstaffs.php">Staffs</a>
        <a class="nav-link" href="viewusers.php">Users</a>
        <a class="nav-link" href="viewcourses.php">Courses</a>
        <a class="nav-link" href="viewdepartment.php">Departments</a>
        <a class="nav-link" href="viewclass.php">Classes</a>
        <a class="nav-link" href="viewclass.php">Post Announcement</a>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Course Row -->
                    
                     
                    <tr>
                        <td>1</td>
                        <td>Computer Science</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>

    <!-- Departments Section -->
    <div class="card my-4" id="departments-section">
        <div class="card-header">
            Departments
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">Add Department</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Department Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Department Row -->
                    <tr>
                        <td>1</td>
                        <td>Engineering</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Classes Section -->
    <div class="card my-4" id="classes-section">
        <div class="card-header">
            Classes
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addClassModal">Add Class</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Class Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Class Row -->
                    <tr>
                        <td>1</td>
                        <td>Year 1</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Users Section -->
    <div class="card my-4" id="users-section">
        <div class="card-header">
            Users
            <button class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#addUserModal">Add User</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example User Row -->
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>Student</td>
                        <td>
                            <button class="btn btn-warning btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
                        <label for="course-name" class="form-label">Course Name</label>
                        <input type="text" class="form-control" id="course-name"  name ="coursename" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDepartmentModalLabel">Add Department</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="department-name" class="form-label">Department Name</label>
                        <input type="text" class="form-control" id="department-name" name=" departmentname"required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add Class Modal -->
<div class="modal fade" id="addClassModal" tabindex="-1" aria-labelledby="addClassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClassModalLabel">Add Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="class-name" class="form-label">Class Name</label>
                        <input type="text" class="form-control" id="class-name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="user-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="user-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="user-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="user-email" required>
                    </div>
                    <div class="mb-3">
                        <label for="user-role" class="form-label">Role</label>
                        <select id="user-role" class="form-select" required>
                            <option value="student">Student</option>
                            <option value="staff">Staff</option>
                        </select>
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
