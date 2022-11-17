<?php 
    //Importar la conexion

    require __DIR__ . '/../config/database.php';
    $db = conectarDB();

    //Consultar;

        $sql = "SELECT * FROM Producto";

        $consulta = mysqli_query($db, $sql);

        

    //Obtener los resultados

?>
<div class="grid">
    <?php while( $row = mysqli_fetch_assoc($consulta)): ?>
        
        
        <div class="producto sombra"><!-- INICIO PRODUCTO -->
            <img class="producto__imagen" src="<?php echo $row['imagen_producto']?>" alt="">
            <div class="producto__informacion">
                <p class="producto__nombre"><?php echo $row['nombre_producto']?></p>
                <p class="producto__precio"><?php echo '$' . $row['precio_producto']?></p>
                <div class='ancarrito'>
                    <form class='formproducto'>
                        <input class="formulario__menu" type="number" placeholder="Cantidad" min="1">
                        <input class="formulario__btnsubmenu" type="submit" value="Agregar al carrito">
                    </form>
                </div>
            </div>
        </div><!-- FIN PRODUCTO-->

       
    <?php endwhile; ?>
</div>
