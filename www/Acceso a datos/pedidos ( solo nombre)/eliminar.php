<?php 
include('conexion.php');
session_start();
echo "<link rel='stylesheet' href='estilo.css' />";
if(!isset($_SESSION['usuario_valido']))

  header('Location: login.php');

if($_SESSION['nombre']=='Administrador'){
        echo "<p class='aviso'>No tienes privilegios para entrar</p>";
        echo "<a href='login.php'>Ir a login</a>";

}
else{
      echo "Usuario:<bold> ".$_SESSION['nombre']."</bold><br>";
      echo "Hora de Conexión: ".$_SESSION['horaConexion']."<br>";
      echo "Fecha de Conexión: ".$_SESSION['fechaConexion']."<br>"; 
      echo "<br>";
      $cliente=$_SESSION['usuario_valido'];
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
   </form>
<?php
   
   if (isset($_POST['listar']) ){
      $pedido=$_POST['pedido'];
      try{  
         $consulta="select det_pedidos.id_pedido,det_pedidos.id_producto, productos.producto,
         productos.precio,det_pedidos.cantidad
         FROM det_pedidos, productos
         WHERE det_pedidos.id_producto=productos.id and det_pedidos.id_pedido='$pedido'";
         $sql=$conexion->query($consulta);
         echo "<table><tr><tr><tr><th>id_pedido</th><th>id_producto</th><th>NombreProducto</th>
         <th>Precio</th><th>Cantidad</th><th>Borrar</th></tr>";
         $total=0;
         ?> <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'> <?php
         while($res=$sql->fetch(PDO::FETCH_OBJ)) 
         {  
            echo "
            <tr>
               <td>".$res->id_pedido."</td>
               <td>".$res->id_producto."</td>
               <td>".$res->producto."</td>
               <td>".$res->precio."</td>";
               $t=$res->precio*$res->cantidad;
               echo "<td><input type='text' name='cantidad[$res->id_producto]' value='$res->cantidad' readonly></td>";  
               echo "<td><input type='checkbox' name='borrar[$res->id_producto]' value='$t'</td>";                                
               echo"</tr>";  
            echo "<input type='hidden' name='pedido' value='$res->id_pedido'>";
         }
      }catch(PDOException $e) {
         echo 'Error actualizando registro: ' . $e->getMessage();
         exit;
      }
      ?>
      </table>
      <input type="submit" name="eliminarok" value="Eliminar"/>
      </form>
      </div>   
      <?php
   }
  if(isset($_POST['eliminarok'])){
      if(!empty($_POST['borrar'])){
      $eliminaciones = $_POST['borrar'];
     var_dump($eliminaciones);
      $i=count($eliminaciones);
      $ped = $_POST['pedido'];
      echo "<br> el pedido es:".$ped;
      $tot=0;
      $cantidad=$_POST['cantidad'];
      echo "<br><br>";
          
      $sql2 = "UPDATE productos SET stock=? WHERE id=?";

      foreach ($eliminaciones as $key =>$valor ){
         echo "<br>key es:".$key;
         echo "<br>valor es:".$valor;
       // $devolverSQL = "DELETE FROM det_pedidos WHERE id_pedido='$ped' and id_producto='$key'";
      //  $resultado = $conexion -> query($devolverSQL) ;		
         $tot=$tot+$valor;
               
         //actualizar el stock de los elementos borrados
         $sql="SELECT p.stock 
                FROM productos p  
                WHERE   p.id ='$key'";
          $exist = $conexion->query($sql);
          $fila = $exist->fetch(PDO::FETCH_OBJ);
          echo "<br> cantidadNueva:".$cantidad[$key];
          echo "<br> stock:".$fila->stock;
          $resultado = $fila->stock + $cantidad[$key];
         
         echo "<br>nuevo stock:".$resultado;
          $consulta = $conexion->prepare($sql2)->execute(array($resultado, $key)); 
      }
      echo "<br>El total para restar a pedidos es:".$tot;
      $consulta="select totalpedido
         FROM pedidos
         WHERE pedidos.id_pedido='$ped'";
         $sql=$conexion->query($consulta);
         if($res=$sql->fetch(PDO::FETCH_OBJ)) 
         $total=$res->totalpedido;
         $tot=$total-$tot;
      try{   
         //$sql="delete pedidos set totalpedido=? where id_pedido=? and id_cliente=?";
         //$consulta=$conexion->prepare($sql);
         //$consulta->execute(array($tot,$ped,$_SESSION['usuario_valido']));

         $sql="update pedidos set totalpedido=? where id_pedido=? and id_cliente=?";
         $consulta=$conexion->prepare($sql);
         $consulta->execute(array($tot,$ped,$_SESSION['usuario_valido']));
      }catch(PDOException $e) {
         echo 'Error actualizando registro: ' . $e->getMessage();
         exit;
      }
      
      }
      else{
      echo " nos has marcado checkbox";
      }

	}
}


		
?>
    

