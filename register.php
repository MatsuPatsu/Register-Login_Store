<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

    //data
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    //db connection
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";

    $conn = new mysqli($host,$dbusername,$dbpassword,$dbname);

    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    $query = "INSERT INTO login (Email, Password) VALUES ('$Email', '$Password')";
    $result = $conn->query($query);

    if($result->num_rows == 1){
        header("Location: error.html");
        exit();
    }
    else{
        header("Location: success.html");
        exit();
    }
    $conn->close();

}
?>