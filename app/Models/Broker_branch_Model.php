<?php namespace App\Models;

use CodeIgniter\Model;

class Broker_branch_Model extends Model
{
	protected $table      = 'Broker_branch';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'broker_name_id', 'branch_name', 'address', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
