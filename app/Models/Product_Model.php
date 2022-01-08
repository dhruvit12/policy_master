<?php namespace App\Models;

use CodeIgniter\Model;

class Product_Model extends Model
{
	protected $table      = 'product';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'product', 'description',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
