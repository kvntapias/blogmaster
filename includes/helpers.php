<?php
function mostrarError($errores,$campo){
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta-error'>".$errores[$campo]."</div>";
    }
    return $alerta;
}

function borrarError(){
   $borrado = false;
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['errores_entrada'])) {
        $_SESSION['errores_entrada'] = null;
        $borrado = true;
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }
   return $borrado;
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC";
    $categorias = mysqli_query($conexion,$sql);
    $res = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $res = $categorias;
    }
    return $res;
}

function conseguirCategoria($conexion, $id){
    $sql = "SELECT * FROM categorias where id = '$id'";
    $categorias = mysqli_query($conexion,$sql);
    $res = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
        $res = mysqli_fetch_assoc($categorias);
    }
    return $res;
}


function conseguirEntrada($conexion, $id){
    $sql = "SELECT e.*, c.nombre as categoria, c.id as categoria_id,
    CONCAT(u.nombre,'',u.apellidos) as usuario
    
    FROM entradas e
    INNER JOIN categorias c ON c.id = e.categoria_id
    INNER JOIN usuarios u ON u.id = e.usuario_id
    WHERE e.id = '$id'";

    $entrada = mysqli_query($conexion,$sql);
    $res = array();
    if ($entrada && mysqli_num_rows($entrada) >=1) {
        $res = mysqli_fetch_assoc($entrada);
    }
    return $res;
}


function conseguirEntradas($conexion, $limit, $categoria, $busqueda){
    $sql = "SELECT e.*, 
    c.nombre as categoria 
    from entradas e INNER JOIN categorias c ON c.id = e.categoria_id ";
     if ($categoria) {
         $sql .= " WHERE e.categoria_id = '$categoria'";
     }

     if ($busqueda) {
        $sql .= " WHERE e.titulo LIKE '%$busqueda%'";
    }


     $sql .= " ORDER BY e.id DESC";
     if ($limit) {
         $sql .=" LIMIT ".$limit;
     }
    $entradas = mysqli_query($conexion, $sql);
    $res = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
        $res = $entradas;
    }
    return $res;
}






?> 
