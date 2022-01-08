<?php namespace App\Models;

use CodeIgniter\Model;

class SetproductlimitModel extends Model
{
	protected $table      = 'setup_product_limit';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'type_id', 'description', 'percent', 'minamount', 'maxamount', 'currency_id', 'is_active', 'is_deleted', 'created_at'
	];

}
