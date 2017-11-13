<?php
	$servername = "208.91.198.197";
	$username = "yuruk";
	$password = "prabhU_18@";
	$myDB="Course_Registration";

  $conn = new mysqli($servername, $username, $password,$myDB);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  ?>
