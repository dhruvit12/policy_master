<?php namespace App\Models;

use CodeIgniter\Model;

class List_endorsement_model extends Model
{
	protected $table      = 'life_insurance_class_insert';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'quo_id', 'dob', 'age', 'member_add_date', 'branch_name', 'monthly_fees', 'id_type', 'id_number', 'primary_member_id', 'account_number', 'transaction_date', 'relationship', 'gender', 'description', 'pre_existing_condition', 'sum_assured', 'total_premium', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
