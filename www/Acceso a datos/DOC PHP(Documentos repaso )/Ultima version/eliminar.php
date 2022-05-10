<?php 
include('conexion.php');
session_start();
//var_dump($_SESSION);
echo "<link rel='stylesheet' href='estilo.css' />";
if(!isset($_SESSION['email']))

  header('Location: login.php');

if($_SESSION['email']=='admin@gmail.com'){
        echo "<p class='aviso'>No tienes privilegios para entrar</p>";
        echo "<a href='login.php'>Ir a login</a>";

}
else{
   echo "Nombre:<bold> ".$_SESSION['nombre']."</bold><br>";
   echo "Tlf:<bold> ".$_SESSION['telefono']."</bold><br>";
    echo "Email:<bold> ".$_SESSION['email']."</bold><br>";
    echo "Hora de Conexión: ".$_SESSION['horaConexion']."<br>";
    echo "Fecha de Conexión: ".$_SESSION['fechaConexion']."<br>"; 
    echo "<br>";



$cliente=$_SESSION['email'];
echo "cliente es:".$cliente;

?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>

   <h1>Selecciona pedido</h1>
   <fieldset>
   <label>Pedido: 
   <select name="pedido">
      <?php
      $sql = "select id_pedido from pedidos ";
      $consulta = $conexion->query($sql);
      while($res=$consulta->fetch(PDO::FETCH_OBJ)){
         echo "<option value='$res->id_pedido'";
         if (isset($_POST['pedido'])){
            if ($_POST['pedido']==$res->id_pedido){
            echo "selected='true'";}
         }
         echo ">".$res->id_pedido."</option>";
      }
      ?>
   </select></label><br>
   <br><input type='submit' name='listar' value='listar pedido'><BR>

<?php
   echo "</form>";
   if (isset($_POST['listar']) && !isset($_POST['modificar'])){
      $pedido=$_POST['pedido'];
	   $consulta="select det_pedidos.id_pedido,det_pedidos.id_producto, productos.producto,
      productos.precio,det_pedidos.cantidad,productos.stock 
      FROM det_pedidos, productos
      WHERE det_pedidos.id_producto=productos.id and det_pedidos.id_pedido='$pedido'";
      $sql=$conexion->query($consulta);
      echo "<table><tr><tr><tr><th>id_pedido</th><th>id_producto</th><th>NombreProducto</th>
      <th>Precio</th><th>Cantidad</th><th>Stock</th><th>Borrar</th></tr>";
      $total=0;
      while($res=$sql->fetch(PDO::FETCH_OBJ)) 
      {  
      echo "
      <tr>
         <td>".$res->id_pedido."</td>
         <td>".$res->id_producto."</td>
         <td>".$res->producto."</td>
         <td>".$res->precio."</td>
         <td>".$res->cantidad."</td>";
         $t=$res->precio*$res->cantidad;
        
         echo "<td><input type='text' name='cantidad[$res->id_producto]' value='$res->stock'</td>";  
         echo "<td><input type='checkbox' name='borrar[$res->id_producto]' value='$t'</td>";                                
         echo"</tr>";  
         echo "<input type='hidden' name='pedido' value='$res->id_pedido'>";
      }
      ?>
      </table>
      <tr><td>[ <A HREF='menu.html'>Volver al menu</A> ]</td></tr>
      <input type="submit" name="eliminarok" value="Eliminar"/>
      </form>
      </div>   
      <?php
   }
   if(isset($_POST['eliminarok'])){
      if(!empty($_POST['borrar'])){
      $eliminaciones = $_POST['borrar'];
      $i=count($eliminaciones);
      echo "<br> el total de marcados es:".$i;
      $ped = $_POST['pedido'];
      echo "<br> el pedido es:".$ped;
      var_dump($eliminaciones);
      $tot=0;
      foreach ($eliminaciones as $key =>$valor ){
         echo "<br>key es:".$key;
         echo "<br>valor es:".$valor;
      // $devolverSQL = "DELETE FROM det_pedidos WHERE id_pedido='$ped' and id_producto='$key'";
      //  $resultado = $conexion -> query($devolverSQL) or die(mysqli_error($conexion));		
         $tot=$tot+$valor;
      }
   
      echo "<br>El total para restar a pedidos es:".$tot;
      try{   
         $sql="update pedidos set totalpedido=? where id_pedido=? and id_cliente=?";
         $consulta=$conexion->prepare($sql);
         $consulta->execute(array($tot,$ped,$_SESSION['email']));
     }catch(PDOException $e) {
         echo 'Error actualizando registro: ' . $e->getMessage();
         exit;}
   }
   else{
      echo " nos has marcado checkbox";
   }
     			
		    }
}

		
?>
    

