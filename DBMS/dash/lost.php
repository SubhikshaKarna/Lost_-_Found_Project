
<?php

  $Name = $_POST['Name'];
  $itemName = $_POST['itemName'];
  $description = $_POST['description'];
  $dataLost = $_POST['dateLost'];
  $contactInfo = $_POST['contactInfo'];

// Create connection
$con = new mysqli('localhost','root','','regs'); 
// Check connection
if($con->connect_error){
    echo "$con->connect_error";
    die("Connection Failed : ". $con->connect_error);
  } else {
    $stmt = $con->prepare("insert into lostitem(Name, itemName, description, dataLost, contactInfo) values(?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $Name, $itemName, $description, $dataLost, $contactInfo);
    $execval = $stmt->execute();
    echo $execval;
    echo " Report acknowledged";
    $stmt->close();
    $con->close();
  }
?>