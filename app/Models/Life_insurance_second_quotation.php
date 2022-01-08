<?php namespace App\Models;

use CodeIgniter\Model;

class Life_insurance_second_quotation extends Model
{
	protected $table      = 'Life_insurance_second_quotation';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
       'id', 'quot_id', 'client_id', 'token', 'extension', 'sum_insured2', 'rate', 'actual_premium', 'description', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
