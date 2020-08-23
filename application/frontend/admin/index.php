<?php 
$username = $_COOKIE['username'];
if (!isset($username)) {
  header('location:login.php');
}
