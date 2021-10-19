<?php
require('db.php');

$validatefname="";
$validatefname="";
$validatename="";
$validateemail="";
$validatepassword="";
$validatecheckbox="";
$validateradio="";
$validateage="";
$validatefile="";
$L1=$L2=$L3="";

$fname=$lname=$dob=$email=$number=$gender=$hsc=$ssc=$course=$year=$semester="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$fname=$_REQUEST["fname"];
$lname=$_REQUEST["lname"];
$email=$_REQUEST["email"];
$dob=$_REQUEST["dob"];
$number=$_REQUEST["number"];
$gender=$_REQUEST["gender"];
$hsc=$_REQUEST["hsc"];
$ssc=$_REQUEST["ssc"];
$course=$_REQUEST["course"];
$year=$_REQUEST["year"];
$semester=$_REQUEST["semester"];


if(empty($_REQUEST["fname"]) || (strlen($_REQUEST["fname"])<5))
{
    $validatefname= "you must First enter name ||";

}
// elseif (!preg_match('/^\w{5,}$/', $fname)) {
//   $validatefname= "you must valid  enter name ||";
// }
else
{
    $fname=$_REQUEST["fname"];
    $validatefname = "your first is ".$fname;
}

if(empty($_REQUEST["number"]) || (strlen($_REQUEST["number"])<11))
{
    $validatefname= "you must phone number ||";

}
// elseif (!preg_match('/^\w{5,}$/', $fname)) {
//   $validatefname= "you must valid  enter name ||";
// }
else
{
    $number=$_REQUEST["number"];
    $validatenumber = "your first is ".$number;
}

if(empty($_REQUEST["dob"]))
{
    $validatename= "you must dob||";

}else {
  echo "";
}
if(empty($_REQUEST["lname"]) || (strlen($_REQUEST["lname"])<5))
{
    $validatename= "you must Last enter name||";

}
else
{
    $name=$_REQUEST["lname"];
    $validatename = " || your last is : ".$lname;
}

if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
{
    $validateemail="you must enter email ||";
}
else{
    $validateemail= " || your email is\n ".$email;
}


if(isset($_REQUEST["gender"]))
{
    $validateradio= $_REQUEST["gender"];
}
else{
    $validateradio= "please select at least one radio ||";
}


  $data = new db;
   $success_message = '';
$insert_data = array(
         'fname'     =>     mysqli_real_escape_string($data->con, trim($_POST['fname'])),
         'lname'          =>     mysqli_real_escape_string($data->con, $_POST['lname']),
         'email'          =>     mysqli_real_escape_string($data->con, $_POST['email']),
         'dob'          =>     mysqli_real_escape_string($data->con, $_POST['dob']),
         'gender'          =>     mysqli_real_escape_string($data->con, $_POST['gender']),
         'number'          =>     mysqli_real_escape_string($data->con, $_POST['number']),
         'hsc'          =>     mysqli_real_escape_string($data->con, $_POST['hsc']),
         'ssc'          =>     mysqli_real_escape_string($data->con, $_POST['ssc']),
         'course'          =>     mysqli_real_escape_string($data->con, $_POST['course']),
         'year'          =>     mysqli_real_escape_string($data->con, $_POST['year']),
         'semester'          =>     mysqli_real_escape_string($data->con, $_POST['semester'])

    );



    if($data->insert('New_Students', $insert_data))
    {
         echo "data inserted successfully";
    }

}
?>
