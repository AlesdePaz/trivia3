<?php
include('db.php');
session_start();

$id = $_SESSION['idusuario'];

$conectar=conn();
             $sql="SELECT * FROM fechadejuegodb WHERE idusuario = '$id';";
               $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);
              $numm = $resul->num_rows;

              if($numm>0){
                $row = $resul->fetch_assoc();

                $_SESSION['fecha'] = $row['fechajuego'];
                header("Location:dashboard.php");
              }

?>