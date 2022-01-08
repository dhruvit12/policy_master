<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'tbl_user_maintenance';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [ 'id', 'company_name', 'fk_branch_id', 'company_type', 'user_code', 'fk_role_id', 'login_attempt', 'top_margin', 'insurer_name', 'limit_branch_access',
	'status', 'user_name', 'email_id', 'expry_date', 'left_margin', 'settings', 'last_login', 'is_active', 'is_deleted', 'created_at', 'updated_at'];

}
