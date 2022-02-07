<?php
session_start();
require 'dbconnect.php';


// initializing variables
$username = "";
$email    = "";
$errors = array(); 





// connect to the database
$db = dbconnect();

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = $_POST['password_1']);
  $password_2 = $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_num_rows($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
  

if (isset($_POST['submit'])) {
  if (isset($_POST['author']) && isset($_POST['title']) &&
      isset($_POST['description']) && isset($_POST['date']) && isset($_FILES['image'])){
        
      
      $author = mysqli_real_escape_string($db, $_POST['author']);  
      $title = mysqli_real_escape_string($db, $_POST['title']);  
      $description = mysqli_real_escape_string($db, $_POST['description']);  
      $date = mysqli_real_escape_string($db, $_POST['date']);  
      $author = mysqli_real_escape_string($db, $_POST['author']); 
      $image_tmp_name = mysqli_real_escape_string($db, $_FILES['image']['tmp_name']); 
      //echo "this string '$author'";

      $image_name = uniqid();

      $path = "image/$image_name";
      move_uploaded_file($image_tmp_name, $path);
      
      $query = "INSERT INTO blog(author, title, description, date, image) values( '$author','$title', '$description', '$date', '$image_name' )";
      mysqli_query($db, $query);
      header('HTTP/1.1 301 Moved Permanently');
      header('location:index.php');
      echo "New record inserted sucessfully.";

      
  }
  else {
      echo "All field are required.";
      die();
  }
}

?>