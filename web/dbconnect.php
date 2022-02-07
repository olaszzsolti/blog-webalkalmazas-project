<?php

function dbconnect(){
  $host = "database";
  $dbUsername = "root";
  $dbPassword = "Pingvinharcos07";
  $dbName = "test1";
  $db = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
  if (!$db) {
    error_log('Connection error: ' . mysqli_connect_error());
    die();
  }
  return $db;
  
}
?>