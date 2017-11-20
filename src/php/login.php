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
    $password="";
    $sql="SELECT password FROM cr_student WHERE user_id= '$usernameData'" ;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

      while($row = mysqli_fetch_assoc($result)){
        $password= $row["password"];
      }
    }else {
      echo "<script>
          alert('Incorrect username and password combination');
            window.location.href='login.html';
            </script>";
    }
    if (password_verify($paswordData, $password)) {
        header("location:homepage.php");
    }else {
      echo "password not matching";
      echo "\nfetch password:".$password;
      echo "\ngiven password:".$paswordData;

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
