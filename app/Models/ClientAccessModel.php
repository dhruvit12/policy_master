<?php namespace App\Models;

use CodeIgniter\Model;

class ClientAccessModel extends Model
{
	protected $table      = 'client_access';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'user_id', 'client_id', 'is_deleted', 'created_at', 'updated_at'
	];

}
