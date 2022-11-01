<?php

session_start();

if(!empty($_POST["btningresar"])){
    if(!empty($_POST["nombreusuario"]) and !empty($POST["contrasena"])){
        $usuario=$_POST["nombreusuario"];
        $password=$_POST["contrasena"];
        $sql=$conexion->query("SELECT * FROM usuario WHERE nombreusuario = '$usuariodb' and contrasena = '$contradb';";
        if ($datos=$sql->fetch_object()){
            $_SESSION["nombre"]=$datos->nombre;
            header("location:../dashboard.php");
        }else{
            echo "<div class='alert alert -danger'>El usuario no existe</div>";
        }else{
            echo "<div class='alert alert -danger'>Los campos estan vacios</div>";
        }
    }
