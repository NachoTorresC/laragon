<?php
include ('conexion.php');
session_start();
echo "<link rel='stylesheet' type='text/css' href='estilo.css' />";
if (isset($_POST['email'])&& isset($_POST['password'])){
    $password=$_POST['password'];
    $email = $_POST['email'];
    $instruccion = "select email,password from clientes where email = '$email'and password='$password' ";
    $consulta = $conexion->query ($instruccion);
    if($res=$consulta->fetch(PDO::FETCH_OBJ)){

        $_SESSION['email']=$res->email;
    	//  $_SESSION['telefono']=$res->telefono;
      	//  $_SESSION["nombre"] = $res->nombre;

        //$_SESSION["usuario_valido"]=$usuario;
        $_SESSION['horaConexion'] = date('H:i:s');
        $_SESSION['fechaConexion'] = date('j-m-Y');
        
		header('Location: menu.html');
        //echo "<tr><td>[ <a href='menu.html'>Entrar  al menu </a> ]</td></tr>";


    //    header('Location: menu.html' );
    } else{
        echo "<tr><td><p>Usuario no autorizado</p></td></tr>";
        echo "<tr><td>[ <a href='login.php'>Volver a login</a> ]</td></tr>";
    }
}else{
    ?>
    <p>Esta zona tiene el acceso restringido.<BR> Para entrar debe identificarse</p>

    <form name='login' action='login.php' METHOD='POST'>
     <fieldset>
     <table>
    <?php 
    if (!isset ($email)){
        echo  "<tr><td>email:</td>";
        echo "<td><input type='text' name='email' SIZE='15'></td></tr></P>";
        echo  "<tr><td>password:</td>";
        echo "<td><input type='password' name='password' SIZE='15'></td></tr></P>";
        echo "<tr><td><input type='submit' value='entrar'></td></tr>";
    }
    else{
        echo "<tr><td><p>Usuario no autorizado</p></td></tr>";
        echo "<tr><td>[ <a href='login.php'>Conectar</a> ]</td></tr>";
    }
    echo"</table>";
    echo"</fieldset>";
    echo "</form>";
}