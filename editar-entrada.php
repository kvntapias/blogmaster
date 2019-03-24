<?php require_once "includes/redireccion.php" ?>;
<?php require_once "includes/conexion.php"; ?>
<?php require_once "includes/helpers.php"; ?>

<?php 
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
    if (!isset($entrada_actual['id'])) {
        header("Location: index.php");
    }
?>

<?php require_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php";?>


<div id="principal">
    <h1>EDITAR  ENTRADA</h1>
    <p>Modificar mi entrada <?=$entrada_actual['titulo']?> </p>
    <br>
    <form action="guardar-entrada.php?editar=<?=$entrada_actual['id']?>" method="post">
        <label for="titulo">titulo de la entrada:</label>
        <input type="text" name="titulo" id="titulo" value="<?=$entrada_actual['titulo']?>">
         <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'titulo'): '' ?>

        <label for="descripcion">descripcion de la entrada:</label>
        <textarea type="text" name="descripcion" id="descripcion"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'descripcion'): '' ?>
        
        <label for="categoria"></label>
        <select name="categoria" id="categoria">
            <?php 
                $categorias = conseguirCategorias($db);
                if (!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?=$categoria['id']?>"
            <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"':'' ?>
            >
                <?=$categoria['nombre']?>
            </option>

            <?php endwhile; 
                endif;?>
        </select>
        <?php echo isset($_SESSION['errores_entrada'])? mostrarError($_SESSION['errores_entrada'], 'categoria'): '' ?>


        <input type="submit" value="Guardar">
    </form>
    <?php borrarError(); ?>
</div>


<?php require_once "includes/pie.php"; ?>