<?php require_once "includes/conexion.php"; ?>
<?php require_once "includes/helpers.php"; ?>

<?php 
    $entrada_actual = conseguirEntrada($db, $_GET['id']);
    if (!isset($entrada_actual['id'])) {
        var_dump($entrada_actual);
    }
?>

<?php require_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php";?>

    <!--MAIN CONTENT-->   
        <div id="principal">
            <h1><?=$entrada_actual['titulo']?></h1>
            <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
                <h2>Categoria: <?=$entrada_actual['categoria']?></h2>
            </a>
            <p>

            <?=$entrada_actual['descripcion']?>

            </p>
            <h4>Fecha: <?=$entrada_actual['fecha']?> | Autor: <?=$entrada_actual['usuario']?> </h4>

            <?php 
                if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']):
                    //var_dump($entrada_actual)
            ?>
            <a class="boton" href="editar-entrada.php?id=<?=$entrada_actual['id']?>">Editar Entrada</a>
            <a class="boton" href="borrar-entrada.php?id=<?=$entrada_actual['id']?>">Borrar</a>

            <?php endif; ?>
        </div>

<?php require_once "includes/pie.php"; ?>