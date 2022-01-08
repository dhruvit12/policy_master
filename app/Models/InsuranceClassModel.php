<?php namespace App\Models;

use CodeIgniter\Model;

class InsuranceClassModel extends Model
{
	protected $table      = 'insurance_class';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id', 'name', 'percentage_rate', 'insurance_type_id', 'description','is_active','is_deleted','created_at','updated_at'];
}
