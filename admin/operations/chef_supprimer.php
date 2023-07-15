<?php
include "../db_conn.php";
session_start(); 
if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $sql="delete from chef where id='$id'";
$result=mysqli_query($conn,$sql);

if ($conn->query($sql) === TRUE) {
  header("Location:../chef.php");
} } 




 ?>