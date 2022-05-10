<?php
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";

if(!isset($_SESSION['email']))

  header('Location: login.php');

if($_SESSION['email']!='admin@gmail.com'){
        echo "<p class='aviso'>No tienes privilegios para entrar</p>";
        echo "<a href='login.php'>Ir a login</a>";

}
else{
    echo "Usuario:<bold> ".$_SESSION['nombre']."</bold><br>";
    echo "Email:<bold> ".$_SESSION['email']."</bold><br>";
    echo "Hora de Conexión: ".$_SESSION['horaConexion']."<br>";
    echo "Fecha de Conexión: ".$_SESSION['fechaConexion']."<br>"; 
    echo "<br>";
    echo "<div id='cabeza'>
        <h2>Software Naranco</h1>
        <h3>Visualizar Clientes</h2>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <fieldset>
            

        <fieldset>  
    </form>
    <?php
         $sql="SELECT *
        FROM clientes
        ";
        try{
            $consulta=$conexion->query($sql);
            ?>
            <table>
                <tr>
                    <th>Id_cliente</th><th>Nombre</th><th>Email</th><th>Password</th><th>Telefono</th><th>Direccion</th><th>Fecha Alta</th>
                </tr>
            <?php
            while($sql=$consulta->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                echo "<td>" . $sql->id_cliente. "</td>";
                echo "<td>" . $sql->nombre."</td>";
                echo "<td>" . $sql->email. "</td>";
                echo "<td>" . $sql->password. "</td>";
                echo "<td>" . $sql->telefono. "</td>";
                echo "<td>" . $sql->direccion. "</td>";
                echo "<td>" . $sql->fec_alta. "</td>";

            }
                echo "</table>";
        } catch (PDOException $e) {
            echo "Error ".$e->getMessage()."<br />";
        }
    }

?>
</div>
<p><a href="menu.html">Volver al menú</a></p>



