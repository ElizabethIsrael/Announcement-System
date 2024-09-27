<?php
include "dbconnection.php";

$query1 = "SELECT * FROM COURSES";
$query1Result = mysqli_query($conn,$query1);

$query2 = "SELECT * FROM CLASSES";
$query2Result= mysqli_query($conn,$query2);


$query3 = "SELECT * FROM departments";
$query3Result = mysqli_query($conn,$query3);
//collect data for students
if  (isset($_POST['studentFirstName'])) {
    $StudentFname = $_POST['studentFirstName'];
    $StudentLname = $_POST['studentLastName'];
    $Studentemail = $_POST['studentEmail'];
    $Studentdate = $_POST['studentDob'];
    $Studentphnumber = $_POST['studentPhone'];
    $Studentcourse = $_POST['studentCourse'];
    $Studentdepartment = $_POST['studentDepartment'];
    $Studentclass = $_POST['studentClass'];
    
    $username = strtolower($StudentFname.' _ '.$StudentLname);
    $Stupassword = 123;
    $roleId =1;  
    //$hashedPassword =password_hash( $Stupassword,PASSWORD_BCRYPT);
    $sql = "INSERT INTO users ( username,password,role_id) VALUES ('$username','$Stupassword','$roleId')";
     mysqli_query($conn,$sql);
     //header("location:viewstudents.php");

     //Get the inserted userid
     $userid= mysqli_insert_id($conn);

    $query = "INSERT INTO students(first_name,last_name,dob,class_id,phonenumber,email,department_id,course_id,user_id) VALUES('$StudentFname','$StudentLname','$Studentdate','$Studentclass','$Studentphnumber','$Studentemail','$Studentdepartment','$Studentcourse','$userid')";
    mysqli_query($conn,$query);//execute the query
    header("location:studentprofile.php");
    
   
}
   else if  (isset($_POST['staffFirstName'])) {


      $Stafffname = $_POST['staffFirstName'];
      $Stafflname = $_POST['staffLastName'];
      $Staffdate = $_POST['staffDob'];
      $Staffemail = $_POST['staffEmail'];
      
      $staffdepartment = $_POST['staffDepartment'];
      $staffPhone = $_POST['staffPhone'];
       

      $username = strtolower($Stafffname.'_'.$Stafflname);
      $Staffpassword = 123;
      $role_Id = 2;
      //$HashedPassword =password_hash( $Staffpassword,PASSWORD_BCRYPT);
      $sql1 = "INSERT INTO users ( username,password,role_id) VALUES ('$username','$Staffpassword',' $role_Id')";
      mysqli_query($conn,$sql1);

      $userid= mysqli_insert_id($conn);


      $query = "INSERT INTO staffs(first_name,last_name,dob,phonenumber,email,department_id,user_id) VALUES('$Stafffname','$Stafflname','$Staffdate', '$staffPhone','$Staffemail','$staffdepartment','$userid')";
      mysqli_query($conn,$query);//execte the query
      

      

      header("location:viewstaffs.php");
      
    }
  
    //select to insert into students table
$querry = "SELECT * FROM students ";   
$students = mysqli_query($conn, $querry);

//select to insert into staffs table
$querry = "SELECT * FROM staffs ";
$staffs = mysqli_query($conn, $querry);

  //insert into  classes
 if(isset($_POST['studentClass'])){

$StudentClass = $_POST['studentClass'];
$studentCourse = $_POST['studentCourse'];
 $queryclass ="INSERT INTO classes(class_name,course_id) VALUES('$StudentClass','$studentCourse')";
mysqli_query($conn,$queryclass);
header("location:viewclass.php");

 }
 
  //insert into  courses 
  if(isset($_POST['studentCourse'])){

    $StudentCourse = $_POST['studentCourse'];
    $studentDepartment = $_POST['studentDepartment'];
     $querycourse ="INSERT INTO courses(course_name,department_id) VALUES('$StudentCourse','$studentDepartment')";
    mysqli_query($conn,$querycourse);
    header("location:viewcourse.php");
    
     }
  

 //insert into  departments 
 if(isset($_POST['studentDepartment'])){
  $studentDepartment = $_POST['studentDepartment'];
   $querydepartment ="INSERT INTO departments(department_name) VALUES('$studentDepartment')";
  mysqli_query($conn,$querydepartment);
  header("location:viewdepartment.php");
  
   }


  //select to insert into s table
$querry = "SELECT * FROM users ";
$users= mysqli_query($conn, $querry);

$querry = "SELECT * FROM roles ";
$roles= mysqli_query($conn, $querry);

/*if(isset($_POST['firstnamee'])){
$userfirstname = $_POST['firstnamee'];
$userlastname =  $_POST['lastname'];
$userpassword =  $_POST['password'];
$userrole =$_POST['role'];
 $username = strtolower($userfirstname.'_'.$userlastname);
 $HashedPassword =password_hash( $userpassword,PASSWORD_BCRYPT);
$user= "INSERT INTO users(username,password,role_id) VALUES ('$username','$HashedPassword','$userrole')";
mysqli_query($conn,$user);
header("location:viewusers.php");
}*/



//SESSION
// SESSION
session_start();

if (isset($_POST['send'])) {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    //$hashedPassword1 =password_hash( $Password,PASSWORD_BCRYPT);
  
    // Fetch the user from the database
    $query = "SELECT * FROM users WHERE username = '$Username' && password = '$Password' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
       

        

        //if (password_verify($Password,  $Password2 )) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            // Redirect based on role
            if ($user['role_id'] == 1) {
                // Redirect to student dashboard
                header("Location: studentdashboard.php");
            } elseif ($user['role_id'] == 2) {
                // Redirect to staff dashboard
                header("Location: staffdashboard.php");
            }
         //} else {
        //     // Invalid password
        //     echo "Invalid password";
        // }
        // exit();
    } else {
        // User not found
        echo "No user found with that username";
    }
}



//POST AANOUNCEMENTS
  $category = "SELECT * FROM announcement_categories ";
  $categories = mysqli_query($conn, $category);

  if (isset($_POST['announcementTitle'])){
    $announcementtitle = $_POST['announcementTitle'];
    $announcementcategory = $_POST['announcementCategory'];
    
    $userid = $_SESSION['user_id'];
    $created_at = date('Y-m-d H:i:s');

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["attachment"]["name"]);
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); 
    
    $valid_file_types = ['pdf', 'jpg', 'jpeg', 'png', 'doc', 'docx'];
    if (in_array($fileType, $valid_file_types)){ 
            if (move_uploaded_file($_FILES["attachment"]["tmp_name"], $target_file)) {

              
              $query = " INSERT INTO announcements(announcement_title,category_id,attachment_path,attachment_type,posted_by, created_at) VALUES('$announcementtitle','$announcementcategory','$target_file','$fileType','$userid','$created_at') ";
               mysqli_query($conn,$query);
            }else{
                echo"Error in uploading file";
            }
            
        }

            
            else{
        echo "Sorry, only PDF, JPG, JPEG, PNG, DOC, and DOCX files are allowed.";
    }
}

  $query = "SELECT a.announcement_title, a.attachment_path, a.created_at, c.category_name, 
                    CONCAT(s.first_name,'',s.last_name) As PostedByName
                    FROM announcements As a 
                   JOIN announcement_categories As c ON a.category_id = c.category_id 
                    JOIN users As u  ON a.posted_by = u.user_id
                   JOIN staffs As s  ON u.user_id = s.user_id ORDER BY created_at DESC ";
                 $announcements = mysqli_query($conn,$query);   

?>