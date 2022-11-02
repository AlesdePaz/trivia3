<?php
session_start();
include('db.php');

if(isset($_SESSION['idusuario'])){
  $ntrivia = $_SESSION['nombre'];
  $idtrivia = $_SESSION['idusuario'];
  $nivel = intval(verificar_nivel($idtrivia));
}else{
  $nivel = 1;
}

$html=file_get_contents(__DIR__.DIRECTORY_SEPARATOR . "trivia.html");


$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "http://ec2-44-203-35-246.compute-1.amazonaws.com/preguntas.php?nivel=".$nivel."&grupo=5");
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);

$objeto_json = json_decode($res);
//echo $res;
$html = str_replace(":pregunta:", $objeto_json->pregunta,$html);
$html = str_replace(":respuesta1:", $objeto_json->respuesta_1->text,$html);
$html = str_replace(":respuesta2:", $objeto_json->respuesta_2->text,$html);
$html = str_replace(":respuesta3:", $objeto_json->respuesta_3->text,$html);
$html = str_replace(":respuesta__1:", $objeto_json->respuesta_1->is_correct,$html);
$html = str_replace(":respuesta__2:", $objeto_json->respuesta_2->is_correct,$html);
$html = str_replace(":respuesta__3:", $objeto_json->respuesta_3->is_correct,$html);

if(isset($_POST["p0"])){
    if($_POST["p0"] == 1){
$resultado_trivia = "<div class='correcto'>Respuesta Correcta</div>";
$nivel++;
//echo $nivel;
if(isset($_SESSION['idusuario']) && $nivel<=10){
$conectar=conn();
    $sql="UPDATE usuario SET nivel='$nivel' WHERE idusuario='$idtrivia';";
    $resul = mysqli_query($conectar , $sql)or trigger_error("Query Failed! SQL- Error: ".mysqli_error($conectar), E_USER_ERROR);
    header("Location:trivia.php");
  }elseif(isset($_SESSION['idusuario']) && $nivel>10){
    $resultado_trivia = "<div class='correcto'>FELICITACIONES HAS COMPLETADO TODOS LOS NIVELES</div>";
  }
}else{
  $resultado_trivia = "<div class='error'>Respuesta Incorrecta Vuelve a intentarlo</div>";
}
}

echo $html;
if(isset($_POST["p0"])){
  echo $resultado_trivia;
}
?>