<?php

namespace App\Controllers\PublicoController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Estados_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Localidades_modelo;
use App\Models\Admin\Municipios_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Sucursal_modelo;
use App\Models\Admin\Usuarios_modelo;
use App\Models\Publico\Direccion_modelo;
use App\Models\Publico\Productos_modelo as PublicoProductos_modelo;
use App\Models\Publico\Sucursal_Localidad_modelo;
use App\Models\Publico\Venta_modelo;
use CodeIgniter\Controller;

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
    protected $funciones;

    protected $cart;

    protected $venta_modelo;
    protected $productos_modelo;

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

        $this->venta_modelo = new Venta_modelo();

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

                $lista["lista_usuario"] = $this->usuarios_modelo->where("usuario", $this->session->get("usuario_cliente"))->findAll();

                $lista["listas_especiales"] = $this->especiales->findAll();

                $lista["lista_sucursales"] = $this->sucursales_modelo->where("status", "1")->findAll();

                if ($this->session->get("sucursal_cobertura") != null) {
                    $lista["lista_sucursal_info"] = $this->sucursales_localidad_modelo->_obtenerHorarios($this->session->get("sucursal_cobertura"));
                }
                
                if (!empty($lista["lista_usuario"])) {
                    $lista["lista_direccion"] = $this->direccion_modelo->where("id_usuario",  $lista["lista_usuario"][0]["id"])->findAll();
                }

                $lista["lista_colonias"] = $this->sucursales_localidad_modelo->_obtenerColonia($this->session->get("sucursal_cobertura"));
                
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

        $txtTipoPago =  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtTipoPago'));
        $txtIdCliente = $this->funciones->cleanSanitize("INT", session()->get("usuario_cliente"));
        $txtDireccion = null;
        
        if(session()->get("tipo_orden") == "En sucursal"){
             $txtDireccion = null;
        }else{
            if(session()->get("tipo_orden") == "A Domicilio"){
            if($this->request->getVar('txtColonia') != null){
                $txtDireccion = $this->funciones->cleanSanitize("INT", $this->request->getVar('txtColonia'));
            }else{
                
            }
        }
        
        
        if ($this->cart->totalItems() != 0) {
            $total = 0;
            foreach ($this->cart->contents() as $value) {
                $decryptedIdProducto = $this->encrypter->decrypt(hex2bin($value["id"]));
                $lista_productos = $this->productos_modelo->_getProductosPublic(session()->get("sucursal_cobertura"),"100",null,null);
               
                foreach ($lista_productos as $key2 => $value2) {
                    if($value2["idProducto"] == $decryptedIdProducto ){
                        $total += $value["price"] * (int) $value["qty"];
                    }
                }
            }

            echo $total;

        }
    }



























        /*$token = $this->request->getVar("stripeToken");
        $titular =  $this->request->getVar("txtNombre");
        $correo = $this->session->get('usuario_cliente');
        $card_num = $this->request->getVar("txtNumero");
        $card_cvc = $this->request->getVar("txtCVV");
        $exp = explode("/", $this->request->getVar("txtExpiracion"));
        $card_month = $exp[0];
        $card_year = $exp[1];

        //include Stripe PHP library
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
        $itemNumber = "PS123456";
        $itemPrice = "32000";
        $currency = "mxn";
        $orderID = $token;

        //charge a credit or a debit card
        $charge = \Stripe\Charge::create(array(
            'customer' => $customer->id,
            'amount'   => $itemPrice,
            'currency' => $currency,
            'description' => $itemNumber,
            'metadata' => array(
                'item_id' => $itemNumber
            )
        ));

        //retrieve charge details
        $chargeJson = $charge->jsonSerialize();

        //check whether the charge is successful
        if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
            //order details 
            $amount = $chargeJson['amount'];
            $balance_transaction = $chargeJson['balance_transaction'];
            $currency = $chargeJson['currency'];
            $status = $chargeJson['status'];
            $date = date("Y-m-d H:i:s");

            $respuesta = array("0" => "OK", "1" => "success");
        } else {
            $respuesta = array("0" => "ERROR", "1" => "error");
        }

        session()->setFlashdata('respuesta', $respuesta);
        return redirect()->to(base_url("pasarela"));*/
    }
}
