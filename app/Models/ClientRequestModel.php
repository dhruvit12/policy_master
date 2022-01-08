<?php namespace App\Models;

use CodeIgniter\Model;

class ClientRequestModel extends Model
{
	protected $table      = 'client_request';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'client_id', 'admin_id', 'client_name', 'status', 'updated_at', 'created_at'
	];

}
