<?php namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	protected $table      = 'admin';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'name', 'fk_role_id', 'insurancecompany_id', 'username', 'user_code', 'otp', 'mobile', 'email', 'password', 'profile_img', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
