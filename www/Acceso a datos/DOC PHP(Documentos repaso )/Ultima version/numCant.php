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
        <h3>Visualizar pedidos por fecha</h2>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <fieldset>
            <label>Fecha:
            <select name='fecha'>";
                <?php
                $sql = "select *  from pedidos where totalpedido >= '490' ";
                $consulta = $conexion->query($sql);
                while($res=$consulta->fetch(PDO::FETCH_OBJ)){
                    echo "<option value='{$res->id_pedido}'";
                    if (isset($_POST['fecha'])){//
                        if ($_POST['fecha']==$res->id_pedido){//
                        echo "selected='true'";}//
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
        $pedido=$_POST['fecha'];
        echo "<br>Pedido:  ".$pedido;
        $sql="SELECT det_pedidos.id_producto,productos.producto,det_pedidos.cantidad,productos.precio
        FROM det_pedidos, productos
        WHERE det_pedidos.id_pedido= '$pedido'
        AND det_pedidos.id_producto=productos.id";
        try{
            $consulta=$conexion->query($sql);
            ?>
            <table>
                <tr>
                    <th>Id_producto</th><th>Nombre_Producto</th><th>Cantidad</th><th>Precio</th>
                </tr>
            <?php
            $total=0;
            while($resultado=$consulta->fetch(PDO::FETCH_OBJ)){
                echo "<tr>";
                echo "<td>" . $resultado->id_producto. "</td>";
                echo "<td>" . $resultado->producto."</td>";
                echo "<td>" . $resultado->cantidad. "</td>";
                echo "<td>" . $resultado->precio. "</td></tr>";
                $total=$total + ($resultado->precio)*($resultado->cantidad);
               /* $porcentaje = 40;
                $descuento = ($total * $porcentaje)/100;
                $totDes = $total - $descuento;*/

            }
                //echo "<tr><td></td><td></td><td>Porcentaje de descuento:</td><td>".$porcentaje.'%'."</td></tr>";
                echo "<tr><td></td><td></td><td>Total pedido:</td><td>".$total.'€'."</td></tr>";
              //  echo "<tr><td></td><td></td><td>Pedido con ".$porcentaje."% de descuento:</td><td>".$totDes.'€'."</td></tr>";

                echo "</table>";
        } catch (PDOException $e) {
            echo "Error ".$e->getMessage()."<br />";
        }
    }
}
?>
</div>
<p><a href="menu.html">Volver al menú</a></p>



