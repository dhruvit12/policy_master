<?php namespace App\Models;

use CodeIgniter\Model;

class Upload_policy_Model extends Model
{
	protected $table      = 'upload_policy';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'insurance_type_id', 'insurance_class_id', 'name', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
