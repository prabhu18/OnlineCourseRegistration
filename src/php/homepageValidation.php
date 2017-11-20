<?php
session_start();
$session_username="";
$session_username= $_SESSION['key'];
echo $session_username;
?>
