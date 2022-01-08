<?php namespace App\Models;

use CodeIgniter\Model;

class Client_typeModel extends Model
{
	protected $table      = 'client_type';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'client_type', 'description','is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
