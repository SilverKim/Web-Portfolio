<?php 
  require_once('../process/db_connect.php');

  $sql = "SELECT project_id, 
          CASE WHEN LENGTH(name) > 25 THEN CONCAT(SUBSTRING(name, 1, 25), ' ...')
           ELSE name 
          END AS name,     
            job, `language`, period, reference FROM project"; //
  $result = mysqli_query($link,$sql);

  if(!$result){
      echo"<script>alert(\"Database Error\");history.back();</script>";
  }


?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Project</title>
  <link rel="stylesheet" type="text/css" href="../css/main.css"/>
</head>
<body> <!-- set a category --> 
    <div id="nav">
        <a href="../app/main.html">PROFILE</a>
        <a href="../app/history.html">HISTORY</a>
        <a href="../app/skill.php">SKILL</a>
        <a href="../app/project.php">PROJECT</a>
        <a href="../app/contact.html">CONTACT</a>
    </div>

     <div id="content">
        <table style="padding-top:50px">
          <tr>
            <th>Language</th><th>Project</th><th>Period</th>
          </tr>
          <?php
            function expandTable($project_id,$language,$name,$period){
              
              $html = "<tr><td>";
              
              $html .= $language."</td><td class='title'><a href ='../app/read.php?project_id=".$project_id."'>"; 


              $html .= $name."</td></a><td>";
              $html .= $period."</td></tr>";

              return $html;
            }
            while ($row = mysqli_fetch_row($result)) {
              echo expandTable($row[0],$row[3],$row[1],$row[4]);
            }               
          ?>
        </table>
        
        <div class="button-container">
          <a href="../app/write.php"><button>write</button></a>
        </div>
    </div>
</body>
</html>