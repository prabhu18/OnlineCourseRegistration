<?php
include 'connection.php';
$username = $password = $fName=$lName=$major=$degree=$gender=$email=$phone ="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $username = test_data($_POST["username"]);
  $password = test_data($_POST["password"]);
  $fName = test_data($_POST["fName"]);
  $lName = test_data($_POST["lName"]);
  $major = test_data($_POST["major"]);
  $degree = test_data($_POST["degree"]);
  $gender = test_data($_POST["gender"]);
  $email = test_data($_POST["email"]);
  $phone = test_data($_POST["phone"]);

  if(empty($username) || empty($password) || empty($fName) || empty($lName) ||
    empty($degree) || empty($email) || empty($phone)){
   header('Location:registration.html');
   exit();
  }else{
   $name = $fName." ".$lName;
   $sql ="CALL register_a_user ('$username','$name','$password','$degree','$major',$phone,'$email','$gender') ";

   $result = mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)){
       echo $row["result"];
     }
   }else{
     echo "Error in DB call";
   }


  }
}

function test_data($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
?>
