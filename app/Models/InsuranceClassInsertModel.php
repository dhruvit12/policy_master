<?php namespace App\Models;

use CodeIgniter\Model;

class InsuranceClassInsertModel extends Model
{
	protected $table      = 'insurance_class_insert';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
		'id', 'quot_id', 'client_id', 'token', 'insurance_class_id', 'description', 'sum_insured', 'rate', 'override', 'premium', 'adjpremium', 'is_added', 'created_at', 'updated_at'
	];

}
