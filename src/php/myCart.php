<?php
include 'connection.php';
session_start();
$session_username = $_SESSION['username'];
?>
<html lang="en">
<head>
    <title>Online Course Registration</title>
    <link type="text/css" rel="stylesheet" href="../css/common.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>
    <section>
        <h2>Online Course Registration My Cart</h2>
          <?php

          if($_SERVER["REQUEST_METHOD"] == "POST"){

            echo "<form>
            <table>
              <tr>
                <th>course_id</th>
                <th>instructor_id</th>
                <th>Semester</th>
              </tr>";
            $checked_count = count($_POST['checkbox1']);
            foreach($_POST['checkbox1'] as $selected) {
              $pieces = explode(" ", $selected);
              //echo "<p>".$pieces[0] ."</p>";
              //echo $pieces[1];
              //echo $pieces[2];
              $sql3="INSERT INTO cr_cart(cart_id,course_id,instructor_id,semester) VALUES('$session_username','$pieces[0]','$pieces[1]','$pieces[2]') ";
              mysqli_query($conn, $sql3);

              $sql4="SELECT course_id,instructor_id,semester FROM cr_cart WHERE cart_id= '$session_username'";
              $result4=mysqli_query($conn, $sql4);

              if (mysqli_num_rows($result4) > 0) {
                  while ($row = mysqli_fetch_assoc($result4)) {
                    echo "<tr>";
                    echo "<td> " . $row['course_id'] . "</td>";
                    echo "<td>" . $row['instructor_id'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                  echo "<button id='enroll'>Enroll</button>";
                  echo "</form>";
              }
          }
        }
          ?>

    </section>
</body>
</html>
