<?php
  require_once('../process/db_connect.php');

  $name = $_POST['name'];
  $job = $_POST['job'];
  $language = $_POST['language'];
  $period= $_POST['period'];
  $reference = $_POST['reference'];

  //check there is empty information. 
  if(empty($name) || empty($job) || empty($language)|| empty($period)){
        echo "<script>alert('Write Information');history.back();</script>";
        exit;
  }


  $sql = "INSERT INTO project(name,job,language,period,reference) VALUES ('$name', '$job','$language','$period','$reference')";
  $result = mysqli_query($link,$sql);

  if($result){
    echo "<script>location.href='../app/project.php';</script>";
  }
  else{
      echo"<script>alert(\"Database Error\");history.back()</script>";
  }

  mysqli_close($link);
?>
