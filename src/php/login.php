<?php
include 'connection.php';
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

  $usernameData= test_data($_POST["username"]);
  $paswordData= test_data($_POST["password"]);

  if(empty($usernameData)|| empty($paswordData)){
    header("location:login.html");
    exit();
  }
  else{
    $sql="SELECT * FROM cr_student WHERE user_id= '$usernameData'" ;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $_SESSION["username"] = $usernameData;
      header("location:homepage.php");
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
