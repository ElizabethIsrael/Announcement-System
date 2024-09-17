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
    $Studentpassword = $_POST['studentPassword'];
    $Studentdate = $_POST['studentDob'];
    $Studentphnumber = $_POST['studentPhone'];
    $Studentcourse = $_POST['studentCourse'];
    $Studentdepartment = $_POST['studentDepartment'];
    $Studentclass = $_POST['studentClass'];
    
    $query = "INSERT INTO students(first_name,last_name,dob,class_id,phonenumber,email,password,department_id,course_id) VALUES('$StudentFname','$StudentLname','$Studentdate','$Studentclass','$Studentphnumber','$Studentemail',' $Studentpassword','$Studentdepartment','$Studentcourse')";
    mysqli_query($conn,$query);//execute the query
  header("location:index.php");//for redirect

  $Stdusername = strtolower($StudentFname.' @ '.$StudentLname);
    $Stupassword = 123;
    $roleId =1;
    $hashedPassword =password_hash( $Stupassword,PASSWORD_BCRYPT);
    $sql = "INSERT INTO users ( username,password,role_id) VALUES ('$Stdusername','$hashedPassword','$roleId')";
     mysqli_query($conn,$sql);

}
   else if  (isset($_POST['staffFirstName'])) {


      $Stafffname = $_POST['staffFirstName'];
      $Stafflname = $_POST['staffLastName'];
      $Staffdate = $_POST['staffDob'];
      $Staffemail = $_POST['staffEmail'];
      $Staffpassword = $_POST['staffPassword'];
      $staffdepartment = $_POST['staffDepartment'];
      $staffPhone = $_POST['staffPhone'];


      $query = "INSERT INTO staffs(first_name,last_name,dob,phonenumber,email,password,department_id) VALUES('$Stafffname','$Stafflname','$Staffdate', '$staffPhone','$Staffemail','$Staffpassword','$staffdepartment')";
      mysqli_query($conn,$query);//execte the query
      header("location:index.php");

      $Stfusername = strtolower($Stafffname.'_'.$Stafflname);
      $Staffpassword = 234;
      $role_Id = 2;
      $HashedPassword =password_hash( $Staffpassword,PASSWORD_BCRYPT);
      $sql1 = "INSERT INTO users ( username,password,role_id) VALUES ('$Stfusername','$HashedPassword',' $role_Id')";
      mysqli_query($conn,$sql1);


      
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

if(isset($_POST['firstnamee'])){
$userfirstname = $_POST['firstnamee'];
$userlastname =  $_POST['lastname'];
$userpassword =  $_POST['password'];
$userrole =$_POST['role'];
 $username = strtolower($userfirstname.'_'.$userlastname);
 $HashedPassword =password_hash( $userpassword,PASSWORD_BCRYPT);
$user= "INSERT INTO users(username,password,role_id) VALUES ('$username','$HashedPassword','$userrole')";
mysqli_query($conn,$user);
header("location:viewusers.php");
}









?>