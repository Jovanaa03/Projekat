<?php
   require_once("../php/db.php");
   
include_once "../php/env.php";
   session_start();
   if(isset($_POST["komentar"])){
      // poslati su podaci za objavu teme
      $komentar = $_POST["komentar"];
   
      $statement = $conn-> prepare("INSERT INTO komentar (tekst_komentara, id_teme, id_korisnika) VALUES (?, ?, ?)" );
   
      $statement -> bind_param('sii', $komentar, $_GET["id"], $_SESSION["id"]); 
   
      if($statement-> execute()){
          header("Location: ./tema.php?id=".$_GET["id"]);
      }else{
          header("Location: ./tema.php?error=1");
      }
   }
   if(isset($_POST["resenje"])){
      // poslati su podaci za objavu teme
      $resenje = $_POST["resenje"];
   
      $statement = $conn-> prepare("INSERT INTO resenja (opis_resenja, id_teme, id_korisnika) VALUES (?, ?, ?)" );
   
      $statement -> bind_param('sii', $resenje, $_GET["id"], $_SESSION["id"]); 
   
      if($statement-> execute()){
          header("Location: ./tema.php?id=".$_GET["id"]);
      }else{
          header("Location: ./tema.php?error=2");
      }
   }
   
   $data = $conn->query("SELECT * FROM tema where id=". $_GET["id"]);
   $tema = $data->fetch_assoc();
   $komentari = $conn->query("SELECT * FROM komentar where id_teme=". $_GET["id"]);
   $resenja = $conn->query("SELECT * FROM resenja where id_teme=". $_GET["id"]);
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../style/style.css">
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
      <div class="card container bg-light my-2">
         <div class="row my-3">
            <div class="col">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title">
                        <?php
                           echo $tema["naziv"];
                           ?>
                     </h5>
                     <h6 class="card-subtitle mb-2 text-muted">
                        <?php
                           echo $tema["oblast"];
                           ?>
                     </h6>
                     <p class="card-text">
                        <?php
                           echo $tema["opis"];
                           ?>
                     </p>
                     <div class="dropdown-divider py-4"></div>
                     <div class="row">
                        <div class="col">
                           <?php
                              if(isset($_SESSION["ime"])){
                              ?>
                           <form method="POST" action="./tema.php?id=<?php echo $_GET['id']; ?>">
                              <div class="form-group">
                                 <textarea name="komentar" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Novi komentar"></textarea>
                              </div>
                              <div class="row text-danger mb-4" >
                                 <div class ="col text-center">
                                    <?php
                                       if(isset($_REQUEST["error"])){
                                           if($_REQUEST["error"]==1){
                                               echo "Doslo je do greske prilikom objave komentara.";
                                           }
                                       }
                                       ?>
                                 </div>
                              </div>
                              <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Objavi komentar</button>
                           </form>
                           <?php
                              }
                              ?>
                           <div>
                           </div>
                           <h4>
                              Komentari (<?php echo $komentari->num_rows;?>)
                           </h4>
                           <?php
                              foreach ($komentari as $row) {
                              ?>
                           <div class="row my-3">
                              <div class="col">
                                 <div class="card">
                                    <div class="card-body">
                                       <h6 class="card-subtitle mb-2 text-muted">
                                          <?php
                                             echo $conn->query("SELECT * FROM korisnik where id=". $row["id_korisnika"])->fetch_assoc()["korisnicko_ime"];
                                             ?>
                                       </h6>
                                       <p class="card-text">
                                          <?php
                                             echo $row["tekst_komentara"];
                                             ?>
                                       </p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <?php    
                              }
                              ?>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row py-3">
                  <div class="col">
                     <?php
                        if(isset($_SESSION["ime"])){
                        ?>
                     <form method="POST" action="./tema.php?id=<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                           <textarea name="resenje" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Novo resenje"></textarea>
                        </div>
                        <div class="row text-danger mb-4" >
                           <div class ="col text-center">
                              <?php
                                 if(isset($_REQUEST["error"])){
                                     if($_REQUEST["error"]==2){
                                         echo "Doslo je do greske prilikom objave resenja.";
                                     }
                                 }
                                 ?>
                           </div>
                        </div>
                        <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Objavi resenje</button>
                     </form>
                     <?php
                        }
                        ?>
                     <div>
                     </div>
                     <div class="row">
                        <div class="col">
                           <h3>Resenja (<?php echo $resenja->num_rows;?>)</h3>
                        </div>
                     </div>
                     <?php
                        foreach ($resenja as $row) {
                        ?>
                     <div class="row my-3">
                        <div class="col">
                           <div class="card">
                              <div class="card-body">
                                 <h6 class="card-subtitle mb-2 text-muted">
                                    <?php
                                       echo $conn->query("SELECT * FROM korisnik where id=". $row["id_korisnika"])->fetch_assoc()["korisnicko_ime"];;
                                       ?>
                                 </h6>
                                 <p class="card-text">
                                    <?php
                                       echo $row["opis_resenja"];
                                       ?>
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php    
                        }
                        ?>
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
