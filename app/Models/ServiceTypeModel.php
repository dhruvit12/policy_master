<?php namespace App\Models;

use CodeIgniter\Model;

class ServiceTypeModel extends Model
{
	protected $table      = 'service_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'service_type_name', 'description','is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
