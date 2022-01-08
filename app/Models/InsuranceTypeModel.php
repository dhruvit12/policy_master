<?php namespace App\Models;

use CodeIgniter\Model;

class InsuranceTypeModel extends Model
{
	protected $table      = 'tbl_insurance_sub_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'name', 'description', 'main',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
