<?php
$conn = new mysqli("localhost", "root", "", "z-travel");
if($conn->connect_errno){
  echo "Connection Failed: " . $conn->connect_error;
}