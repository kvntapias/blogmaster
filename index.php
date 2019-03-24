

<?php require_once "includes/cabecera.php"; ?>
<?php require_once "includes/lateral.php";?>

    <!--MAIN CONTENT-->   
        <div id="principal">
            <h1>Ultimas entradas</h1>

            <?php
              $entradas = conseguirEntradas($db, 5 , null, null);
              if(!empty($entradas)):
                while($entrada = mysqli_fetch_assoc($entradas)):
                  ?>
                    <article class="entrada">
                      <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class="fecha"><?=$entrada['categoria'].' | '.$entrada['fecha']?> </span>
                          <p>
                            <?=substr($entrada['descripcion'],0, 150)."..."?>
                          </p>
                     </article>
                    </a>
                  <?php
                endwhile;
              endif;
            ?>
            <div id="ver-todas">
                <a href="entradas.php">Ver todas</a>
            </div>
        </div>

<?php require_once "includes/pie.php"; ?>