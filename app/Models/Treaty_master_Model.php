<?php namespace App\Models;

use CodeIgniter\Model;

class Treaty_master_Model extends Model
{
	protected $table      = 'treaty_master';
	protected $primaryKey = 'id';

	// protected $returnType = 'array';

	// this happens first, model removes all other fields from input data
	protected $allowedFields = [
        'id', 'perils_group_id', 'treaty_code', 'treaty_description', 'business_type', 'start_date', 'end_date', 'year', 'currency_id', 'rate_basis', 'rate_type', 'round_off', 'Insurer_xrate', 'exchange_rate', 'company_name', 'treaty_type', 'limit_type', 'sum_insured_form', 'sum_insured_to', 'ceding_type', 'allocation_mode', 'percentage', 'line', 'limit_amount', 'commission', 'rate', 'minimum_deposit_premium', 'yearly_limit', 'no_of_reinstatement', 'without_tax', 'premium_levy', 'city_levy', 'additional_levy', 'is_active', 'is_deleted', 'created_at', 'updated_at'
	];

}

?>