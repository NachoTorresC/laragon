<?php
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";

if(!isset($_SESSION['email']))

  header('Location: login.php');

if($_SESSION['email']=='admin@admin.com'){
        echo "<p class='aviso'>No tienes privilegios para entrar eres Admin </p>" ;
        echo "<a href='login.php'>Ir a login</a>";

}
else{
    echo "Usuario:<bold> ".$_SESSION['nombre']."</bold><br>";
    echo "idusuario:<bold> ".$_SESSION['id']."</bold><br>";
    echo "Email:<bold> ".$_SESSION['email']."</bold><br>";
    echo "Hora de Conexión: ".$_SESSION['horaConexion']."<br>";
    echo "Fecha de Conexión: ".$_SESSION['fechaConexion']."<br>"; 
    $cli=$_SESSION['id'];
    echo "<br>";
    echo "<div id='cabeza'>
        <h2>PEDIDOS Naranco</h1>
        <h3>Visualizar pedidos de Talia</h2>";
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <fieldset>
      
            <select name='idpedido'>";
                <?php
                $sql = "select * from pedidos where idcliente = '$cli' "; 
                $consulta = $conexion->query($sql);
                while($res=$consulta->fetch(PDO::FETCH_OBJ)){
                    echo "<option value='{$res->idpedido}'";
                    if (isset($_POST['idpedido'])){
                        if ($_POST['idpedido']==$res->idpedido){
                        echo "selected='true'";}
                    }
                echo ">".$res->idpedido."</option>";
                }   
                ?>
            </select></label><br>
            <br><input type='submit' name='mostrar' value='mostrar '><BR>
        <fieldset>  
    </form>
    <?php

    if (isset($_POST['mostrar'])) {  
        $pedido=$_POST['idpedido'];
        echo "<br>Pedido:  ".$pedido;
        $sql="SELECT productos.idproducto,productos.nombreproducto,productos.precio,detallesdepedidos.cantidad,detallesdepedidos.descuento
        FROM detallesdepedidos, productos
        WHERE detallesdepedidos.idproducto=productos.idproducto 
        AND detallesdepedidos.idpedido='$pedido'";
        try{
            $consulta=$conexion->query($sql);
            ?>
            <table>
                <tr>
                    <th>Id_producto</th><th>Nombre_Producto</th><th>precio</th><th>cantidad </th><th>precio*cantidad</th> <th>descuento</th>
                </tr>
            <?php
        $tot=0;
            while($resultado=$consulta->fetch(PDO::FETCH_OBJ)){
               $prec=($resultado->precio)*($resultado->cantidad);
               echo ($prec);
                echo "<tr>";
                echo "<td>" . $resultado->idproducto. "</td>";
                echo "<td>" . $resultado->nombreproducto."</td>";
                echo "<td>" . $resultado->precio. "</td>";
                echo "<td>" . $resultado->cantidad. "</td>";
                echo "<td>" . $prec . "</td>";
                echo "<td>" . $resultado->descuento. "</td>";

                echo $resultado->descuento;

                $tot=$tot+$prec; echo "<br> total:".$tot;
                echo " precio:".$prec;if($resultado->descuento!=0){
                    $desc=$prec*($resultado->descuento)/100;
                    echo " descuent:".$desc;
                    $tot=$tot-$desc;
                }
                


               
               
        

            }
            echo "<tr><td></td><td></td><td>total es : ".$tot.":</td><td>".'€'."</td></tr>";
               

                echo "</table>";
               
        } catch (PDOException $e) {
            echo "Error ".$e->getMessage()."<br />";
        }
    }
}



?>

</div>
<p><a href="menu.php">Volver al menú</a></p>



