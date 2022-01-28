<?php

namespace App\Controllers\PublicoController;

use App\Models\Admin\Especiales_modelo;
use App\Models\Admin\Estados_modelo;
use App\Models\Admin\Funciones;
use App\Models\Admin\Localidades_modelo;
use App\Models\Admin\Municipios_modelo;
use App\Models\Admin\Status_modelo;
use App\Models\Admin\Usuarios_modelo;
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
            $respuesta = array('0' => 'Ocurrió un error interno', '1' => "error");
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
            $respuesta = array('0' => "Ocurrió un error interno ", '1' => "error");
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
                $respuesta = $this->direccion_modelo->save($datos_direccion);
            } catch (\Throwable $th) {
                $respuesta = $this->direccion_modelo->error();
            }

            $respuesta = $this->funciones->_CodigoFunciones($respuesta, $this->direccion_modelo->errors());

            $this->session->setFlashdata('respuesta', $respuesta);
            return redirect()->to(base_url("micuenta"));
        } else {
            $this->session->setFlashdata('respuesta', array("0" => "Ocurrió un error interno", "1" => "error"));
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
        $decrypted_data_id = $this->encrypter->decrypt(hex2bin($idCompra));

        $lista["lista_compras"] = $this->venta_modelo->_obtenerMisVentas($decrypted_data_id);

        if (!empty($lista["lista_compras"])) {
            echo view($this->rutaHeader, $this->datamenu);
            echo view($this->rutaModulo . 'miscompras', $lista);
        
        } else {
            $this->session->setFlashdata('respuesta', array("0" => "No existe el Num. De Compra", "1" => "success"));
            return redirect()->to(base_url(""));
        }
    }
}
