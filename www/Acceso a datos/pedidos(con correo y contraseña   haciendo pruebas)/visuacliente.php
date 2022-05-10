<?php
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";  //enlazo los estilos

if(!isset($_SESSION['email'])) // si no existe la variable de sesion email me manda a logearme

  header('Location: login.php');

if($_SESSION['email']!='admin@gmail.com'){
        echo "<p class='aviso'>No tienes privilegios para entrar</p>";
        echo "<a href='login.php'>Ir a login</a>";

}
else{
   // echo "Usuario:<bold> ".$_SESSION['nombre']."</bold><br>";
    echo "Email:<bold> ".$_SESSION['email']."</bold><br>";
    echo "Hora de Conexión: ".$_SESSION['horaConexion']."<br>";
    echo "Fecha de Conexión: ".$_SESSION['fechaConexion']."<br>"; 
    echo "<br>";
    echo "<div id='cabeza'>
        <h2>Software Naranco</h1>
        <h3>Visualizar pedidos por fecha</h2>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <fieldset>
            <label> nombre:
            <select name='nombre'>";
                <?php
                $sql = "select *  from clientes ";
                $consulta = $conexion->query($sql);
                while($res=$consulta->fetch(PDO::FETCH_OBJ)){
                    echo "<option value='{$res->id_pedido}'";
                    if (isset($_POST['nombre'])){
                        if ($_POST['nombre']==$res->nombre){
                        echo "selected='true'";}
                    }
                echo ">".$res->fec_ped."</option>";
                }   
                ?>
            </select></label><br>
            <br><input type='submit' name='listar' value='listar pedido'><BR>
        <fieldset>  
    </form>
    <?php

    if (isset($_POST['listar'])) {  
        $pedido=$_POST['nombre'];
        echo "<br>Pedido:  ".$pedido;
        $sql="SELECT *
        FROM cliente
        WHERE nombre= '$pedido'
        AND det_pedidos.id_producto=productos.id";
        try{
            $consulta=$conexion->query($sql);
            ?>
            <table>
                <tr>
                    <th>id_cliente</th><th>nombre</th><th>email</th><th>password</th>
                </tr>
            <?php
           // $total=0;
            while($resultado=$consulta->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                echo "<td>" . $resultado->id_cliente. "</td>";
                echo "<td>" . $resultado->nombre."</td>";
                echo "<td>" . $resultado->email. "</td>";
                echo "<td>" . $resultado->password. "</td></tr>";
                // $total=$total + ($resultado->precio)*($resultado->cantidad);
                // $porcentaje=10;
                // $descuento=($total*$porcentaje)/100;
                // $totDesc=$total-$descuento;
            }
                echo "<tr><td></td><td></td><td>Total pedido:</td><td>".$total."</td></tr>";
                echo "<tr><td></td><td></td><td>Total pedido con descuento:</td><td>".$totDesc."</td></tr>";
                echo "</table>";
        } catch (PDOException $e) {
            echo "Error ".$e->getMessage()."<br />";
        }
    }
}
?>
</div>
<p><a href="menu.html">Volver al menú</a></p>



