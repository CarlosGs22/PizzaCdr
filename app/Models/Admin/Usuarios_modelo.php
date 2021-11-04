<?php 

namespace App\Models\Admin;
use CodeIgniter\Model;

class Usuarios_modelo extends Model{

    public $table = 'usuario';

    public $primaryKey = 'id';
    
    protected $allowedFields = ['id', 'nombres','apellido_paterno','apellido_materno','tipo','usuario','contrasenia','imagen','status','cve_usuario','id_sucursal'];
    
    protected $validationRules    = [
        'nombres' => 'required',
        'apellido_paterno' => 'required',
        'apellido_materno' => 'required',
        'tipo' => 'required',
        'usuario' => 'required',
        'contrasenia' => 'required',
        'status' => 'required',
        'cve_usuario' => 'required',
        //'id_sucursal' => 'required'
    ];
    
    /*protected $validationMessages = [
        'nombre'=> [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.'
        ]
    ];*/
    
    public function _validarContrasenia($usuario,$contrasenia)
  {
    $sql = "SELECT id,nombres,apellido_paterno,apellido_materno,imagen,usuario,status,contrasenia 
    FROM usuario 
    where usuario = ? and status = 1 limit 1";
    $query = $this->query($sql,$usuario);
    $result = $query->getResult();

    $pass = null;

    foreach ($result as $key => $value) {
      $pass =  $value->contrasenia;
    }

    if(password_verify($contrasenia, $pass)){
      return $result;
    } else {
      return false;
    }
  }

  public function _validarContraseniaHash($usuario)

  {

    $sql = "SELECT contrasenia FROM usuario where usuario = ? limit 1";

    $query = $this->query($sql,$usuario);

    $result=  $query->getResult();


    return $result[0]->contrasenia;

  }

  public function _obtenerUsuarios($notUsuario)
  {
    return $this->where("id != ",$notUsuario)->findAll();
    //return $this->findAll();

  }



}

?>