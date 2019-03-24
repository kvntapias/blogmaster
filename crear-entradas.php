<?php require_once "includes/redireccion.php" ?>;
<?php require_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php";?>

<div id="principal">
    <h1>Crear entradas</h1>
    <p>Añade nuevas entradas al blog</p>
    <br>
    <form action="guardar-entrada.php" method="post">
        <label for="titulo">titulo de la entrada:</label>
        <input type="text" name="titulo" id="titulo">
         <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): '' ?>

        <label for="descripcion">descripcion de la entrada:</label>
        <textarea type="text" name="descripcion" id="descripcion"></textarea>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): '' ?>
        
        <label for="categoria"></label>
        <select name="categoria" id="categoria">
            <?php 
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>"><?=$categoria['nombre']?></option>

            <?php endwhile; 
                endif;?>
        </select>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): '' ?>


        <input type="submit" value="Guardar">
    </form>
    <?php borrarError(); ?>
</div>

<?php require_once "includes/pie.php"; ?>