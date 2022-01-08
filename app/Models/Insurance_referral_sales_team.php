<?php namespace App\Models;

use CodeIgniter\Model;

class Insurance_referral_sales_team extends Model
{
	protected $table      = 'insurance_referral_sales_team';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'member_id', 'member_name', 'member_type', 'email', 'mobile', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
