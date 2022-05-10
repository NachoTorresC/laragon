<?php
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";

if (!isset($_SESSION['email']))

    header('Location: login.php');

if ($_SESSION['email'] != 'admin@gmail.com') {
    echo "<p class='aviso'>No tienes privilegios para entrar</p>";
    echo "<a href='login.php'>Ir a login</a>";
} else {
    echo "Usuario:<bold> " . $_SESSION['nombre'] . "</bold><br>";
    echo "Email:<bold> " . $_SESSION['email'] . "</bold><br>";
    echo "Hora de Conexión: " . $_SESSION['horaConexion'] . "<br>";
    echo "Fecha de Conexión: " . $_SESSION['fechaConexion'] . "<br>";
    echo "<br>";
    echo "<div id='cabeza'>
        <h2>Software Naranco</h1>
        <h3>MODIFICAR STOCK</h2>";
?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <fieldset>
            <label>Productos:
                <select name='producto'>";
                    <?php
                    $sql = "select id from productos ";
                    $consulta = $conexion->query($sql);
                    while ($res = $consulta->fetch(PDO::FETCH_OBJ)) {
                        echo "<option value='{$res->id}'";
                        if (isset($_POST['producto'])) {
                            if ($_POST['producto'] == $res->id) {
                                echo "selected='true'";
                            }
                        }
                        echo ">" . $res->id . "</option>";
                    }
                    ?>
                </select></label><br>
            <br><input type='submit' name='listar' value='lISTAR PRODUCTO'><BR>
            <fieldset>
    </form>

    <?php
    if (isset($_POST['listar'])) {
        $producto = $_POST['producto'];
        echo "<br>Producto:  " . $producto;
        $sql = "SELECT *
        FROM productos
        WHERE id LIKE '$producto'
        ";
        try {
            $consulta = $conexion->query($sql);
    ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantida Producto</th>
                    <th>Precio</th>
                    <th>Stock</th>
                </tr>
                <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <?php

            while ($sql = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>" . $sql->id . "</td>";
                echo "<td>" . $sql->producto . "</td>";
                echo "<td>" . $sql->num_cat_prod . "</td>";
                echo "<td>" . $sql->precio . "</td>";
                echo "<td><input type='number' name='$sql->id' value='$sql->stock' min='1' max ='100'/></td>";  // importante poner maximo y minimo
                echo "<td><input type='hidden' name='nombre' value='$sql->id'/></td>";

                
            }

            echo "</table>";
            echo "<input type='submit' name='actualizar' value='Actualizar'/>";
            ?>
            </form>
            <?php

        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }

    if (isset($_POST['actualizar'])) {
        $producto = $_POST["nombre"];
        $nuevoStock = $_POST[$producto];
        try{   
            $sql="update productos set stock=? where id=?";
            //PARA ELIMINAR
            // $sql = "DELETE FROM productos WHERE id='$producto'";
            // $resultado = $conexion -> query($sql);	
        	$consulta=$conexion->prepare($sql);
            $consulta->execute(array($nuevoStock,$producto));
            echo "Actualizado el producto ".$producto." con Stock ".$nuevoStock;

        }catch(PDOException $e) {
            echo 'Error actualizando registro: ' . $e->getMessage();
            exit;}
      }
    }

        ?>
        </div>
        <p><a href="menu.html">Volver al menú</a></p>