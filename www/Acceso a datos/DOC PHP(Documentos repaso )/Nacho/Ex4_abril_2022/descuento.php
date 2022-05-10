<?php
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";

if (!isset($_SESSION['email']))

    header('Location: login.php');

if ($_SESSION['email'] != 'admin@admin.com') {
    echo "<p class='aviso'>No tienes privilegios para entrar no eres administrador</p>";
    echo "<a href='logout.php'>Ir a logout</a>";
} else {
    echo "Usuario:<bold> " . $_SESSION['nombre'] . "</bold><br>";
    echo "Hora de Conexión: " . $_SESSION['horaConexion'] . "<br>";
    echo "Fecha de Conexión: " . $_SESSION['fechaConexion'] . "<br>";
    echo "<br>";
    echo "<div id='cabeza'>
        <h2>Software Naranco</h1>
        <h3>Añadir descuento a productos de una Catetoria   </h2>";
?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
        <fieldset>
            <label>Categoria :
                <select name='categorias'>";
                    <?php
                    $sql = "select * from categorias "; // consulta que realizo para que me muestre los nombres de las categorias
                    $consulta = $conexion->query($sql);
                    while ($res = $consulta->fetch(PDO::FETCH_OBJ)) {
                        echo "<option value='$res->idcategoria'";
                        if (isset($_POST['categorias'])) {
                            if ($_POST['categorias'] == $res->idcategoria) {
                                echo "selected='true'";
                            }
                        }
                        echo ">" . $res->nombrecategoria     . "</option>";

                        

                    }
                    ?>
                </select></label><br>
            <br><input type='submit' name='listar' value='LISTAR CATEGORIA'><BR>
            <fieldset>
    </form>

    <?php
    if (isset($_POST['listar'])) {
        $categoria = $_POST['categorias'];
        echo "<br>Producto:  " . $categoria;


        $sql =  "SELECT productos.idproducto,productos.nombreproducto,productos.precio,productos.stock,productos.descuento,categorias.idcategoria
                FROM productos,categorias
              WHERE categorias.idcategoria LIKE '$categoria' AND productos.idcategoria=categorias.idcategoria";
        try {
            $consulta = $conexion->query($sql);
    ?>
            <table>
                <tr>
                    <th>idProducto</th>
                    <th>nombreProducto</th>
                    <th>precio</th>
                    <th>Stock</th>
                    <th>descuento</th>
                </tr>
               
        <?php

            while ($res = $consulta->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>" . $res->idproducto . "</td>";
                echo "<td>" . $res->nombreproducto . "</td>";
                echo "<td>" . $res->precio . "</td>";
                echo "<td>" . $res->stock . "</td>";
                echo "<td>" . $res->descuento . "</td>";
               
               echo "<br>". $res->idproducto;
                $sql2="update productos set descuento=? where idproducto=? ";
                $consulta1=$conexion->prepare($sql2);
                $consulta1->execute(array('s',$res->idproducto));
               

                 $sql3="update detallesdepedidos set descuento=? where idproducto=? ";
                 $consulta2=$conexion->prepare($sql3);
                 $consulta2->execute(array(10,$res->idproducto));
                 
 
                
            }

            echo "</table>";
           
            ?>
            
            <?php

        } catch (PDOException $e) {
            echo "Error " . $e->getMessage() . "<br />";
        }
    }

    
    }

        ?>
        </div>
        <p><a href="menu.php">Volver al menú</a></p>