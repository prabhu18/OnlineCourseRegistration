
<?php
include 'connection.php';
session_start();
$session_username="";
$session_username= $_SESSION['username'];

    $sql="SELECT name FROM cr_student WHERE user_id= '$session_username'" ;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        echo "<h1>Welcome,". $row["name"]. "</h1>";
      }
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){

      $major=$_POST["Major"];
      $degree=$_POST["Degree"];
      $sem=$_POST["Semester"];

    }
    echo "$major";
    echo "$degree";
    echo "$sem";
    $sql2="";
    $result2 = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result2) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['year'] . "</td>";
						echo "<td>" . $row['ranking'] . "</td>";
						echo "<td>" . $row['gender'] . "</td>";
						echo "</tr>";
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
<form action="#" method="POST">
      <label>Degree:</label>
      <select name="Degree">
        <option value="Graduate">Graduate</option>
        <option value="UnderGraduate">UnderGraduate</option>
        <option value="Phd">Phd</option>
          <option value="ALl">All</option>
      </select>

      <label>Major:</label>
      <select name="Major">

        <option value="Computer Science"<?= $_REQUEST["Major"]=="Computer Science"?" selected='selected'":"" ?>>Computer Science</option>
        <option value="Mechanical Engineering"<?= $_REQUEST["Major"]=="Mechanical Engineering"?" selected='selected'":"" ?>>Mechanical Engineering</option>
        <option value="itm"<?= $_REQUEST["Major"]=="itm"?" selected='selected'":"" ?>>ITM</option>
        <option value="Electrical Engineering"<?= $_REQUEST["Major"]=="Electrical Engineering"?" selected='selected'":"" ?>>Electrical Engineering</option>
        <option value="All"<?= $_REQUEST["Major"]=="All"?" selected='selected'":"" ?>>All</option>
      </select>

      <label>Semester:</label>
      <select name="Semester">
        <option value="Fall17">Fall17</option>
          <option value="Spring18">Spring18</option>
        <option value="ALl">All</option>
      </select>
        <button id="search">Search</button>

      </form>
    </section>
</body>
</html>
