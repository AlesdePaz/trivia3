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
input[type=text], input[type=password]{
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
                    <li class="list-group-item bg-dark text-white"><a href="login.html" class="linkfachero link-light">Registrarme</a></li>
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

    <div class="card" style="margin: auto; margin-top: 20px; width: 50%">
      <form action="" method="POST">

      <?php
if(isset($_POST['nombre'])){
$nombre = $_POST['nombre'];
$password = $_POST['password'];
$email = $_POST['email'];

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

if(count($campos) > 0){
    echo "<div class='error'>";
    for($i = 0; $i < count ($campos); $i++){
        echo "<li>".$campos[$i]."</i>";
    }
}else{
    echo "<div class='correcto'>
           Datos correctos";
}
echo "</div>";
}

?>

        <div class="d-flex justify-content-center">
          Registro
          </div>
        <div class="d-flex justify-content-center">
          <img src="avatar.png" />
        </div>
        <div class="d-flex justify-content-center">
        Selecciona un avatar
        </div>
        <div></div> 
        <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" name="nombre" class="form-control" placeholder="Nombre"/>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" placeholder="Nombre de usuario" />
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" name="email" class="form-control"placeholder="Correo electronico"/>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" placeholder="Fecha de nacimiento"/>
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" name="password" class="form-control" placeholder="Contraseña"/>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" placeholder="Repetir contraseña"/>
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
       <!-- <a href="login.html"><button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4 " id="subirUsuario">Registrarme</button></a> -->
        </div>
        <div class="d-flex justify-content-center">
          Ya tienes una cuenta?
          </div>
          <div class="d-flex justify-content-center">
        <a href="login.html"><button style="text-align: center ;" type="button" class="btn btn-primary btn-block mb-4 ">Iniciar sesión</button></a>
          </div>
        <!-- Register buttons -->

      </form>
    </div>
  </body>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>