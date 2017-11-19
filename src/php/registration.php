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
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);
   $sql ="CALL register_a_user ('$username','$name','$hashed_password','$degree','$major',$phone,'$email','$gender') ";

   $result = mysqli_query($conn,$sql);
   if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)){
       //echo $row["result"];
      if (strcmp($row["result"],"registration complete") == 0) {
        header('Location:login.html');
      }elseif (strcmp($row["result"],"net id already present") == 0) {
        echo "<script>
            alert('Username already exists please login');
              window.location.href='login.html';
              </script>";
      }else {
        echo "<script>
            alert('Username Not found in University Database, please try again');
              window.location.href='registration.html';
              </script>";
      }
     }
   }else{
     echo "<script>
         alert('Something is wrong, Please try again');
           window.location.href='registration.html';
           </script>";
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
