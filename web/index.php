<?php 
  session_start(); 
  

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['quantity']);
  	header("location: login.php");
  }
  if (isset($_GET['quantity'])) {
    $_SESSION['quantity']= $_GET['quantity'];
  }
  if (!isset($_SESSION['quantity'])){
    $_SESSION['quantity']= 3;
  }
 
  if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
  } else {
    $pageno = 1;
  }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Table with database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
  
</head>
<body>


<div class="topnav">
  <a class="active" href="#home">Home</a>
  
  <a href="#newblog" onclick="location.href='index2.php'">Add new blog</a>
  <a href="index.php?logout='1'" style="color: red;">logout</a> 
  

  
 
  <div class="welcome">
      <h3>Welcome at my blogsite : <strong><?php echo $_SESSION['username']; ?></strong> </h3>
      
    </div>
    <a><strong><?php 
            echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?></strong> </a>
    
   
</div>
<div>
<?php
$ip_server = $_SERVER['SERVER_ADDR'];
// Printing the stored address
echo "Server IP Address is: $ip_server";
?>
</div>
<br>
<br>



<table class="table">
    <tr>
        <th><a href=<?php echo "?pageno=".$pageno ."&orderBy=id";?>>Id</a></th>
        <th><a href=<?php echo "?pageno=".$pageno  ."&orderBy=author";?>>Author</a></th>
        <th><a href=<?php echo "?pageno=".$pageno  ."&orderBy=title";?>>Title</a></th>
        <th>Description</th>
        <th><a href=<?php echo "?pageno=".$pageno  ."&orderBy=date";?>>Date</a></th>
        <th>Image</th>
      
    </tr>
    <form action="/index.php">
  <label for="quantity">Bejegyzés/oldal(1-5):</label>
  <input type="number" id="quantity" name="quantity" min="1" max="5" required>
  <input type="submit">
    </form>
    
    <?php
    require 'dbconnect.php';
    $db = dbconnect();

   
    
    $offset = ($pageno-1) * $_SESSION["quantity"];

    $total_pages_sql = "SELECT COUNT(*) FROM blog";
    $result = mysqli_query($db,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $_SESSION['quantity']);


    
    $orderBy = array('id', 'author', 'title', 'date');
    $order = 'id';
    if (isset($_GET['orderBy']) && in_array($_GET['orderBy'], $orderBy)) {
      $order = $_GET['orderBy'];
      

    } 

    $sql = 'SELECT * FROM blog ORDER BY '.$order . ' LIMIT ' .$offset.','.$_SESSION['quantity'] ;
    $result = mysqli_query($db, $sql);

    //$sql2 = "SELECT * FROM blog LIMIT $offset, $no_of_records_per_page";
    //$res_data = mysqli_query($db,$sql2);

    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){

            
            echo "<tr><td>". $row["id"] ."</td><td>". $row["author"] ."</td><td>". $row["title"] ."</td><td>". $row["description"] ."</td><td>". $row["date"]."</td><td><img src=image/$row[image] width='200' height='100'></td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "0 result";
    }

    ?>
</table>
<br>
<br>

</form>
<p><b>Oldal/összes: <?php echo $pageno. "/". $total_pages;?></b></p>
<p><b>Bejegyzések egy oldalon: <?php echo $_SESSION['quantity'] ;?></b></p>
<br></br>
<p><b>Összes oldal: <?php echo $total_pages ;?></b></p>
<p><b>Összes bejegyzés: <?php echo $total_rows ;?></b></p>


<ul class="pagination">
        
        <li><a href=<?php echo "?pageno=1" ."&orderBy=".$order;?>>First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1) ."&orderBy=".$orde; } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1) ."&orderBy=".$order; } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages."&orderBy=".$orde ; ?>">Last</a></li>
    </ul>

</body>
</html>

