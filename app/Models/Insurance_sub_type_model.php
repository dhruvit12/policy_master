<?php namespace App\Models;

use CodeIgniter\Model;

class Insurance_sub_type_model extends Model
{
	protected $table      = 'insurance_sub_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'fk_insurance_type', 'insurance_sub_type_name', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
