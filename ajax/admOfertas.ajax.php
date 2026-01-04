<?php

require_once "../modelos/admOfertas.modelo.php";

if ($_POST["accion"]) {

  switch ($_POST['accion']) {

    case 'obtener_ofertas':

      $response = AdmOfertasModelo::mdlObtenerAdmOfertas();
      echo json_encode($response, JSON_UNESCAPED_UNICODE);
      break;
    case 'confirmar_oferta':

      /* $response = ComprasModelo::mdlConfirmarCompra($_POST["serie"],$_POST["correlativo"],$_POST["id_compra"]);
        echo json_encode($response);
        break; */

    default:
      # code...
      break;
  }
}
