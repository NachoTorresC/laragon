<?php
include ('conexion.php');
session_start();
echo "<link rel='stylesheet' type='text/css' href='estilo.css' />"; // enlazo los estilos para asi no tener que poner todo el docType
if (isset($_POST['email'])&& isset($_POST['password'])){ // si existe el valor email y password en el formulario ... 
    $password =$_POST['password'];
    $email = $_POST['email'];
    $instruccion = "select * from users where email = '$email'and password='$password' ";
    $consulta = $conexion->query ($instruccion);
    if($res=$consulta->fetch(PDO::FETCH_OBJ)){

        // aqui puedo guardardo todas las variables de sesion que quiera ( password no aconsejable) 

		
        $_SESSION['email']=$res->email;
      	$_SESSION["nombre"] = $res->name;   
        $_SESSION["id"] = $res->id;   
        $_SESSION['horaConexion'] = date('H:i:s');
        $_SESSION['fechaConexion'] = date('j-m-Y');
        
		header('Location: menu.php');
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
        echo "<tr><td><input type='submit' value='iniciar'></td></tr>";

        echo "<tr><td>[ <a href='menu.php'>volver al menú</a> ]</td></tr>";
    }
    else{
        echo "<tr><td><p>Usuario no autorizado</p></td></tr>";
        echo "<tr><td>[ <a href='login.php'>Conectar</a> ]</td></tr>";
    }
    echo"</table>";
    echo"</fieldset>";
    echo "</form>";
}