<?php
$i=1;
//configuracion necesaria para acceder a la base de datos 
function conn(){
    $hostname = "localhost";
    $usuariodb = "admin_proyect";
    $passworddb = "admin2022";
    $dbname = "proyect_trivia";

    //generando la conexion con el servidor 
    $conectar=mysqli_connect($hostname, $usuariodb, $passworddb, $dbname);
    return $conectar; 
}
        function data(){
            $conectar=conn();
            $sql="SELECT * from preguntas";
            $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

            $mostrar=mysqli_fetch_array($resul);
            return $mostrar;
        }

        //buscando pregunta
        function question($num){
            $conectar=conn();
            $sql="SELECT pregunta FROM preguntas WHERE idpreguntas=$num";
            $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

            $mostrar=mysqli_fetch_array($resul);
            return $mostrar;
        }

        //buscando respuesta
        function R_($num){
          $conectar=conn();
          $sql="SELECT respuesta FROM preguntas WHERE idpreguntas=$num";
          $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

          $mostrar=mysqli_fetch_array($resul);
          return $mostrar;
      }

      /*$conectar=conn();
      $sql="SELECT * from preguntas";
      $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

      while($mostrar=mysqli_fetch_array($resul)){
      ?>
      <tr>
        <td><?php echo $mostrar['idpreguntas']; ?></td>
        <td><?php echo $mostrar['pregunta']; ?></td>
        <td><?php echo $mostrar['respuesta']; ?></td>
      </tr>
      <?php
    }*/

    function registro($nombrebd,$nusuariobd,$emailbd,$datebd,$passwordbd){
      $conectar=conn();
      $sql="INSERT INTO usuario (nombre, nombreusuario, correousuario, fechadenacimiento, contrasena) VALUES ('$nombrebd','$nusuariobd','$emailbd','$datebd','$passwordbd');";
      $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

      $mostrar ="<div class='correcto'>
      Su usuario ha sido creado :) </div>";
      return $mostrar;
    }

    function verificar_usuario($usuariodb){
      $conectar=conn();
      $sql="SELECT * FROM usuario WHERE nombreusuario = '$usuariodb';";
      $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

      return $resul;
    }

      ?>