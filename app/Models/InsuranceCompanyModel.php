<?php namespace App\Models;

use CodeIgniter\Model;

class InsuranceCompanyModel extends Model
{
	protected $table      = 'insurance_company';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'insurance_company', 'short_name', 'email', 'company_address', 'company_type', 'password', 'description', 'reference_no', 'url', 'vrn', 'tin', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}
