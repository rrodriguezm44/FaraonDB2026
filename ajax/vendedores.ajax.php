<?php

require_once "../modelos/vendedores.modelo.php";

//=========================================================================================
// PETICIONES POST
//=========================================================================================
if (isset($_POST["accion"])) {

    switch ($_POST["accion"]) {

        case 'obtener_vendedores': 

            $response = VendedoresModelo::mdlObtenerVendedores();
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            break;

        case 'listar_ventas':

            // var_dump($_POST);
            // return;

            $response = VendedoresModelo::mdlListarVentas();
            echo json_encode($response);
            break;

        case 'desactivar_venta':

            $response = VendedoresModelo::mdlDesactivarVenta($_POST["nro_boleta"]);
            echo json_encode($response);
            break;

        case 'activar_venta':

            $response = VendedoresModelo::mdlActivarVenta($_POST["nro_boleta"]);
            echo json_encode($response);
            break;

        case 'obtener_proveedores': 

            $response = VendedoresModelo::mdlObtenerProveedores();
            echo json_encode($response, JSON_UNESCAPED_UNICODE);
            break;
            
        case 'buscar_ventas_proveedor':

            $response = VendedoresModelo::mdlListarVentasProveedor($_POST["idProveedor"],$_POST["fechaDesde"],$_POST["fechaHasta"]);
            echo json_encode($response);
            break;
        
        case 'resumen_proveedor':

            $response = VendedoresModelo::mdlListarResumenProveedor($_POST["fechaDesde"],$_POST["fechaHasta"]);
            echo json_encode($response);
            break;

        default:
            # code...
            break;
    }
}