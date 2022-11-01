<!DOCTYPE html>
 <html lang="es">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia</title>
     <link rel="stylesheet" href="estilo.css">
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
                    <li class="list-group-item bg-dark text-white"><a href="registro.php" class="linkfachero link-light">Registrarme</a></li>
                </ul>
            </div>
          </div>
          <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
              <button class="content-box" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
          <?php       
          
          while($i<3){
            echo '

          <div class="container">
          <section><h2>';
            
          
          $Q=question($i); $R=R_($i); echo $Q["pregunta"]; echo '</h2></section>
         <form method="POST" action="">
            
            <div><label>
                <input type="radio" value="1" name="p0" onclick="respuesta(0,this)"> Turín
            </label></div>
            <div><label>
                <input type="radio" value="2" name="p0" onclick="respuesta(0,this)"> napoleon
              </label></div>
              <div><label>
                <input type="radio" value="'; echo $R["respuesta"]; echo '" name="p0" onclick="respuesta(0,this)"> '; echo $R["respuesta"]; echo '
            </label></div>

            <input type="submit" value="Enviar" name="enviar" v-on:click="corregir"> <br/> <br/>


</form>';


      
            if(isset($_POST["p0"])){
              if($_POST["p0"] == $R['respuesta']){
         echo "Mi idioma es ". $_POST["p0"];
         $i++;
                echo $i;
            }else{
              echo "seleccione la correcta";
             $i++;
             echo $i;
            }
          }
        }
 ?>
          
      <!-- <center><button onclick="corregir()">ACEPTAR</button></center>
        <h2>Cantidad acertadas: <span id="resultado"></span></h2> -->
          </div>

        <script src="script.js"></script>	
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</html>