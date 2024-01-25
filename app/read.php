<?php 
  require_once('../process/db_connect.php');
  $project_id = $_GET["project_id"];
  $sql = "SELECT * FROM project where project_id='$project_id'"; 
  $result = mysqli_query($link,$sql);


  if(!$result){
      echo "<script>alert(\"Post Does Not Exist\");history.back()</script>";
  }

  $data = mysqli_fetch_row($result);

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Post</title>
  <link rel="stylesheet" href="../css/main.css" />
</head>

<body>
    <div id="nav">
        <a href="../app/main.html">PROFILE</a>
        <a href="../app/history.html">HISTORY</a>
        <a href="../app/skill.php">SKILL</a>
        <a href="../app/project.php">PROJECT</a>
        <a href="../app/contact.html">CONTACT</a>
    </div>

    <div id="content">
      <h6 class="page_title"><?php echo $data[1];?> project</h6>
        <div id="article" >
          <div id="post" >
            <b>Role</b> :  <?php echo $data[2];?><br><br>
            <b>Language</b> : <?php echo $data[3];?><br><br>
            <b>Period </b> : <?php echo $data[4];?><br><br>
            <b>Reference</b> : <?php echo $data[5];?>
          </div>
          
          <?php

          if(array_key_exists('remove',$_POST)){
              $sql = "DELETE FROM project WHERE project_id='$project_id'";
              $result = mysqli_query($link,$sql);

              if(!$result){
                echo"<script>alert(\"Database Error\");history.back();</script>";
              }
              else{
                echo"<script>alert(\"Successfully removed\");";
                echo "location.href='../app/project.php';</script>";
              }
          }
          
          echo "<form method='POST'>";
          echo "<div class='button-container'>";
          echo "<button name='remove'>delete</button></div></form>";

          echo "<div class='button-container'>";
          echo "<a href='../app/project.php'><button name='back'>back</button></a></div>";
          ?>

    </div>
</body>
</html>
