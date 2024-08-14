<?php
   require_once("../../php/db.php");
   include_once "../../php/env.php";
      session_start();
      if(isset($_POST["opis"])){
         
         $opis_objave = $_POST["opis"];
         $naziv_objave = $_POST["naziv"];
         $oblast_objave = $_POST["oblast"];
      
         $statement = $conn-> prepare("INSERT INTO tema (naziv, opis, oblast, id_korisnika) VALUES (?, ?, ?, ?)" );
      
         $statement -> bind_param('sssi', $naziv_objave, $opis_objave, $oblast_objave,  $_SESSION["id"]); 
      
         if($statement-> execute()){
             header("Location: ../profil/profil.php");
         }else{
             header("Location: ./nova_objava.php?error=1");
         }
      }
      ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../../style/style.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <title>Document</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-dark">
         <a class="navbar-brand" href="<?php echo $url;  ?>stranice/pocetna.php">Pitaj programera</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="<?php echo $url;  ?>stranice/teme/teme.php">Teme<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item active">
                  <?php
                     if(isset($_SESSION["ime"])){
                     ?>
                  <a class="nav-link active" href="<?php echo $url;  ?>stranice/profil/profil.php">
                  Moje teme
                  </a>
                  <?php
                     }
                     else{
                     ?>
                  <a class="nav-link active" href="<?php echo $url;  ?>stranice/prijava/prijava.php">
                  Prijava
                  </a>
                  <?php
                     }
                     ?>
               </li>
               <?php
                  if(isset($_SESSION["ime"])){
                  ?>
               <li class="nav-item">
                  <a class="nav-link active" href="<?php echo $url;  ?>stranice/nova_objava/nova_objava.php">Nova tema</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" href="<?php echo $url;  ?>stranice/odjava.php">Odjava</a>
               </li>
               <?php
                  }
                  ?>
            </ul>
         </div>
      </nav>
      <div class="card container my-2">
         <div class="container">
            <div class="row my-3">
               <div class="col">
                  <div class="card">
                     <div class="card-body ">
                        <form method="POST">
                           <div class="row mb-4" >
                              <div class ="col text-center">
                                 <h3> Nova tema </h3>
                              </div>
                           </div>
                           <div data-mdb-input-init class="form-outline mb-4">
                              <input type="text"  name="naziv"  id="form2Example1" class="form-control" placeholder="naziv teme"/>
                           </div>
                           <div data-mdb-input-init class="form-outline mb-4">
                              <input type="text" name="oblast" id="form2Example2" class="form-control" placeholder="oblast teme"/>
                           </div>
                           <div class="form-group">
                              <label for="exampleFormControlTextarea1">Opis teme</label>
                              <textarea name="opis" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                           </div>
                           <div class="row text-danger mb-4" >
                              <div class ="col text-center">
                                 <?php
                                    if(isset($_REQUEST["error"])){
                                        if($_REQUEST["error"]==1){
                                            echo "Doslo je do greske prilikom objave.";
                                        }
                                    }
                                    ?>
                              </div>
                           </div>
                           <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Objavi temu</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer class="text-center fixed-bottom text-lg-start">
         <div class="text-center text-white p-3">
            © 2024 Copyright:
            <a class="text-white" href="#">pitaj-programera.com</a>
         </div>
      </footer>
   </body>
</html>
