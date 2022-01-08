<?php namespace App\Models;

use CodeIgniter\Model;

class User_RoleModel extends Model
{
	protected $table      = 'role';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'role_type', 'description',
		'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
