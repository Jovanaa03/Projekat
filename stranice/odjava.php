<?php 

include_once "../php/env.php";
session_start();
session_destroy();
header("Location:".$url."stranice/teme/teme.php");

?>