
<?php
include 'connection.php';
session_start();
$session_username="";
$session_username= $_SESSION['username'];
echo "$session_username";

    $sql="SELECT name FROM cr_student WHERE user_id= '$session_username'" ;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        echo "<h1>Welcome,". $row["name"]. "</h1>";
      }

    }

?>
<html lang="en">
<head>
    <title>Online Course Registration</title>
    <link type="text/css" rel="stylesheet" href="../css/common.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <section>
  		<h2>Online Course Registration login</h2>
    <form action="#" method="post">

      <label>Degree:</label>
      <select name="Degree">
        <option value="Graduate">Graduate</option>
        <option value="UnderGraduate">UnderGraduate</option>
        <option value="Phd">Phd</option>
          <option value="ALl">All</option>
      </select>

      <label>Major:</label>
      <select name="Major">
        <option value="Computer Science">Computer Science</option>
        <option value="itm">ITM</option>
        <option value="Electrical Engineering">Electrical Engineering</option>
        <option value="Mechanical Engineering">Mechanical Engineering</option>
        <option value="ALl">All</option>
      </select>

      <label>Semester:</label>
      <select name="Semester">
        <option value="Fall17">Fall17</option>
          <option value="Spring18">Spring18</option>
        <option value="ALl">All</option>
      </select>
    </section>
</body>
</html>
<?php

 ?>
