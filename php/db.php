<?php
$servername="localhost";
$username="root";
$password="";
$database="programerski_forum";

$conn= new mysqli($servername, $username, $password, $database);

if($conn->connect_error){
    die("Greska prilikom povezivanja sa bazom podataka: " . $conn->connect_error);
}

