<?php

require_once("db.php");
include_once "env.php";

session_start();


$ime = $_POST["ime"];
$prezime = $_POST["prezime"];
$korisnicko_ime = $_POST["korisnicko_ime"];
$lozinka = $_POST["lozinka"];
$mail = $_POST["mail"];
if(empty($ime) || empty($prezime) || empty($korisnicko_ime) || empty($lozinka) || empty($mail))
    die(header("Location:".$url. "stranice/registracija/registracija.php?error=2"));


$upit = $conn -> query ("SELECT * FROM korisnik WHERE mail = '$mail'" );
$num = $query-> num_rows;

if ($num > 0) {
    die(header("Location:".$url. "stranice/registracija/registracija.php?error=1"));
}


$statement = $conn-> prepare("INSERT INTO korisnik (ime, prezime, mail, lozinka, korisnicko_ime) VALUES (?, ?, ?, ?, ?)" );

$statement -> bind_param('sssss', $ime, $prezime, $mail, md5($lozinka), $korisnicko_ime); 

if($statement-> execute()){
    header("Location:".$url. "stranice/prijava/prijava.php");

}else{
    die(header("Location:".$url. "stranice/registracija/registracija.php?error=2"));
}

?>