<?php

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$custFirstName = $_POST["custFirstName"];
$custLastName = $_POST["custLastName"];
$custAddStr = $_POST["custAddStr"];
$custAddNr = $_POST["custAddNr"];
$custPhone = $_POST["custPhone"];
$custEmail = $_POST["custEmail"];

// strippers sanitize

$custFirstName = test_input($custFirstName);
$custLastName = test_input($custLastName);
$custAddStr = test_input($custAddStr);
$custAddNr = test_input($custAddNr);
$custPhone = test_input($custPhone);
$custEmail = test_input($custEmail);

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=crm', 'root', 'toortoor');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->prepare("INSERT INTO cust_info (custFirstName, custLastName, custAddStr, custAddNr, custPhone, custEmail) 
VALUES (:custFirstName, :custLastName, :custAddStr, :custAddNr, :custPhone, :custEmail)");

$statement->bindParam(':custFirstName', $custFirstName);
$statement->bindParam(':custLastName', $custLastName);
$statement->bindParam(':custAddStr', $custAddStr);
$statement->bindParam(':custAddNr', $custAddNr);
$statement->bindParam(':custPhone', $custPhone);
$statement->bindParam(':custEmail', $custEmail);



if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // echo $custFirstName;
    // echo $custLastName;
    // echo $custAddStr;
    // echo $custAddNr;
    // echo $custPhone;
    // echo $custEmail;
    // die();
$statement->execute();
}
} catch (PDOException $e) {
    die($e->getMessage());
}

?>