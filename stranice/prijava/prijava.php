<?php

include_once "../../php/env.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="prijava.css">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="card w-50 mx-auto my-5 p-5 bg-light">
        <form action="../../php/prijava.php" method="POST"> 
            <div class="row mb-4" >
            <div class ="col text-center">
                <h3> Prijava </h3>
        </div>
                </div>
        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="text"  name="korisnicko_ime"  id="form2Example1" class="form-control" placeholder="korisnicko ime"/>
        </div>

        <!-- Password input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <input type="password" name="lozinka" id="form2Example2" class="form-control" placeholder="lozinka"/>
        </div>

        <div class="row text-danger mb-4" >
            <div class ="col text-center">
        <?php
                    if(isset($_REQUEST["error"])){
                        if($_REQUEST["error"]==1){
                            echo "Doslo je do greske prilikom prijave.";
                        }
                    }
                ?>
        </div>
                </div>
                <div class="row mb-4" >
            <div class ="col">
                Nemate nalog? <a href="<?php echo $url;  ?>stranice/registracija/registracija.php">Registrujte se</a>
                </div>
                </div>
                <!-- Submit button -->
        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Prijava</button>

            </form>
        </div>
</body>
</html>