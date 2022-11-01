<?php
date_default_timezone_set("America/Guatemala");
session_start();

$Object = new DateTime();  
$DateAndTime = $Object->format("Y-m-d h:i:s");  
echo "la fecha actual es $DateAndTime.";

$ultimo_juego = $_SESSION['fecha'];
$nombredash = $_SESSION['nombre'];

echo "$ultimo_juego.";
if($DateAndTime > $ultimo_juego){
  echo " ya pasaste el tiempo";
}else{
  echo "no es mayor";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
      <?php
    include('db.php');
      ?>
        <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-dark p-4">
                <ul class="list-group">
                    <li class="list-group-item bg-dark"><a href="perfil.html" class="linkfachero link-light">Perfil</a></li>
                    <li class="list-group-item bg-dark text-white"><a href="trivia.html" class="linkfachero link-light">Trivia</a></li>
                    <li class="list-group-item bg-dark text-white"><a href="ranking.html" class="linkfachero link-light">Ranking</a></li>
                    <li class="list-group-item bg-dark text-white"><a href="misamigos.html" class="linkfachero link-light">Mis amigos</a></li>
                    <li class="list-group-item bg-dark text-white"><a href="login.html" class="linkfachero link-light">Cerrar sesión</a></li>
                </ul>
            </div>
          </div>
          <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
          <!-- buscar amigos 
        <div class="card" style="margin: auto; margin-top: 0px; width: 20%">  
          <div class="form-outline mb-4">
            <input type="text" id="form3Example1" class="form-control" placeholder="Buscar amigos"/>
          </div>
          </div> -->
          <!-- dashboard -->
          <div class="card" style="margin: auto; margin-top: 80px; width: 50%">
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <?php echo $nombredash; ?>
                <div></div>
                <img src="trofeo.png"
                width="150" 
                height="150">
                <br>
                Nivel 1
                <div></div>
                <img src="diamante.jpg"
                width="50" 
                height="50"> 
                0 puntos
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <br>
                <img src="feliz.gif"
                width="150" 
                height="150">
                <div></div>
                <br>
                <a href="fecha_de_juego.php"><button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4">Jugar</button></a>
                <div></div>
                <img src="estrellas.png"
                width="160" 
                height="60">
              </div>
            </div>
          </div>
         </div>
    </body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</html>