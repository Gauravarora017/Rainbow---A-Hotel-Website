<?php


$name = $_POST['name'];

$password = $_POST['password'];
$confirmpassword = $_POST['confirmpassword'];
$emailadress = $_POST['emailadress'];
$phonenumber = $_POST['phonenumber'];
$adress = $_POST['adress'];
$postalcode = $_POST['postalcode'];



$conn = new mysqli('localhost','root','','register','3307');
if($conn->connect_error){
    echo "failed";
    die('Connection Failed :'.$conn->connect_error);

}
else{
    $stmt = $conn->prepare("insert into register(name , password , confirmpassword ,emailadress ,phonenumber ,adress ,postalcode)
    values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssiss",$name , $password , $confirmpassword ,$emailadress ,$phonenumber ,$adress ,$postalcode);
    $stmt->execute();
    echo header('location:final.html');
    $stmt->close();
    $conn->close();
}

?>