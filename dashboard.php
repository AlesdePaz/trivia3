<?php
session_start();
include('db.php');

$html=file_get_contents(__DIR__.DIRECTORY_SEPARATOR . "dashboard.html");

if(isset($_SESSION['idusuario'])){
  $nombredash = $_SESSION['nombre'];
  $iddash = $_SESSION['idusuario'];

  $ultima_jugada = verificar_ultima_jugada($iddash);
  $niveldash = intval(verificar_nivel($iddash));
  $puntosdash = intval(verificar_puntos($iddash));
  //echo $ultima_jugada;
  $resultado_hora = comparar_hora($ultima_jugada);
  //echo $resultado_hora;

 /* $conectar=conn();
  $sql="SELECT * FROM usuario WHERE idusuario = '$iddash';";
  $resultadodash = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);

  $numdash = $resultadodash->num_rows;
  if($numdash>0){
    $rowses = $resultadodash->fetch_assoc();
    $puntosdash = $rowses['puntos'];

  }*/
  $html = str_replace(":nombre:", $nombredash,$html);
  $html = str_replace(":puntos:", $puntosdash,$html);
  $html = str_replace(":nivel:", $niveldash,$html);
  $html = str_replace(":avatar:", $resultado_hora,$html);

}else{
  header("Location:login.php");
}

//$html = str_replace(":nivel:", $objeto_json->pregunta,$html);


/*date_default_timezone_set("America/Guatemala");
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
}*/

echo $html;



?>