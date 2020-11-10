<?php 
 
 /*
 * Created by Belal Khan
 * website: www.simplifiedcoding.net 
 * Retrieve Data From MySQL Database in Android
 */
 
 //database constants
 define('DB_HOST', 'bukh50ajfik1swwhrda2-mysql.services.clever-cloud.com');
 define('DB_USER', 'uwznjzsizdpzpvnq');
 define('DB_PASS', 'O6uDFVYCyfERtsLDOJdF');
 define('DB_NAME', 'bukh50ajfik1swwhrda2');
 
 
 //connecting to database and getting the connection object
 $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
 
 //Checking if any error occured while connecting
 if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 die();
 }
 
 //creating a query
 $stmt = $conn->prepare("SELECT name,price FROM items");
 
 //executing the query 
 $stmt->execute();
 
 //binding results to the query 
 $stmt->bind_result($name, $price);
 
 $products = array(); 
 
 //traversing through all the result 
 while($stmt->fetch()){
 $temp = array();
 $temp['name'] = $name;
 $temp['price'] = $price;
 array_push($products, $temp);
 }
 
 //displaying the result in json format 
 echo json_encode($products);