<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <style>
      body{background-color: #264673; box-sizing: border-box; font-family: Arial;}
form{
    background-color: white;
    padding: 10px;
    margin: 50px auto;
    width: 280px;
}
input[type=text], input[type=password], input[type=date]{
    padding: 10px;
    width: 250px;
}
 input[type="submit"]{
    border: 0;
    background-color: #ED8824;
    padding: 10px 20px;
}
 .error{
    background-color: #FF9185;
    font-size: 12px;
    padding: 10px;
 }
 .correcto{
    background-color: #A0DEA7;
    font-size: 12px;
    padding: 10px;
 }
      </style>
    <link rel="stylesheet" href="estilo.css"/>
    
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
                    <li class="list-group-item bg-dark text-white"><a href="registro_1.php" class="linkfachero link-light">Registrarme</a></li>
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
    <div class="card" style="margin: auto; margin-top: 50px; width: 50%">

      <form action="" method="POST">
      <?php
      session_start();
if(isset($_POST['nombre2'])){
$nusuario = $_POST['nombre2'];
$password = $_POST['password'];

$campos = array();

if(mysqli_num_rows(verificar_usuario_contra($nusuario, $password)) === 0){
  array_push($campos, "ingresa los datos del usuario validos.");
}

if(count($campos) > 0){
    echo "<div class='error'>";
    for($i = 0; $i < count ($campos); $i++){
        echo "<li>".$campos[$i]."</i>";
    }
}else{

    echo "<div class='correcto'>
           Datos correctos";
           $conectar=conn();
             $sql="SELECT * FROM usuario WHERE nombreusuario = '$nusuario' and contrasena = '$password';";
               $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

              $num = $resul->num_rows;

              if($num>0){
                $row = $resul->fetch_assoc();

                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['idusuario'] = $row['idusuario'];

                $id = $_SESSION['idusuario'];

                $sqli="SELECT * FROM fechadejuegodb WHERE idusuario = '$id';";
                $resulta = mysqli_query($conectar , $sqli)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);
               $numm = $resulta->num_rows;
 
               if($numm>0){
                 $rows = $resulta->fetch_assoc();
 
                 $_SESSION['fecha'] = $rows['fechajuego'];

                header("Location:dashboard.php");
              }
           
}
}
echo "</div>";
}

?>
        <div class="d-flex justify-content-center">
          <h2>Inicio de sesi&oacute;n</h2>
          </div>
        <div class="d-flex justify-content-center">
          <img src="avatar.png" />
        </div>
        <div class="d-flex justify-content-center">
        </div>
        <div></div> 
        <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input minlength="2" maxlength="15" pattern="[a-z,A-Z]+" required="" type="text" name="nombre2" class="form-control" placeholder="Nombre de usuario" />
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input minlength="6" maxlength="12" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[#|!|=|_|-|@]).{6,}[^\s]$" required type="password"  name="password" class="form-control" placeholder="Contrase&ntilde;a"/>
        <span id="mensaje"></span>
      </div>
    </div>
  </div>
      
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
    
          <div class="col">
           
        <!-- Submit button -->
        <div class="d-flex justify-content-center">
          <p><input type="submit" value="Ingresar"></p>
        <!--<button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4 " id="subirUsuario">Registrarme</button> -->
        </div>
        <div class="d-flex justify-content-center">
          ¿No tienes una cuenta?
          </div>
          <div class="d-flex justify-content-center">
        <a href="registro_1.php"><button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4 ">Crear cuenta</button></a>
          </div>
        <!-- Register buttons -->

      </form>
    <!--  <ul>
    <li id="mayus">3 Mayúsculas</li>
    <li id="special">3 Caractér especial</li>
    <li id="numbers">digitos</li>
    <li id="lower"> Minúsculas</li>
    <li id="len"> Mínimo 8 caractéres</li>
 </ul> -->
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="password.js"></script>

</div>


    </div>
    
  </body>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>