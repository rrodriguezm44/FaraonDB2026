<?php

require_once "conexion.php";

class AdmOfertasModelo
{

  static public function mdlObtenerAdmOfertas()
  {

    $query = "SELECT '' as acciones,
                      o.oferta_id,
                      o.nro_oferta,
                      o.id_proveedor, 
                      p.nombre_empresa as proveedor,
                      DATE(o.fecha_inicio) as fecha_inicio,
                      DATE(o.fecha_fin) as fecha_fin,
                      o.codigo_oferta, 
                      o.descripcion,
                      o.unidad_medida,
                      o.id_categoria, 
                      c.nombre as categoria,
                      o.fecha_registro,
                      format(o.total_oferta,2) as total_oferta, 
                      case when o.estado = 0 then 'REGISTRADO' else 'CONFIRMADO' end as estado
              FROM ofertas o inner join proveedores p on o.id_proveedor = p.proveedor_id
                            inner join categorias c on o.id_categoria = c.categoria_id";

    $stmt = Conexion::conectar()->prepare($query);

    $stmt->execute();

    return $stmt->fetchAll();
  }
}
