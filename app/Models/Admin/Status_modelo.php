<?php
namespace App\Models\Admin;
use CodeIgniter\Model;


class Status_modelo extends Model
{

public $table = 'status';

public $primaryKey = 'id';

protected $allowedFields = ['id', 'status'];




}
