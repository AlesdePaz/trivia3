<!DOCTYPE html>
<html>
  <head>
    <title>Registro</title>
    <style>
      body{background-color: #264673; box-sizing: border-box; font-family: Arial;}
form{
    background-color: white;
    padding: 10px;
    margin: 50px auto;
    width: 600px;
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
                    <li class="list-group-item bg-dark text-white"><a href="login.php" class="linkfachero link-light">Iniciar sesi&oacute;n</a></li>
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
if(isset($_POST['nombre'])){
$nombre = $_POST['nombre'];
$nusuario = $_POST['nombre2'];
$password = $_POST['password'];
$email = $_POST['email'];
$date = $_POST['date'];
$pass = $_POST['pass'];

$campos = array();

if($nombre == ""){
   array_push($campos, "El campo Nombre no pude estar vacío");
}

if($password == "" || strlen($password) < 6) {
   array_push($campos, "El campo Password no puede estar vacío, ni tener menos de 6 caracteres.");
}

if($email == "" || strpos($email, "@") === false){
   array_push($campos, "Ingresa un correo electrónico válido.");
}
if ($password != $pass){
  array_push($campos, "La contraseña no es igual al campo anterior.");
}
if(ctype_graph($password) === false){
  array_push($campos, "Ingresa contraseña sin espacios.");
}

if(mysqli_num_rows(verificar_usuario($nusuario)) !== 0){
  array_push($campos, "Este nombre de usuario ya esta en uso.");
}

if(count($campos) > 0){
    echo "<div class='error'>";
    for($i = 0; $i < count ($campos); $i++){
        echo "<li>".$campos[$i]."</i>";
    }
}else{

  $reg=registro($nombre,$nusuario,$email,$date,$password);
    echo "<div class='correcto'>
           Datos correctos";
           echo $reg;
           
}
echo "</div>";
}

?>
        <div class="d-flex justify-content-center">
          <h2>Registro</h2>
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
        <input minlength="2" maxlength="15" pattern="[a-z,A-Z,*\s]+" required="" type="text" name="nombre" class="form-control" placeholder="Nombre"/>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input minlength="2" maxlength="15" pattern="[a-z,A-Z]+" required="" type="text" name="nombre2" class="form-control" placeholder="Nombre de usuario" />
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input minlength="5" maxlength="30" type="text" required="" name="email" class="form-control"placeholder="Correo electronico"/>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input min="1922-10-01" max="2022-10-28" required="" pattern="[0-9]+" type="date" id="form3Example2" name="date" class="form-control" placeholder="Fecha de nacimiento"/>
        
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
    <div class="col">
      <div class="form-outline">
        <input  type="password" name="pass" required="" placeholder="Repetir contrase&ntilde;a"/>
      </div>
    </div>
  </div>
      
        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
    
          <div class="col">
           
        <!-- Submit button -->
        <div class="d-flex justify-content-center">
          <p><input type="submit" value="Registrarme"></p>
        <!--<button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4 " id="subirUsuario">Registrarme</button> -->
        </div>
        <div class="d-flex justify-content-center">
          Ya tienes una cuenta?
          </div>
          <div class="d-flex justify-content-center">
        <a href="login.php"><button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4 ">Iniciar sesi&oacute;n</button></a>
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