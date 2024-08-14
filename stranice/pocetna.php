<?php
   require_once("../php/db.php");
   session_start();
   
include_once "../php/env.php";
   $data = $conn->query("SELECT * FROM tema");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
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
      <div class="masthead bg-success text-white text-center pb-3">
            <div class="container d-flex align-items-center flex-column">
                <img class="masthead-avatar my-2" src="../slike/slika1.svg" alt="..."  width="150px"/>
                <h1 class="masthead-heading text-uppercase mb-0">Pitaj Programera</h1>
                <div class="divider-custom divider-light">
                    <div class="text-center"><i class="fas fa-star"></i></div>
                </div>
            </div>
                </div>
                <section class="page-section bg-light text-black py-3" id="about">
            <div class="container">
                <h2 class="page-section-heading text-center text-uppercase text-black my-3">O nama</h2>
                <div class="divider-custom divider-light">
                <div class="row justify-content-center">
                    <div class="col-lg-4 ms-auto"><p class="lead">Naša misija je da omogućimo svima da uče i rastu kao programeri. Verujemo da se najbolji rezultati postižu kada delimo znanje i zajedno radimo na rešavanju problema. Bez obzira na to da li tek počinjete sa učenjem svog prvog programskog jezika ili ste sezonski stručnjak sa godinama iskustva,ovo je mesto gde možete pronaći podršku i inspiraciju.</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">U našoj zajednici okupljamo stručnjake iz različitih oblasti programiranja koji su spremni da podele svoja znanja i iskustva. Naš forum je dinamično okruženje gde se postavljaju i rešavaju stvarni problemi, a naši članovi neprestano uče jedni od drugih. Bilo da se radi o rešavanju bugova, optimizaciji koda ili razumevanju složenih algoritama, ovde ćete pronaći odgovore koje tražite.</p></div>
                </div>
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="https://startbootstrap.com/theme/freelancer/">
                        <i class="fas fa-download me-2"></i>
                        pogledajte teme!
                    </a>
                </div>
            </div>
        </section>
            <div class="masthead bg-success text-white text-center py-3">
            <div class="container d-flex align-items-center flex-column">
                <img class="masthead-avatar my-5" src="../slike/slika2.webp" alt="..."  width="450px"/>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-line"></div>
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
