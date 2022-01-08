<?php namespace App\Models;

use CodeIgniter\Model;

class LifeInsurancequotationModel extends Model
{
	protected $table      = 'LifeInsurancequotationModel';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
      'id', 'quot_id', 'client_id', 'token', 'insured_name', 'dob', 'id_type', 'branch_name', 'age', 'id_number', 'account_number', 'annual_salary', 'gender', 'transaction_date', 'sum_assured', 'relationship', 'monthly_fees', 'premium', 'rate', 'actual_premium', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
