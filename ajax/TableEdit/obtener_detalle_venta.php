<?php

//require_once "../../modelos/conexion.php";
require ("../database.php");
/*ventana de edicion*/
$nro_boleta = mysqli_real_escape_string($connection, $_POST['nro_boleta']);

$query = "SELECT dv.detalle_venta_id,
                dv.nro_boleta,
                dv.codigo_producto,
                c.nombre as nombre_categoria,
                p.nombre as descripcion_producto,
                dv.cantidad as cantidad,                            
                dv.precio as precio,                            
                dv.descuento_porcentual as descuento_porcentual,                            
                round(dv.total_producto,2) as total_venta 
                FROM detalle_ventas dv 
                inner join productos p on dv.codigo_producto = p.codigo_producto
                inner join categorias c on c.categoria_id = p.categoria_id
          where nro_boleta = '$nro_boleta' ORDER BY dv.detalle_venta_id";

$result = mysqli_query($connection, $query);

$html = "";

while ($row1 = mysqli_fetch_assoc($result)) {

  $html .= "<tr>
              <td>" . $row1['detalle_venta_id'] . "</td>
              <td>" . $row1['nro_boleta'] . "</td>
              <td>" . $row1['codigo_producto'] . "</td>
              <td>" . $row1['nombre_categoria'] . "</td>
              <td>" . $row1['descripcion_producto'] . "</td>
              <td class='cantidad' data-id_cantidad='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['cantidad'] . "</td>
              <td class='precio' data-id_precio='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['precio'] . "</td>
              <td class='descuento' data-id_descuento='" . $row1['detalle_venta_id'] . "' contenteditable>" . $row1['descuento_porcentual'] . "</td>
              <td>" . $row1['total_venta'] . "</td>
              <td><button class='btnEliminar btn-danger' data-id_codigo='" . $row1['detalle_venta_id'] . "'>Eliminar</button></td>
            </tr>";
}

$html .= "
          <tr>
            <td></td>
            <td>" . $nro_boleta . "</td>
            <td id='codigo_producto_add' contenteditable></td>
            <td id='nombre_categoria_add'></td>
            <td id='descripcion_producto_add'></td>
            <td id='cantidad_add' contenteditable></td>
            <td id='precio_add'></td>
            <td id='descuento_add' contenteditable></td>
            <td></td>
            <td><button class='btnAgregar btn-success' id='btnAgregarNuevoProducto'>Agregar</button></td>
          </tr>";

if ($html === "") {
  $html = "<tr><td colspan='8'>No se encontraron detalles para esta venta</td></tr>";
}

echo $html;