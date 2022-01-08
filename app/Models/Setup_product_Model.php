<?php namespace App\Models;

use CodeIgniter\Model;

class Setup_product_Model extends Model
{
	protected $table      = 'Setup_product';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'insurance_type_id', 'insurance_class_id', 'scope', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
