<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Canasta de Compras</title>
    <link href="estilo.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include('encabezado.php'); ?>
    </header>
    <section>
        <table border="1" width="550" cellspacing="10" cellpadding="0">
            <tr>
                <td>
                    <img src="img/carrito.png" width="80" height="80" alt="Carrito de Compras" />
                </td>
            </tr>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            <?php
            session_start();
            include('asignaciones.php');

            // Asegúrate de que la sesión tenga el array 'productos'
            if (!isset($_SESSION['productos'])) {
                $_SESSION['productos'] = [];
            }

            $productos = $_SESSION['productos'];
            $total = 0;
            $bandera = false;
            
            // Obtener datos del formulario
            include('capturaDatos.php');
            $codigo = getProducto();
            $cantidad = getCantidad();

            if (!array_key_exists($codigo, $productos)) {
                $productos[$codigo] = $cantidad;
            } else {
                $productos[$codigo] += $cantidad;
                $bandera = true;
            }

            $_SESSION['productos'] = $productos; 

            $tSubtotal = 0;

            foreach ($productos as $cod => $cant) {
                $subtotal = $cant * asignaPrecio($cod);
                $tSubtotal += $subtotal;
                ?>
                <tr>
                    <td id="centrado"><?php echo $cod; ?></td>
                    <td><?php echo muestraDescripcion($cod); ?></td>
                    <td id="derecha">
                        <?php echo '$' . number_format(asignaPrecio($cod), 2); ?>
                    </td>
                    <td id="centrado"><?php echo $cant; ?></td>
                    <td id="derecha"><?php echo '$' . number_format($subtotal, 2); ?></td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td id="resaltado">Total a Pagar</td>
                <td></td>
                <td></td>
                <td></td>
                <td id="totales"><?php echo '$' . number_format($tSubtotal, 2); ?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <a href="index.php">Seguir comprando..!!</a>
                </td>
                <td colspan="4">
                    <a href="destruir.php">Finalizar la compra</a>
                </td>
            </tr>
        </table>
    </section>
    <footer>
        <?php include('pie.php'); ?>
    </footer>
</body>

</html>
