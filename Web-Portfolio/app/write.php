<?php
  require_once('../process/db_connect.php');
?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Writing Page</title>
  <link rel="stylesheet" href="../css/main.css" />
</head>

<body>
    <div class="upper-padding"></div>
    <div id="content">
      <h2 class="page_title">Writing...</h2>
        <form id="article" action="../process/write_process.php" method="POST">
          <label>Project Name</label>
          <input type="text" name="name">
          <label>Role in the project</label>
          <input type="text" name="job">
          <label>Select used language</label>
          <select name="language">
            <option value="java">Java</option>
            <option value="C">C</option>
            <option value="C++">C++</option>
            <option value="python">Python</option>
            <option value="web">Web(Front-end&Back-end)</option>
          </select>
          <label>Period (ex) 1 month, 1 year</label>
          <input type="text" name="period">
          <label>Reference</label>
          <textarea name="reference"></textarea>
          <div class="button-container">
            <button type="submit">write</button>
          </div>
        </form>
          <div class="button-container">
            <button onclick="location.href='../app/project.php'"> back</button>
          </div>
    </div>

   
</body>
</html>
