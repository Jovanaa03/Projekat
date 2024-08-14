<?php
   require_once("../../php/db.php");
   session_start();
   
include_once "../../php/env.php";
   $data = $conn->query("SELECT * FROM tema");
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
      <div class="card container bg-light my-2 ">
        <div class="row">
            <h2 class="col-12 my-1">Sve teme</h2>
            <?php
                foreach ($data as $row) {
                ?>
            <div class="col-4 my-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            echo $row["naziv"];
                            ?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?php
                            echo $row["oblast"];
                            ?>
                        </h6>
                        <a href="<?php echo $url;  ?>stranice/tema.php?id=<?php echo $row['id']; ?>" class="card-link">Otvori temu</a>
                    </div>
                </div>
            </div>
            <?php
                }
                ?>
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
