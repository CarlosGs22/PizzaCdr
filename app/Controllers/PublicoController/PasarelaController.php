<?php

namespace App\Controllers\PublicoController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Estados_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Inventario_modelo;
use App\Models\Admin\Localidades_modelo;
use App\Models\Admin\Menu_modelo;
use App\Models\Admin\Municipios_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Tamanios_Ingredientes_modelo;
use App\Models\Admin\Usuarios_modelo;
use App\Models\Publico\Detalle_Venta_modelo;
use App\Models\Publico\Direccion_modelo;
use App\Models\Publico\Productos_modelo as PublicoProductos_modelo;
use App\Models\Publico\Sucursal_Localidad_modelo;
use App\Models\Publico\Venta_modelo;
use CodeIgniter\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class PasarelaController extends Controller
{

    protected $helpers = [];
    protected $session;
    protected $datamenu;
    protected $usuarios_modelo;
    protected $status_modelo;
    protected $sucursales_modelo;

    protected $localidades_modelo;
    protected $municipios_modelo;
    protected $estados_modelo;
    protected $direccion_modelo;
    protected $inventario_modelo;
    protected $menu_modelo;
    protected $funciones;

    protected $cart;

    protected $venta_modelo;
    protected $productos_modelo;
    protected $detalle_venta_modelo;

    protected $tamanio_ingredientes_modelo;

    protected $encrypter;
    protected $encryption;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->especiales = new Especiales_modelo();
        //$this->datamenu['listas_especiales'] = $especiales->findAll();

        $this->session = \Config\Services::session();

        $this->usuarios_modelo = new Usuarios_modelo();
        $this->status_modelo = new Status_modelo();

        $this->estados_modelo = new Estados_modelo();
        $this->municipios_modelo = new Municipios_modelo();
        $this->localidades_modelo = new Localidades_modelo();
        $this->direccion_modelo = new Direccion_modelo();

        $this->tamanio_ingredientes_modelo = new Tamanios_Ingredientes_modelo();
        $this->inventario_modelo = new Inventario_modelo();
        $this->menu_modelo = new Menu_modelo();

        $this->venta_modelo = new Venta_modelo();
        $this->detalle_venta_modelo = new Detalle_Venta_modelo();

        $this->sucursales_modelo = new Sucursal_modelo();

        $this->productos_modelo = new PublicoProductos_modelo();

        $this->sucursales_localidad_modelo = new Sucursal_Localidad_modelo();

        $this->funciones = new Funciones();
        $this->session = session();

        $this->cart = \Config\Services::cart();

        $this->encryption = new \Config\Encryption();
        $key = bin2hex(\CodeIgniter\Encryption\Encryption::createKey(32));
        $this->encryption->key = $key;
        $this->encrypter = \Config\Services::encrypter();


        $especiales = new Especiales_modelo();
        $this->datamenu['listas_especiales'] = $especiales->findAll();
    }

    public $rutaHeader = 'Publico/Marcos/header.php';
    public $rutaModulo = 'Publico/Modulos/';
    public $rutaFooter = 'Publico/Marcos/footer.php';

    public function pasarela()
    {

        if ($this->cart->totalItems() != 0) {
            if (session()->get("sucursal_cobertura") != null) {

                $lista['lista_estados'] = $this->estados_modelo->findAll();

                $lista["lista_usuario"] = $this->usuarios_modelo->where("usuario", $this->session->get("usuario_cliente"))->findAll();

                $lista["listas_especiales"] = $this->especiales->findAll();

                $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

                if ($this->session->get("sucursal_cobertura") != null) {
                    $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));
                }

                if (!empty($lista["lista_usuario"])) {
                    $lista["lista_direccion"] = $this->direccion_modelo->select("direccion.id as idDireccion,calle,numero,direccion.codigo_postal as cp,localidad.nombre as nombreLocalidad")->join("localidad", "localidad.id = direccion.id_localidad")->where("id_usuario",  $lista["lista_usuario"][0]["id"])->findAll();
                }

                $lista["lista_colonias"] = $this->sucursales_localidad_modelo->_obtenerColonia($this->session->get("sucursal_cobertura"));

                if (session()->get("cp") != null && session()->get("tipo_orden") == "A Domicilio") {
                    $lista["lista_cobertura"] =  $this->sucursales_localidad_modelo->_obtenerCobertura($this->funciones->cleanSanitize("INT", session()->get("cp")));
                }

                echo view($this->rutaHeader, $lista);
                echo view($this->rutaModulo . 'pasarela', $lista);
                echo view($this->rutaFooter, $lista);
            } else {
                $this->session->setFlashdata('respuesta', array("0" => "No hay productos agregados a su carrito de compra", "1" => "error"));
                return redirect()->to(base_url(""));
            }
        } else {
            $this->session->setFlashdata('respuesta', array("Establezca tu tipo de orden", "1" => "error"));
            return redirect()->to(base_url(""));
        }
    }

    public function accion_pasarela()
    {
        if ($this->_ValidateFields() == 1) {
            $respuesta = array("0" => "Ocurrió un error interno(Valores esperados) ", "1" => "error");
            $this->session->setFlashdata('respuesta', $respuesta);
            return redirect()->to(base_url(""));
        }

        $res = true;
        $respuesta = null;

        $txtDireccion = null;

        $txtTipoPago = $this->encrypter->decrypt(hex2bin($this->request->getVar('txtTipoPago')));
        $txtTipoPago = $this->funciones->cleanSanitize("INT", $txtTipoPago);

        $txtContacto = $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtContacto'));

        $txtComentario = $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtComentario'));

        $lista_usuario = $this->usuarios_modelo->where("usuario", $this->session->get("usuario_cliente"))->findAll();
        $precioEnvio = null;
        $tipoOrden = null;

        $this->direccion_modelo->transBegin();

        if (session()->get("tipo_orden") == "En sucursal" || $this->request->getVar("txtTipoOrden") == "1") {
            $txtDireccion = null;
            $precioEnvio = 0;
            $tipoOrden = 1;
        } else {
            if (session()->get("tipo_orden") == "A Domicilio" || $this->request->getVar("txtTipoOrden") == "2") {
                $tipoOrden = 2;
                if (session()->get("cp") != null) {
                    $lista_cobertura =  $this->sucursales_localidad_modelo->_obtenerCobertura($this->funciones->cleanSanitize("INT", session()->get("cp")));
                    $precioEnvio = $lista_cobertura[0]["precio"];
                } else {
                    $precioEnvio = 0;
                }

                if (session()->get("usuario_cliente") != null) {

                    if ($this->request->getVar("txtDireccion") != null) {
                        $txtDireccion = $this->encrypter->decrypt(hex2bin($this->request->getVar('txtDireccion')));
                        $txtDireccion = $this->funciones->cleanSanitize("INT", $txtDireccion);
                    } else {
                        $datos_direccion = [
                            'calle' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtCalle')),
                            'numero' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNum')),
                            'codigo_postal' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtCp')),
                            'status' => "1",
                            'id_usuario' => $lista_usuario[0]["id"],
                            'id_localidad' =>  $this->funciones->cleanSanitize("INT", $this->encrypter->decrypt(hex2bin($this->request->getVar('txtLocalidad'))))
                        ];

                        $txtDireccion = $this->direccion_modelo->insert($datos_direccion);
                        if (((int) $txtDireccion) == 0) {
                            $res = false;
                        }
                    }
                } else {
                    $datos_direccion = [
                        'calle' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtCalle')),
                        'numero' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNum')),
                        'codigo_postal' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtCp')),
                        'status' => "1",
                        'id_usuario' => null,
                        'id_localidad' =>  $this->funciones->cleanSanitize("INT", $this->encrypter->decrypt(hex2bin($this->request->getVar('txtLocalidad'))))
                    ];

                    $txtDireccion = $this->direccion_modelo->insert($datos_direccion);

                    if (((int) $txtDireccion) == 0) {
                        $res = false;
                    }
                }
            }
        }


        $total = 0;
        if ($this->cart->totalItems() > 0) {
            foreach ($this->cart->contents() as $value) {
                $decryptedIdProducto = $this->encrypter->decrypt(hex2bin($value["id"]));
                $lista_productos = $this->productos_modelo->_getProductosPublic(NULL, session()->get("sucursal_cobertura"), "9999999999999", null, null,null);

                foreach ($lista_productos as $key2 => $value2) {
                    if ($value2["idProducto"] == $decryptedIdProducto) {
                        $total += $value["price"] * (int) $value["qty"];
                    }
                }
            }
        }


        $this->venta_modelo->transBegin();

        $this->detalle_venta_modelo->transBegin();

        $this->inventario_modelo->transBegin();

        $this->_GetContact($txtContacto);


        if ($total != 0) {

            $datos_venta = [
                'total' => $total + $precioEnvio,
                'metodo_pago' =>  $this->funciones->cleanSanitize("INT", $txtTipoPago),
                'contacto' => $this->_GetContact(),
                'precio_envio' => $precioEnvio,
                'comentario' =>  $this->funciones->cleanSanitize("INT", $txtComentario),
                'tipo_orden' => $tipoOrden,
                'id_cliente' =>  session()->get("usuario_cliente") != null ? $this->funciones->cleanSanitize("STRING", $lista_usuario[0]["id"]) : null,
                'id_direccion' => $txtDireccion
            ];

            $id_venta = 0;
            try {
                $id_venta = $this->venta_modelo->insert($datos_venta);
            } catch (\Throwable $th) {
                $res = false;
                $id_venta = 0;
            }
        } else {
            $res = false;
            $respuesta = array("0" => "Error en total", "1" => "error");
        }

        if ($id_venta != 0 && is_numeric($id_venta)) {
            try {
                if ($this->cart->totalItems() > 0) {
                    if ($res) {
                        foreach ($this->cart->contents() as $value) {
                            $decryptedIdProducto = $this->encrypter->decrypt(hex2bin($value["id"]));
                            $lista_productos = $this->productos_modelo->_getProductosPublic(NULL, session()->get("sucursal_cobertura"), "999999999999", null, null,null);

                            foreach ($lista_productos as $key2 => $value2) {
                                if ($value2["idProducto"] == $decryptedIdProducto) {

                                    $datos_detalle_venta = [
                                        'cantidad' =>  $this->funciones->cleanSanitize("INT", $value["qty"]),
                                        'precio' =>  $this->funciones->cleanSanitize("STRING", $value2["precioProducto"]),
                                        'subtotal' =>  doubleval($value2["precioProducto"] * $value["qty"]),
                                        'id_venta' => $id_venta,
                                        'id_producto' => $value2["idProducto"]
                                    ];

                                    try {
                                        $respuesta = $this->detalle_venta_modelo->save($datos_detalle_venta);
                                    } catch (\Throwable $th) {
                                        $res = false;
                                        $respuesta = $this->detalle_venta_modelo->error();
                                    }

                                    $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->detalle_venta_modelo->errors());

                                    if ($respuesta[1] != "success") {
                                        $res = false;
                                        $respuesta = array("0" => "Error en success", "1" => "error");
                                        break;
                                    } else {
                                        foreach ($value["options"] as $keyO => $valueO) {
                                            if ($res) {
                                                foreach ($valueO as $keyIn => $valueIn) {
                                                    if ($res) {

                                                        try {
                                                            $txtIdMenu = $this->encrypter->decrypt(hex2bin($valueIn["idMenu"]));
                                                            $lista['lista_menu_ingrediente'] = $this->menu_modelo->_obtenerIngredienteMenu($txtIdMenu);

                                                            if (!empty($lista['lista_menu_ingrediente'])) {
                                                                foreach ($lista['lista_menu_ingrediente'] as $key3 => $value3) {
                                                                    if ($res) {
                                                                        
                                                                        $lista['lista_porcion'] = $this->tamanio_ingredientes_modelo->where("id_ingrediente", $value3["idIngrediente"])->where("id_tipo_tamanio", $value2["idTipoTamanio"])->findAll();

                                                                        if (!empty($lista['lista_porcion'])) {
                                                                            for ($i = 0; $i < (int) $value["qty"]; $i++) {

                                                                                $id_sucursal = (session()->get("sucursal_cobertura") != null ? session()->get("sucursal_cobertura") : session()->get("id_sucursal"));

                                                                                $lista['lista_inventario'] = $this->inventario_modelo->where("id_ingrediente_producto", $value3["idIngrediente"])->where("id_sucursal", $id_sucursal)->findAll();
                                                                                

                                                                                if (!empty($lista['lista_inventario'])) {

                                                                                    if ((int) $lista['lista_inventario'][0]["cantidad"] > 0 && ((int) $lista['lista_inventario'][0]["cantidad"] >= (int) $lista['lista_porcion'][0]["porcion"])) {

                                                                                        $cantidad_restar =  ((int) $lista['lista_inventario'][0]["cantidad"] - (int) $lista['lista_porcion'][0]["porcion"]);

                                                                                        $datos_porcion_inventario = [
                                                                                            'cantidad' => $cantidad_restar
                                                                                        ];

                                                                                        try {
                                                                                            $respuesta = $this->inventario_modelo->update($lista['lista_inventario'][0]["id"], $datos_porcion_inventario);
                                                                                        } catch (\Throwable $th) {
                                                                                            $res = false;
                                                                                            $respuesta = $this->inventario_modelo->error();
                                                                                            break;
                                                                                        }


                                                                                        $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->inventario_modelo->errors());


                                                                                        if ($respuesta[1] != "success") {
                                                                                            $res = false;
                                                                                            $respuesta = array("0" => "Error en inventario", "1" => "error");
                                                                                            break;
                                                                                        }
                                                                                    } else {
                                                                                        $res = false;
                                                                                        $respuesta = array("0" => "Error no hay inventario del producto", "1" => "error");
                                                                                        break;
                                                                                    }
                                                                                } else {
                                                                                    $res = false;
                                                                                    $respuesta = array("0" => "Ocurrió un error interno (002) ", "1" => "error");
                                                                                    break;
                                                                                }
                                                                            }
                                                                        } else {
                                                                            $res = false;
                                                                            $respuesta = array("0" => "Ocurrió un error interno (006) ", "1" => "error");
                                                                            break;
                                                                        }
                                                                    } else {
                                                                        $res = false;
                                                                        $respuesta = array("0" => "Ocurrió un error interno (005) ", "1" => "error");
                                                                        break;
                                                                    }
                                                                }
                                                            } else {
                                                                $res = false;
                                                                $respuesta = array("0" => "Ocurrió un error interno (001)", "1" => "error");
                                                                break;
                                                            }
                                                        } catch (\Throwable $th) {
                                                            $res = false;
                                                            $respuesta = array("0" => "Error en inventario " . $th->getMessage(), "1" => "error");
                                                            break;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $res = false;
                                                $respuesta = array("0" => "Ocurrió un errro interno (004)", "1" => "error");
                                                break;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        $res = false;
                        $respuesta = array("0" => "Error en Res", "1" => "error");
                    }
                } else {
                    $res = false;
                    $respuesta = array("0" => "Error en total items", "1" => "error");
                }
            } catch (\Throwable $th) {
                $res = false;
                $respuesta = array("0" => "Error en detalle try", "1" => "error");
            }
        } else {
            $res = false;
            $respuesta = array("0" => "Error en compra", "1" => "error");
        }


        $token = $this->request->getVar("stripeToken");
        $correo = $this->session->get('usuario_cliente');

        $stripeStatus = $this->_StripePayment($token, $correo, $total, $id_venta, $txtTipoPago);

        $redirect = null;
        if ($res && $stripeStatus == 1) {
            if ($this->venta_modelo->transStatus() !== FALSE) {
                $this->venta_modelo->transCommit();
            }
            if ($this->detalle_venta_modelo->transStatus() !== FALSE) {
                $this->detalle_venta_modelo->transCommit();
            }

            if ($this->direccion_modelo->transStatus() !== FALSE) {
                $this->direccion_modelo->transCommit();
            }

            if ($this->inventario_modelo->transStatus() !== FALSE) {
                $this->inventario_modelo->transCommit();
            }

            $redirect = "miscompras/00-" . $id_venta;
            $respuesta = array("0" => "Compra realizada con exito", "1" => "success");
            $this->cart->destroy();
        } else {
            if ($this->venta_modelo->transStatus() === FALSE) {
                $this->venta_modelo->transRollback();
            }
            if ($this->detalle_venta_modelo->transStatus() === FALSE) {
                $this->detalle_venta_modelo->transRollback();
            }

            if ($this->direccion_modelo->transStatus() === FALSE) {
                $this->direccion_modelo->transRollback();
            }

            if ($this->inventario_modelo->transStatus() === FALSE) {
                $this->inventario_modelo->transRollback();
            }

            $redirect = "pasarela";
        }

        if ($this->request->getVar('txtPanel') == "9735393293239649") {
            header('Content-Type: application/json');
            echo json_encode($respuesta);
        } else {
            $this->session->setFlashdata('respuesta', $respuesta);
            return redirect()->to(base_url($redirect));
        }
    }


    public function _StripePayment($token, $correo, $total, $id_venta, $idTipoPago)
    {
        $res = null;
        try {
            if ($idTipoPago == 2) {
                require_once APPPATH . "ThirdParty/stripe/init.php";
                //set api key
                $stripe = array(
                    "publishable_key" => "pk_test_51IlgJAEmgefF22M8mTadCG13TFyKZfx7OuQfun2VNIngCJiSj200HMtYLqdOJfm1USFSqS2PQHPVfAsJElFr6Wq000jqXlQ4U2",
                    "secret_key"      => "sk_test_51IlgJAEmgefF22M8ENXG39b4Apm6EqujYZz8Y7sxNh3BQbhnDymKQkEE2RvrJON5M2xpZwguipGcwEG1QgnvRaO800WQbaWk3H"
                );

                \Stripe\Stripe::setApiKey($stripe['secret_key']);

                //add customer to stripe
                $customer = \Stripe\Customer::create(array(
                    'email' => $correo,
                    'source'  => $token
                ));

                //item information
                $itemName = "Pago en linea";
                $itemNumber = $id_venta;
                $itemPrice = $total;
                $currency = "mxn";

                //charge a credit or a debit card
                $charge = \Stripe\Charge::create(array(
                    'customer' => $customer->id,
                    'amount'   => $itemPrice,
                    'currency' => $currency,
                    'description' => $itemName,
                    'metadata' => array(
                        'item_id' => $itemNumber
                    )
                ));

                //retrieve charge details
                $chargeJson = $charge->jsonSerialize();

                //check whether the charge is successful
                if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
                    $res = 1;
                } else {
                    $res = 0;
                }
            } else {
                $res = 1;
            }
        } catch (\Throwable $th) {
            $res = 0;
        }
        return $res;
    }

    public function _GetContact()
    {
        $txtContacto = null;
        if (session()->get("tipo_orden") == "A Domicilio") {
            if (session()->get("usuario_cliente") == null) {
                $txtContacto = $this->request->getVar("txtNombres") . " " . $this->request->getVar("txtContacto");
            } else {
                $txtContacto = $this->request->getVar("txtContacto");
            }
        } else {
            if (session()->get("usuario_cliente") == null) {
                $txtContacto = $this->request->getVar("txtContacto");
            } else {
                $txtContacto =  session()->get("nombre_cliente") . " " . session()->get("telefono_cliente");
            }
        }
        return $txtContacto;
    }

    public function _ValidateFields()
    {
        $res = 1;

        $txtTipoPago = $this->encrypter->decrypt(hex2bin($this->request->getVar('txtTipoPago')));
        $txtCp = $this->request->getVar('txtCp');

        if ($txtTipoPago == null) {
            $res = 0;
        }
        if ($txtTipoPago != 1 || $txtTipoPago != 2) {
            $res = 0;
        }

        if ($txtCp != null && strlen($txtCp) <> 5) {
            $res = 0;
        }

        return $res;
    }
}
