<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models\Admin;
use CodeIgniter\Model;

class ArticuloModel extends Model {
    
	protected $table = 'articulo';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['nombre', 'cantidad', 'gr', 'lt', 'precio', 'status', 'cve_fecha', 'cve_usuario'];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}