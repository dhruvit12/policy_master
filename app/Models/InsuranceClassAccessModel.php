<?php namespace App\Models;

use CodeIgniter\Model;

class InsuranceClassAccessModel extends Model
{
	protected $table      = 'insurance_class_access';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'fk_user_id', 'insurance_class_id', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
