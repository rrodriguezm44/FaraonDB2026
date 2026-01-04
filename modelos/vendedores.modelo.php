<?php

require_once "conexion.php";

class VendedoresModelo
{
    static public function mdlObtenerVendedores()
    {

        $stmt = Conexion::conectar()->prepare("SELECT  id_usuario, 
                                                upper(nombre_usuario) as nombre_usuario
                                                FROM usuarios
                                                WHERE estado = 1 and id_perfil_usuario = 2
                                                order BY nombre_usuario");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    static public function mdlListarVentas()
    {

        $stmt = Conexion::conectar()->prepare('call prc_ListarVentas');

        $stmt->execute();

        return $stmt->fetchAll();
    }

    static public function mdlDesactivarVenta($nro_boleta)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE ventas 
                                                SET estado = 'anulado' 
                                                WHERE nro_boleta = :nro_boleta");

        $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $respuesta["tipo_msj"] = "success";
            $respuesta["msj"] = "Se desactivó la Venta correctamente";
        } else {
            $respuesta["tipo_msj"] = "error";
            $respuesta["msj"] = "Error al desactivar la Venta." . Conexion::conectar()->errorInfo();
        }

        return $respuesta;
    }

    static public function mdlActivarVenta($nro_boleta)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE ventas 
                                                SET estado = 'activo'
                                                WHERE nro_boleta = :nro_boleta");

        $stmt->bindParam(":nro_boleta", $nro_boleta, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $respuesta["tipo_msj"] = "success";
            $respuesta["msj"] = "Se activó la venta correctamente";
        } else {
            $respuesta["tipo_msj"] = "error";
            $respuesta["msj"] = "Error al activar la Venta." . Conexion::conectar()->errorInfo();
        }

        return $respuesta;
    }

    static public function mdlObtenerProveedores()
    {
        $stmt = Conexion::conectar()->prepare("SELECT  proveedor_id, 
                                                upper(nombre_empresa) as nombre_proveedor
                                                FROM proveedores
                                                WHERE estado = 'activo'                                                        
                                                order BY nombre_empresa");

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : [];
    }

    static public function mdlListarVentasProveedor($idProveedor, $fechaDesde, $fechaHasta)
    {
        // Validar y formatear fechas a 'Y-m-d' si es necesario
        $fechaDesde = date('Y-m-d', strtotime($fechaDesde));
        $fechaHasta = date('Y-m-d', strtotime($fechaHasta));

        $stmt = Conexion::conectar()->prepare("SELECT 
                                                v.nro_boleta,
                                                v.fecha_e AS fecha_venta,
                                                SUM(v.total) AS total_venta,
                                                p.nombre_empresa AS proveedor
                                            FROM 
                                                ventas v
                                            JOIN 
                                                detalle_ventas dv ON v.nro_boleta = dv.nro_boleta
                                            JOIN 
                                                productos pr ON dv.codigo_producto = pr.codigo_producto
                                            JOIN 
                                                proveedores p ON pr.proveedor_id = p.proveedor_id
                                            WHERE 
                                                v.fecha_e BETWEEN :fechaDesde AND :fechaHasta
                                                AND p.proveedor_id = :idProveedor
                                            GROUP BY 
                                                v.nro_boleta, v.fecha_e, p.nombre_empresa
                                            ORDER BY 
                                                v.fecha_e, v.nro_boleta;");

        $stmt->bindParam(":idProveedor", $idProveedor, PDO::PARAM_INT);
        $stmt->bindParam(":fechaDesde", $fechaDesde, PDO::PARAM_STR);
        $stmt->bindParam(":fechaHasta", $fechaHasta, PDO::PARAM_STR);

        /* $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return is_array($result) ? $result : []; */

        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return is_array($result) ? $result : [];
        } else {
            return [];
        }
    }

    static public function mdlListarResumenProveedor($fechaDesde, $fechaHasta)
    {
        // Validar y formatear fechas a 'Y-m-d' si es necesario
        $fechaDesde = date('Y-m-d', strtotime($fechaDesde));
        $fechaHasta = date('Y-m-d', strtotime($fechaHasta));

        $stmt = Conexion::conectar()->prepare("SELECT 
                                                p.proveedor_id,
                                                pr.nombre_empresa AS proveedor,
                                                SUM(v.total) AS total_ventas,
                                                COUNT(DISTINCT v.nro_boleta) AS cantidad_ventas
                                            FROM ventas v
                                            INNER JOIN detalle_ventas dv ON v.nro_boleta = dv.nro_boleta
                                            INNER JOIN productos p ON dv.producto_id = p.producto_id
                                            INNER JOIN proveedores pr ON p.proveedor_id = pr.proveedor_id
                                            WHERE 
                                                v.fecha_venta BETWEEN :fechaDesde AND :fechaHasta
                                            GROUP BY p.proveedor_id, pr.nombre_empresa
                                            ORDER BY total DESC;");

        $stmt->bindParam(":fechaDesde", $fechaDesde, PDO::PARAM_STR);
        $stmt->bindParam(":fechaHasta", $fechaHasta, PDO::PARAM_STR);


        if ($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return is_array($result) ? $result : [];
        } else {
            return [];
        }
    }
}