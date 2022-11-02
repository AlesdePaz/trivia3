<?php
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
        function comparar_hora($anterior){
          $conectar=conn();
          $sql="SELECT case 
          when (DATE_ADD('$anterior', interval 2 hour) < now()) then 
          'triste.gif' else 'feliz.gif' end as 'fecha';";
          $resul_horas = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

          $mostrar = $resul_horas->fetch_assoc();
          return $mostrar['fecha'];
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
    function verificar_usuario_contra($usuariodb, $contradb){
      $conectar=conn();
      $sql="SELECT * FROM usuario WHERE nombreusuario = '$usuariodb' and contrasena = '$contradb';";
      $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);


      return $resul;
    }

    function verificar_nivel($idusuariobd){
      $conectar=conn();
      $sql="SELECT nivel FROM usuario WHERE idusuario = '$idusuariobd';";
      $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);
        
      $num = $resul->num_rows;
        if($num>0){
          $row = $resul->fetch_assoc();
        }
        return $row['nivel'];
    }
    function verificar_puntos($id_puntos){
      $conectar=conn();
      $sql="SELECT puntos FROM usuario WHERE idusuario = '$id_puntos';";
      $resul_puntos = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);
        
      $num = $resul_puntos->num_rows;
        if($num>0){
          $row = $resul_puntos->fetch_assoc();
        }
        return $row['puntos'];
    }
    function verificar_ultima_jugada($id_jugada){
      $conectar=conn();
      $sql="SELECT ult_jugada FROM usuario WHERE idusuario = '$id_jugada';";
      $resul_jugada = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);
        
      $num = $resul_jugada->num_rows;
        if($num>0){
          $row = $resul_jugada->fetch_assoc();
        }
        return $row['ult_jugada'];
    }

      ?>