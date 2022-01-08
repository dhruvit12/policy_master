<?php namespace App\Models;

use CodeIgniter\Model;

class InsuranceCompanyBranchModel extends Model
{
	protected $table      = 'insurance_company_branch';
	protected $primaryKey = 'id';

	protected $allowedFields = [ 'id', 'insurance_name_id', 'branch_name', 'address1', 'address2', 'country', 'city', 'is_active', 'is_deleted', 'created_at', 'updated_at'];
}
