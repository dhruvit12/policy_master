<?php namespace App\Models;

use CodeIgniter\Model;

class Insurance_typeModel extends Model
{
	protected $table      = 'insurance_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'insurance_type_name', 'description','is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
