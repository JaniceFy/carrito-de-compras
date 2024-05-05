<?php
$precios = [
    'p001' => 1.5,
    'p002' => 2.5,
    'p003' => 11,
    'p004' => 1.5,
    'p005' => 5,
    'p006' => 22,
    'p007' => 18.5,
    'p008' => 15,
    'p009' => 7.5,
    'p010' => 1,
];

$descripciones = [
    'p001' => 'Gaseosa',
    'p002' => 'Mayonesa en sobre',
    'p003' => 'Chocolate para niños',
    'p004' => 'Fideos',
    'p005' => 'Conservas',
    'p006' => 'Chocolate',
    'p007' => 'Cafe 300mg.',
    'p008' => 'Mayonesa pote',
    'p009' => 'Crema Dental',
    'p010' => 'Cubito de pollo',
];

function asignaPrecio($codigo) {
    global $precios;
    return $precios[$codigo] ?? null;
}

function muestraDescripcion($codigo) {
    global $descripciones;
    return $descripciones[$codigo] ?? 'Descripción no encontrada';
}
?>
