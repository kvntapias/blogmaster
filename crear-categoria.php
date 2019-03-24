<?php require_once "includes/redireccion.php" ?>;
<?php require_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php";?>

<div id="principal">
    <h1>Crear categorias</h1>
    <p>Añade nuevas categorias al blog para identificarlas mejor</p>
    <br>
    <form action="guardar-categoria.php" method="post">
        <label for="nombre">Nombre de la categoría:</label>
        <input type="text" name="nombre" id="nombre">

        <input type="submit" value="Guardar">
    </form>
</div>

<?php require_once "includes/pie.php"; ?>