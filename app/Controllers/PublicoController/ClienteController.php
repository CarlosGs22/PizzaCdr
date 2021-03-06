<?php

namespace App\Controllers\PublicoController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Estados_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Localidades_modelo;
use App\Models\Admin\Municipios_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Usuarios_modelo;
use App\Models\Publico\Detalle_Venta_modelo;
use App\Models\Publico\Direccion_modelo;
use App\Models\Publico\Venta_modelo;
use CodeIgniter\Controller;

class ClienteController extends Controller
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
    protected $venta_modelo;
    protected $detalle_venta_modelo;
    protected $funciones;

    protected $encrypter;
    protected $encryption;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->session = \Config\Services::session();

        $this->usuarios_modelo = new Usuarios_modelo();
        $this->status_modelo = new Status_modelo();

        $this->estados_modelo = new Estados_modelo();
        $this->municipios_modelo = new Municipios_modelo();
        $this->localidades_modelo = new Localidades_modelo();
        $this->direccion_modelo = new Direccion_modelo();
        $this->venta_modelo = new Venta_modelo();
        $this->detalle_venta_modelo = new Detalle_Venta_modelo();

        $this->funciones = new Funciones();
        $this->session = session();

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

    public function micuenta()
    {

        $lista['lista_micuenta'] = $this->usuarios_modelo->where("usuario", session()->get('usuario_cliente'))->findAll();

        $lista['lista_estados'] = $this->estados_modelo->findAll();

        $lista['lista_direcciones'] = $this->direccion_modelo->select("direccion.id as idDireccion,calle,numero,direccion.codigo_postal,localidad.nombre as nombreLocalidad,estado.nombre as nombreEstado")->join("localidad", "localidad.id = direccion.id_localidad")->join("municipio", "municipio.id = localidad.municipio_id")->join("estado", "estado.id = municipio.estado_id")->where("id_usuario", $lista['lista_micuenta'][0]["id"])->where("status", "1")->findAll();

        if (!empty($lista['lista_micuenta'])) {
            echo view($this->rutaHeader, $this->datamenu);
            echo view($this->rutaModulo . 'micuenta', $lista);
            echo view($this->rutaFooter);
        } else {
            $respuesta = array('0' => 'Ocurri?? un error interno', '1' => "error");
            $this->session->setFlashdata('respuesta', $respuesta);
            return redirect()->to(base_url(""));
        }
    }

    public function accion_usuarios_clientes()
    {

        if (
            $this->request->getVar('txtNombre') != null && $this->request->getVar('txtApe1') != null
            &&  $this->request->getVar('txtApe2') != null
            && $this->request->getVar('txtUsuario') != null
        ) {

            $idUsuario = $this->encrypter->decrypt(hex2bin($this->request->getVar("txtHex")));
            ///$hash = password_hash($this->request->getVar('txtContrasenia'), PASSWORD_DEFAULT);

            $datos_usuario = [
                'nombres' =>   $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNombre')),
                'apellido_paterno' =>   $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtApe1')),
                'apellido_materno' =>   $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtApe2')),
                'usuario' =>   $this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtUsuario')),
            ];

            if ($idUsuario != null) {
                array_merge($datos_usuario, array("id" =>  $this->funciones->cleanSanitize("INT", $idUsuario)));
            }
            $datos_usuario = $this->funciones->_GuardarImagen(
                $this->request->getFile('txtImagen'),
                './public/Publico/img/clientes',
                $datos_usuario,
                "imagen"
            );

            /*$contras = $this->usuarios_modelo->_validarContraseniaHash($this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtUsuario')));
            if ($contras == $this->request->getVar('txtContrasenia')) {
                $datos_usuario['contrasenia'] = $contras;
            } else {
                $datos_usuario['contrasenia'] = $hash;
            }*/

            $respuesta = null;
            try {
                if ($idUsuario != null) {
                    $respuesta = $this->usuarios_modelo->update($idUsuario, $datos_usuario);
                } else {
                    $respuesta = $this->usuarios_modelo->save($datos_usuario);
                }
            } catch (\Throwable $th) {
                $respuesta = $this->usuarios_modelo->error();
            }

            $session = session();

            $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->usuarios_modelo->errors());
            if ($respuesta[1] == 'success' && $idUsuario == null) {

                $this->session->remove("nombre_cliente");
                $this->session->remove("usuario_cliente");
                $this->session->remove("imagen_cliente");

                $datos_usuario = [
                    'nombre_cliente' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNombre')),
                    'usuario_cliente' =>  $this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtUsuario')),
                    'imagen_cliente' => ""
                ];

                $session->set($datos_usuario);

                return redirect()->to(base_url(""));
            } else if ($respuesta[1] == 'success' && $idUsuario != null) {
                $this->session->remove("nombre_cliente");
                $this->session->remove("usuario_cliente");
                $this->session->remove("imagen_cliente");

                $datos_usuario = [
                    'nombre_cliente' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNombre')),
                    'usuario_cliente' =>  $this->funciones->cleanSanitize("EMAIL", $this->request->getVar('txtUsuario')),
                    'imagen_cliente' => ""
                ];

                $session->set($datos_usuario);
                $this->session->setFlashdata('respuesta', $respuesta);
                return redirect()->to(base_url("micuenta"));
            } else {
                $this->session->setFlashdata('respuesta', $respuesta);
                return redirect()->to(base_url("micuenta"));
            }
        } else {
            $respuesta = array('0' => "Ocurri?? un error interno ", '1' => "error");
            $this->session->setFlashdata('respuesta', $respuesta);
            return redirect()->to(base_url("micuenta"));
        }
    }

    public function accion_direccion()
    {
        $lista_usuario = $this->usuarios_modelo->where("usuario", session()->get("usuario_cliente"))->findAll();

        if (!empty($lista_usuario)) {

            $datos_direccion = [
                'calle' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtCalle')),
                'numero' =>  $this->funciones->cleanSanitize("STRING", $this->request->getVar('txtNumero')),
                'codigo_postal' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtCp')),
                'status' => "1",
                'id_usuario' => $lista_usuario[0]["id"],
                'id_localidad' =>  $this->funciones->cleanSanitize("INT", $this->request->getVar('txtLocalidad')),
            ];

            $respuesta = null;
            try {
                if ($this->request->getVar("txtValue") == "5fny20dbw-e3d") {
                    $respuesta = $this->direccion_modelo->insert($datos_direccion);
                } else {
                    $respuesta = $this->direccion_modelo->save($datos_direccion);
                }
            } catch (\Throwable $th) {
                $respuesta = $this->direccion_modelo->error();
            }

            if ($this->request->getVar("txtValue") == "5fny20dbw-e3d" && ((int) $respuesta > 0)) {
                $idValueId = bin2hex($this->encrypter->encrypt($respuesta));
                $direccion = $this->request->getVar('txtCalle') . " " . $this->request->getVar('txtNumero') . " " .  $this->request->getVar('txtCp');
                echo json_encode(array("0" => $idValueId, "1" => "success", "2" => $direccion));
            } else {
                $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->direccion_modelo->errors());
                $this->session->setFlashdata('respuesta', $respuesta);
                return redirect()->to(base_url("micuenta"));
            }
        } else {
            $this->session->setFlashdata('respuesta', array("0" => "Ocurri?? un error interno", "1" => "error"));
            return redirect()->to(base_url("micuenta"));
        }
    }

    public function accion_direcciones($hex)
    {
        $idDireccion = $this->encrypter->decrypt(hex2bin($hex));
        $respuesta = $this->direccion_modelo->where("id", $idDireccion)->delete();

        $this->session->setFlashdata('respuesta', array("0" => "Registro eliminado", "1" => "success"));
        return redirect()->to(base_url("micuenta"));
    }

    public function miscompras($idCompra)
    {
        $piecesIdCompra = explode("-", $idCompra);

        $lista["lista_compras"] = $this->venta_modelo->_obtenerMisVentas($piecesIdCompra[1]);

        $lista_usuario = $this->usuarios_modelo->where("usuario", session()->get("usuario_cliente"))->findAll();

        $lista["lista_mis_compras"] = $this->venta_modelo->where("id_cliente", $lista_usuario[0]["id"])->findAll();

        $lista["lista_mis_detalles"] = $this->detalle_venta_modelo->select("venta.id as idVenta,venta.fecha,venta.total,venta.contacto,venta.precio_envio,
                producto.nombre as nombre_producto, producto.descripcion,
                detalle_venta.cantidad, detalle_venta.precio, detalle_venta.subtotal,
                tipo_orden.id as idTipoOrden,tipo_orden.tipo as tipo_orden,
                status_venta.nombre as status_pedido,badge,
                imagen.id as idImagen , imagen.imagen")->join("venta", "venta.id = detalle_venta.id_venta")->join("producto", "producto.id = detalle_venta.id_producto")->join("imagen", "producto.id = imagen.id_producto")->join("status_venta", "status_venta.id = venta.status_venta")->join("tipo_orden", "tipo_orden.id = venta.tipo_orden")->where("id_venta",  $lista["lista_mis_compras"][0]["id"])->groupBy("producto.id")->findAll();


        if (empty($lista["lista_mis_compras"]) && empty($lista["lista_compras"])) {
            $this->session->setFlashdata('respuesta', array("0" => "Ocurri?? un error interno", "1" => "error"));
            return redirect()->to(base_url(""));
        }

        echo view($this->rutaHeader, $this->datamenu);
        echo view($this->rutaModulo . 'miscompras', $lista);
    }

    public function status_compra()
    {
        $idVenta = $this->encrypter->decrypt(hex2bin($this->request->getVar("idVenta")));
        $lista["lista_compras"] = $this->venta_modelo->_obtenerMisVentas($idVenta);

        echo json_encode( $lista["lista_compras"]);
    }
}
