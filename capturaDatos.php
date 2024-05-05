<?php
function getProducto() {
    if (isset($_POST['selProducto'])) {
        return strip_tags($_POST['selProducto']); 
    } else {
        return ''; 
    }
}

function getCantidad() {
    if (isset($_POST['txtCantidad']) && is_numeric($_POST['txtCantidad'])) {
        return (int)$_POST['txtCantidad']; 
    } else {
        return 0; 
    }
}
?>
