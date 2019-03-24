<?php 

if (!isset($_POST['busqueda'])) {
    header("Location: index.php ");
}

?>

<?php require_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php";?>

    <!--MAIN CONTENT-->   
        <div id="principal">
            <h1>Busqueda de <?=$_POST['busqueda']?></h1>
            <?php
            $entradas = conseguirEntradas($db, null, null ,$_POST['busqueda']);
            if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                while($entrada = mysqli_fetch_assoc($entradas)):
                  ?>
                    <article class="entrada">
                      <a href="entrada.php?id=<?=$entrada['id']?>">
                          <h2><?=$entrada['titulo']?></h2>
                          <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?> </span>
                            <p>
                              <?=substr($entrada['descripcion'],0, 150)."..."?>
                            </p>
                        </a>
                     </article>
                  <?php
                endwhile;
            else:
            ?>
            <div class="alertas">No hay entradas</div>
            <?php  endif;?>

        </div>

<?php require_once "includes/pie.php"; ?>