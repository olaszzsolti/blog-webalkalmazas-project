<?php require('server.php') ?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Add new blog form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>

  <div class="topnav">
    <a href="#home" onclick="location.href='index.php'">Home</a>
    
    <a class="active" href="#newblog" onclick="location.href='index2.php'">Add new blog</a>
    <a href="index.php?logout='1'" style="color: red;">logout</a> 
    <div class="welcome">
      <h3>Welcome at my blogsite : <strong><?php echo $_SESSION['username']; ?></strong> </h3>
      
    </div>

  
  </div>


 <form action="server.php" method="POST" enctype="multipart/form-data">
  <table class="styled-table">
   <tr>
    <td>Author :</td>
    <td><input type="text" name="author" required></td>
   </tr>
   <tr>
    <td>Title :</td>
    <td><input type="text" name="title" required></td>
   </tr>
   <tr>
    <td>Description :</td>
    <td><textarea id="description" name="description" rows="4" cols="30"></textarea></td>
   </tr>
   <tr>
    <td>Date : </td>
    <td><input type="date" name="date" required></td>
   </tr> 
   <tr>
    <td>Image : </td>
    <td><input type="file" name="image"/></td>
   </tr> 
   <tr>
    <td><input type="submit" value="Submit" name="submit"></td>
   </tr>
  </table>
 </form>

</body>
</html>
