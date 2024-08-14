<?php
include_once "env.php";
    session_start();
    if(isset($_POST["korisnicko_ime"]) && isset($_POST["lozinka"])){
        $korisnicko_ime=$_POST["korisnicko_ime"];
        $lozinka = $_POST["lozinka"];
        $sifrovana_lozinka = md5($lozinka);

        require_once("db.php");

        $query = $conn->query("SELECT * FROM korisnik WHERE korisnicko_ime = '$korisnicko_ime' AND lozinka='$sifrovana_lozinka'");

        if ($query -> num_rows == 1) {
            $data = $query->fetch_object();

            $_SESSION["ime"] = $data->ime;

            $_SESSION["prezime"] = $data->prezime;

            $_SESSION["email"] = $data->mail;
            $_SESSION["id"] = $data->id;

            header("Location:".$url. "stranice/teme/teme.php");

        }else{
            die(header("Location:".$url. "stranice/prijava/prijava.php?error=1"));
        }
    }
?>