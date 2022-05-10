<?php 
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";

if(!isset($_SESSION['usuario_valido']))
  header('Location: login.php');

if($_SESSION['nombre']=='Administrador'){
  echo "<p class='aviso'>No puedes añadir pedido pues eres: ".$_SESSION['nombre']."</p>";
  echo "<a href='login.php'>Ir a login</a>";
}
else{
  echo "Usuario:<bold> ".$_SESSION['nombre']."</bold><br>";
  echo "Hora de Conexión: ".$_SESSION['horaConexion']."<br>";
  echo "Fecha de Conexión: ".$_SESSION['fechaConexion']."<br>"; 
  echo "<br>";
  ?>

  <h1>Insertar pedido</h1>
  <form class="borde" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="inserta" method="post">                    
    <p><label>Pedido:</label>
    <input type="number" name="pedido" value="<?php if(isset($_POST['pedido'])) echo $_POST['pedido'] ?>"maxlength="20"/> 
    <input type="submit" name="insertar" value="Insertar"/>
</form>
  <?php
    if(isset($_POST['insertar'])) {
      $pedido=$_POST['pedido'];
      $_SESSION['pedido']=$pedido;
      $instruccion = "SELECT id_pedido FROM pedidos where id_pedido='$pedido'";
      $consulta = $conexion -> query ($instruccion);
      if($consulta->fetch(PDO::FETCH_OBJ)!=NULL){
          echo "<BR>EL pedido :". $pedido. " ya existe";
      }else{
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name='inserta' method='post'>                    
          <p><label>idCliente: </label>
          <input type="text" name="cliente" value="<?php echo $_SESSION['usuario_valido'] ?>" readonly/></p>
          <p><label>Fecha: </label>
          <input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>" readonly><br>
          <p><label>Producto: 
          <select name="producto">
          <?php
          $sql = "select id,producto,stock from productos";
          $consulta = $conexion->query($sql);
          while($res=$consulta->fetch(PDO::FETCH_OBJ)){
            echo "<option value='$res->id'";
            if (isset($_POST['producto'])){
              if ($_POST['id']==$res->id){
                echo "selected='true'";}
              }
              echo ">".$res->producto."</option>";
          }
          ?>
          <input type="hidden" name="pedido" value="<?php echo $_SESSION['pedido']; ?>">
          <input type="submit" name="insertar2" value="Insertar Pedido" /></p>
        </form>
      <?php
      }
    }
    if (isset($_POST['insertar2']) ){
      $pedido=$_SESSION['pedido'];
      echo " el pedido es:".$pedido;
      $cli=$_POST['cliente'];
      $fecha=$_POST['fecha'];
      $prod=$_POST['producto'];
      $sql = "SELECT stock,precio 
            FROM productos 
            WHERE id='$prod'"; 
      $resultado = $conexion->query($sql);
      $fila = $resultado->fetch(PDO::FETCH_OBJ);
      if($fila->stock <=0){
        echo "<p class='aviso'>no hay saldo suficiente</p>";
      }else{ 
        $sql = "INSERT INTO pedidos(id_pedido,id_cliente,fec_ped,totalpedido)  VALUES (?,?,?,?)"; 
        $consulta=$conexion->prepare($sql);  
        $consulta->execute(array($pedido,$cli,$fecha,0));	
        
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" name='inserta' method='post'> 
          <p><label>Producto: </label>
            <input type="text" name="producto" value="<?php echo $prod ?>" readonly><br>
          </p> 
          <p><label>Stock: </label>
            <input type="number" name="stock" value="<?php echo $fila->stock ?>" readonly><br>
          </p> 
          <p><label>Precio: </label>
            <input type="number" name="precio" value="<?php echo $fila->precio ?>" readonly><br>
          </p> 
          <p><label>Cantidad: </label>
            <input type="number" name="cantidad" max="<?php echo $fila->stock?>" min="<?php echo 1?>" ><br></p>  
            <input type="hidden" name="pedido" value="<?php echo $pedido; ?>">
            <input type="submit" name="insertar3" value="Insertar Producto" />
          </p> 
        </form> 
        <?php 
      }
    }
    if(isset($_POST['insertar3'])){
        $prod=$_POST['producto'];
        $precio=$_POST['precio'];
        $stock=$_POST['stock'];
        $cant=$_POST['cantidad'];
        $ped=$_SESSION['pedido'];
        try{
          $conexion->beginTransaction();
          $insertar = $conexion->prepare("INSERT INTO det_pedidos(id_pedido, id_producto,cantidad) 
          VALUES (?,?,?)");
          $actualiza = $conexion->prepare("UPDATE productos SET stock= ? WHERE id= ?");
          $total=0;
          $sw=0;
          $total=$total + $precio*$cant;
          $insertar->execute(array($ped,$prod,$cant));
          $nuevasunidades=$stock-$cant;
          $actualiza->execute(array($nuevasunidades,$prod));
          $update = $conexion->prepare("UPDATE pedidos SET totalpedido=? WHERE id_pedido=?"); 
          $update->execute(array($total, $ped));
        }catch (PDOException $e) {
              "Error " . $e->getMessage();
        }
        $conexion->commit();

        echo "<h2>Comprobando la inserción .....</h2> ";   
        try{
          $instruccion = "SELECT pedidos.id_pedido, pedidos.id_cliente,productos.producto,
          productos.precio,productos.stock,
          det_pedidos.cantidad,pedidos.totalpedido  
          FROM pedidos, det_pedidos, productos
          WHERE pedidos.id_pedido='$ped' AND pedidos.id_pedido=det_pedidos.id_pedido AND
          det_pedidos.id_producto=productos.id";
          $consulta = $conexion -> query ($instruccion);
          
        }catch (PDOException $e) {
          "Error " . $e->getMessage();
        }
        while($fila = $consulta ->fetch(PDO::FETCH_OBJ)){
        echo "<table>
        <th>Id_pedido</th><th>Id_cliente</th><th>Producto</th><th>Precio</th><th>Stock</th><th>Cantidad</th><th>TotalPedido</th>
        <tr><td>$fila->id_pedido</td><td>$fila->id_cliente</td><td>$fila->producto</td>
        <td>$fila->precio</td><td>$fila->stock</td><td>$fila->cantidad</td><td>$fila->totalpedido</td></tr>
        </table>";
      }
      }

    }

?>
 
<p><a href="menu.html">Volver al menú</a></p>


