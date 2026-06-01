<?php

$host = "localhost";
$dbname = "uat_bug_portal";
$username = "root";
$password = "";
// These are the defualt details


try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
  // This makes PDO provides errors instead of failing with no indication
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
  die("No connection to the database: " . $e->getMessage());
}