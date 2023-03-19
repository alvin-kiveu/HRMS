<?php
include_once('connect.php');
$dbs = new database();
$db = $dbs->connection();
session_start();

if(isset($_POST['addmemo'])){
  $subject = mysqli_real_escape_string($db, $_POST['subject']);
  $content = mysqli_real_escape_string($db, $_POST['content']);
  $date = date("d-m-Y H:i:s:a");
  //CHECK IF TABLE memo IS CREATED
 
  $sql = "INSERT INTO memo (Subject, Content, Date) VALUES ('$subject', '$content', '$date')";
  if(mysqli_query($db, $sql)){
    $result = "Memo sent successfully.";
    header("location:../memoadd.php?success=$result");exit;
  } else{
    $result = "ERROR: Could not able to execute $sql. " . mysqli_error($db);
    header("location:../memoadd.php?error=$result!");exit;
  }
}