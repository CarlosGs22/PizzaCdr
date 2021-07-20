<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers\AdminController;


use App\Models\Admin\ArticuloModel;
use CodeIgniter\Controller;

class Articulo extends Controller
{

    protected $articuloModel;
    protected $validation;

    public $rutaHeader = 'Admin/Marcos/header.php';
    public $rutaModulo = 'Admin/Modulos/';
    public $rutaFooter = 'Admin/Marcos/footer.php';

    public function __construct()
    {
        $this->articuloModel = new ArticuloModel();
        $this->validation =  \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'controller'        => 'articulo',
            'title'             => 'Articulo'
        ];
       
        echo view($this->rutaModulo . 'articulo', $data);
        echo view($this->rutaFooter);

    }

    public function getAll()
    {
        $response = array();

        $data['data'] = array();

        $result = $this->articuloModel->select('id, nombre, cantidad, gr, lt, precio, status, cve_fecha, cve_usuario')->findAll();

        foreach ($result as $key => $value) {

            $ops = '<div class="btn-group">';
            $ops .= '	<button type="button" class="btn btn-sm btn-info" onclick="edit(' . $value->id . ')"><i class="fa fa-edit"></i></button>';
            $ops .= '	<button type="button" class="btn btn-sm btn-danger" onclick="remove(' . $value->id . ')"><i class="fa fa-trash"></i></button>';
            $ops .= '</div>';

            $data['data'][$key] = array(
                $value->id,
                $value->nombre,
                $value->cantidad,
                $value->gr,
                $value->lt,
                $value->precio,
                $value->status,
                $value->cve_fecha,
                $value->cve_usuario,

                $ops,
            );
        }

        return $this->response->setJSON($data);
    }

    public function getOne()
    {
        $response = array();

        $id = $this->request->getPost('id');

        if ($this->validation->check($id, 'required|numeric')) {

            $data = $this->articuloModel->where('id', $id)->first();

            return $this->response->setJSON($data);
        } else {

            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function add()
    {

        $response = array();

        $fields['id'] = $this->request->getPost('id');
        $fields['nombre'] = $this->request->getPost('nombre');
        $fields['cantidad'] = $this->request->getPost('cantidad');
        $fields['gr'] = $this->request->getPost('gr');
        $fields['lt'] = $this->request->getPost('lt');
        $fields['precio'] = $this->request->getPost('precio');
        $fields['status'] = $this->request->getPost('status');
        $fields['cve_fecha'] = $this->request->getPost('cveFecha');
        $fields['cve_usuario'] = $this->request->getPost('cveUsuario');


        $this->validation->setRules([
            'nombre' => ['label' => 'Nombre', 'rules' => 'required|max_length[255]'],
            'cantidad' => ['label' => 'Cantidad', 'rules' => 'required|numeric|max_length[11]'],
            'gr' => ['label' => 'Gr', 'rules' => 'required|numeric|max_length[1]'],
            'lt' => ['label' => 'Lt', 'rules' => 'required|numeric|max_length[1]'],
            'precio' => ['label' => 'Precio', 'rules' => 'required'],
            'status' => ['label' => 'Status', 'rules' => 'required|numeric|max_length[11]'],
            'cve_fecha' => ['label' => 'Cve fecha', 'rules' => 'required|valid_date'],
            'cve_usuario' => ['label' => 'Cve usuario', 'rules' => 'required|numeric|max_length[4]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
        } else {

            if ($this->articuloModel->insert($fields)) {

                $response['success'] = true;
                $response['messages'] = 'Data has been inserted successfully';
            } else {

                $response['success'] = false;
                $response['messages'] = 'Insertion error!';
            }
        }

        return $this->response->setJSON($response);
    }

    public function edit()
    {

        $response = array();

        $fields['id'] = $this->request->getPost('id');
        $fields['nombre'] = $this->request->getPost('nombre');
        $fields['cantidad'] = $this->request->getPost('cantidad');
        $fields['gr'] = $this->request->getPost('gr');
        $fields['lt'] = $this->request->getPost('lt');
        $fields['precio'] = $this->request->getPost('precio');
        $fields['status'] = $this->request->getPost('status');
        $fields['cve_fecha'] = $this->request->getPost('cveFecha');
        $fields['cve_usuario'] = $this->request->getPost('cveUsuario');


        $this->validation->setRules([
            'nombre' => ['label' => 'Nombre', 'rules' => 'required|max_length[255]'],
            'cantidad' => ['label' => 'Cantidad', 'rules' => 'required|numeric|max_length[11]'],
            'gr' => ['label' => 'Gr', 'rules' => 'required|numeric|max_length[1]'],
            'lt' => ['label' => 'Lt', 'rules' => 'required|numeric|max_length[1]'],
            'precio' => ['label' => 'Precio', 'rules' => 'required'],
            'status' => ['label' => 'Status', 'rules' => 'required|numeric|max_length[11]'],
            'cve_fecha' => ['label' => 'Cve fecha', 'rules' => 'required|valid_date'],
            'cve_usuario' => ['label' => 'Cve usuario', 'rules' => 'required|numeric|max_length[4]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
            $response['messages'] = $this->validation->listErrors();
        } else {

            if ($this->articuloModel->update($fields['id'], $fields)) {

                $response['success'] = true;
                $response['messages'] = 'Successfully updated';
            } else {

                $response['success'] = false;
                $response['messages'] = 'Update error!';
            }
        }

        return $this->response->setJSON($response);
    }

    public function remove()
    {
        $response = array();

        $id = $this->request->getPost('id');

        if (!$this->validation->check($id, 'required|numeric')) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        } else {

            if ($this->articuloModel->where('id', $id)->delete()) {

                $response['success'] = true;
                $response['messages'] = 'Deletion succeeded';
            } else {

                $response['success'] = false;
                $response['messages'] = 'Deletion error!';
            }
        }

        return $this->response->setJSON($response);
    }
}
